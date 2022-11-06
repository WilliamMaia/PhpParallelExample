FROM php:7.2.34-zts-alpine

WORKDIR /app

COPY . /app

RUN php composer.phar install