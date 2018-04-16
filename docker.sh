#!/bin/bash


#docker run -d --name=mysql \
#-p 49160:22 \
#-p 49161:80 \
#-p 49162:3306 \
#wnameless/mysql-phpmyadmin


docker run -ti --name=rh \
-p 802:80 \
-v $(pwd)/php-fpm.conf:/etc/php/7.0/fpm/php-fpm.conf \
-v $(pwd)/site:/var/www \
-v $(pwd)/logs/nginx:/var/log/nginx \
-v $(pwd)/logs/php:/var/log/php \
-v $(pwd)/php.ini:/etc/php/7.0/fpm/php.ini \
-v $(pwd)/nginx.conf:/etc/nginx/nginx.conf \
-v $(pwd)/vhost:/etc/nginx/sites-available/default \
-v $(pwd)/vhost:/etc/nginx/sites-enabled/default \
mckatoo/nginx-php:latest \
bash

