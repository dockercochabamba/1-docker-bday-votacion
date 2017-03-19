FROM php:7.0-alpine
VOLUME /app
EXPOSE 3000
WORKDIR /app
COPY . /app
