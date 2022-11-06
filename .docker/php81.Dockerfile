FROM php:8.1.12-alpine3.16

WORKDIR /app

COPY . /app

RUN php composer.phar require amphp/parallel

RUN php composer.phar install