FROM phpdockerio/php73-fpm:latest

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        php7.3-curl \
        php7.3-gd \
        php7.3-mbstring \
        php7.3-mysql \
        php7.3-odbc \
        php7.3-pgsql \
        php7.3-sqlite3 \
        php7.3-xml \
        php7.3-xmlrpc \
        php7.3-zip \
        php-yaml \
        libjpeg-dev \
        libpng-dev \
        libpq-dev \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Allows container to run as any uid
RUN touch /run/php-fpm.pid && chmod 777 /run/php-fpm.pid 

WORKDIR "/symbiota2"
