FROM ubuntu:16.04
RUN apt-get update && apt-get install -y \
        nginx \
        php \
        php-mysql \
        php-mbstring \
        php-mcrypt \
        nodejs \
        git \
        npm \
        php-dom \
        php-pear \
        php-curl \
        sudo \
        vim \
        curl \
        unzip \
    && bash -c "echo 'mckatoo	ALL=(ALL:ALL) NOPASSWD:ALL' > /etc/sudoers.d/mckatoo"
