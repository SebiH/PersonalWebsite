FROM ruby:3.3-slim

RUN apt-get update && apt-get install -y --no-install-recommends \
      build-essential \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /srv/jekyll

COPY Gemfile Gemfile.lock ./
RUN bundle install

ENTRYPOINT ["bundle", "exec"]
CMD ["jekyll", "build"]
