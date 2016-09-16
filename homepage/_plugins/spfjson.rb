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

            title = html.match(title_regex)[1]
            head = html.match(head_regex)[1]
            body = {}
            html.scan(body_regex).each do |group|
                body[group[0]] = group[1]
            end
            foot = html.match(foot_regex)[1]
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

            response
        end

    end


end

