FROM php:7.2-fpm

RUN apt-get update && \
  apt-get install -y \
  curl \
  git \
  gnupg \
  unzip

RUN apt-get update && apt-get install -y \
		libzip-dev \
        libfreetype6-dev \
        libpq-dev \
        g++ \
        libicu-dev \
        libxml2-dev \
        libssl-dev \
        libcurl4-openssl-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install intl \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-install soap \
    && apt-get purge --auto-remove -y g++ \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install opcache \
    && docker-php-ext-install bcmath

COPY php.ini /usr/local/etc/php/

COPY keys/id_rsa /root/.ssh/id_rsa
COPY keys/id_rsa.pub /root/.ssh/id_rsa.pub
RUN chmod 0700 /root/.ssh
RUN chmod 0600 /root/.ssh/id_rsa
RUN chmod 0600 /root/.ssh/id_rsa.pub

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY default.pool.conf /etc/php/7.0/fpm/pool.d/

# set composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /var/www

RUN sed -i -e 's/listen.*/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.conf

RUN usermod -u 1000 www-data

#COPY docker-entrypoint.sh /
#RUN chmod +x /docker-entrypoint.sh
#ENTRYPOINT ["/docker-entrypoint.sh"]

CMD ["php-fpm"]
