FROM php:8.0.8-fpm-alpine

RUN apk --update add --virtual build-dependencies build-base openssl-dev autoconf

RUN docker-php-ext-install pdo_mysql

RUN apk del build-dependencies build-base openssl-dev autoconf && rm -rf /var/cache/apk/*

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && php composer-setup.php && php -r "unlink('composer-setup.php');" && mv composer.phar /usr/local/bin/composer

COPY ./api .

EXPOSE 9000

CMD [ "sh", "-c", "cp .env.example .env && composer install && chmod -R 777 vendor && chmod 777 .env && php artisan key:generate && php-fpm" ]