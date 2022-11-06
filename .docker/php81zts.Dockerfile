FROM php:8.1.12-zts-alpine3.16

WORKDIR /app

COPY . /app

RUN apk --update add gcc make g++ zlib-dev
RUN apk add php81-dev
RUN yes | pecl install parallel

CMD php /app/src/Services/PeopleDataProcessorParallel.php