FROM composer:2 AS dependency-installer
COPY . /app
WORKDIR /app
RUN composer install --optimize-autoloader --ignore-platform-reqs

FROM dunglas/frankenphp:php8.3-alpine
COPY --from=dependency-installer /app /app

RUN install-php-extensions \
    	pdo_mysql \

