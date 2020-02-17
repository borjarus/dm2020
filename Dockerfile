FROM php:fpm-alpine

COPY . /usr/src/myapp

WORKDIR /usr/src/myapp

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "web/index.php"]