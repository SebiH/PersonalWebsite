require 'json'


module Jekyll

    class Page
        def subfolder
            @dir
        end

        def html
            @output
        end
    end

    class SpfJsonPageGenerator < Generator

        safe true
        priority :low

        def generate(site)

            Jekyll::Hooks.register :pages, :post_write do |page|

                path = page.subfolder + '/' + page.name

                if page.permalink
                    path = page.permalink
                end

                path = path[0..-6] if path =~ /.html$/
                path = File.join(path, 'index') if path =~ /\/$/
                path = path + '.spf.json'

                dir = site.config['destination']

                # Write the contents
                File.open(File.join(dir, path), 'w') do |f|
                    f.write(generate_content(page))
                    f.close
                end
            end

            #site.pages.concat(pages)
        end

        def generate_content(page)
            html = page.html

            title_regex = /<title>(.*)<\/title>/m
            head_regex = /<!-- begin spf head -->(.*)<!-- end spf head -->/m
            body_regex = /<!-- begin spf body: (\w+) -->(.*)<!-- end spf body: \1 -->/m
            foot_regex = /<!-- begin spf foot -->(.*)<!-- end spf foot -->/m
            #attr_body_class_regex = /<body[^>]* class="([^"]*)"/

            title = title_regex.match(html)
            if title
                title = title[1]
            end
            head = head_regex.match(html)
            if head
                head = head[1]
            end
            body = {}
            html.scan(body_regex).each do |group|
                body[group[0]] = group[1]
            end
            foot = foot_regex.match(html)
            if foot
                foot = foot[1]
            end
            #attr_body_class = html.match(attr_body_class_regex)[1]
            #attrs = {
                #'body' => {'class' => attr_body_class}
            #}

            response = {
                'title' => title,
                'head' => head,
                'body' => body,
                #'attr' => attrs,
                'foot' => foot,
            }

            response.to_json
        end

    end


end

