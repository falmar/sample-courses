FROM nginx:1.25.3-alpine as base
WORKDIR /php-app
ENV PORT 80


FROM base as prod
COPY docker/nginx/prod.conf /etc/nginx/conf.d/default.conf
COPY /public /usr/share/nginx/html/public


FROM base as local
COPY docker/nginx/local.conf /etc/nginx/conf.d/default.conf
