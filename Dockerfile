FROM php:fpm-alpine

COPY . /usr/src/myapp

WORKDIR /usr/src/myapp

EXPOSE 8080

CMD ["php", "-a"]