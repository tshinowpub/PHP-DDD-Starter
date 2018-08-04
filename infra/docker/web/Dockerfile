FROM centos:7.4.1708

MAINTAINER tshinow-pub <shino.t.music@gmail.com>

RUN yum update -y

#=====================================
# Setting Timezone
#=====================================
RUN \cp -f /usr/share/zoneinfo/Asia/Tokyo /etc/localtime

#=====================================
# Install Common Library
#=====================================
RUN yum -y install curl \
    wget

#=====================================
# Install Epel
#=====================================
RUN yum -y install epel-release

#=====================================
# Install nginx
#=====================================
COPY env/repo/nginx.repo /etc/yum.repos.d/nginx.repo

RUN yum -y install nginx

#=====================================
# Install PHP
#=====================================
RUN yum -y install http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
RUN yum -y install --enablerepo=remi-php72 \
    php \
    php-cli \
    php-fpm \
    php-bcmath \
    php-gd \
    php-hash \
    php-intl \
    php-json \
    php-mbstring \
    php-mcrypt \
    php-mysqli \
    php-opcache \
    php-pdo \
    php-pdo_mysql \
    php-simplexml \
    php-xsl \
    php-zip

RUN mkdir -p /var/run/php-fpm
RUN chown -R nginx:nginx /var/lib/php/session

RUN yum -y install libsodium-devel

#=====================================
# Install Supervisor
#=====================================
RUN yum -y install python-setuptools
RUN easy_install supervisor

#=====================================
# Setting env
#=====================================
COPY env/nginx/nginx.conf /etc/nginx/nginx.conf
COPY env/php/php.ini /etc/php.ini
COPY env/php/www.conf /etc/php-fpm.d/www.conf
COPY env/supervisor/supervisord.conf /etc/supervisord.conf

#=====================================
# Install Composer
#=====================================
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

EXPOSE 80

WORKDIR /var/www/php-ddd-starter-web

CMD ["/usr/bin/supervisord"]