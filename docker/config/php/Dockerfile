FROM php:8.1-fpm

# Check installed version
# ~~~~~~~~~~~~~~~~~~~~~~~

RUN php -v

# Install dependencies for PHP
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RUN apt-get update
RUN apt-get install -y openssl git unzip iputils-ping telnet

# Download and install Composer
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer --version

# Enable PHP Memcached Extension
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RUN apt-get update
RUN apt-get install -y libz-dev zlib1g-dev
