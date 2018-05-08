# 从官方PHP7.2镜像构建
FROM php:7.2-fpm

# 更换软件源地址
COPY ./sources.list.stretch /etc/apt/sources.list

# 添加配置文件
# ADD php.ini    /usr/local/etc/php/php.ini
# ADD php-fpm.conf    /usr/local/etc/php-fpm.conf

# 拷贝本地扩展到服务器
COPY pecl/libmemcached-1.0.18.tar.gz /home/libmemcached-1.0.18.tar.gz
ADD pecl/redis /usr/src/php/ext/redis
ADD pecl/memcached /usr/src/php/ext/memcached

RUN apt-get update

####### memcached 库 #############
# RUN docker-php-ext-configure --with-zlib-dir=/usr/include/
# RUN pecl install /home/memcached.tgz && echo "extension=memcached.so" > /usr/local/etc/php/conf.d/memcached.ini
RUN apt-get install -y zlib1g-dev
RUN cd /home && tar zxvf libmemcached-1.0.18.tar.gz && cd libmemcached-1.0.18 \
    && ./configure --prefix=/usr/local/libmemcached --with-memcached \
    && make && make install
RUN docker-php-ext-configure memcached --with-libmemcached-dir=/usr/local/libmemcached --disable-memcached-sasl
RUN docker-php-ext-install memcached
####################

####### redis 库 #############
# RUN pecl install /home/redis.tgz && echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini
RUN docker-php-ext-install redis
####################

####### GD 库 #############
RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev
# 修改gd库配置
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
# 安装gd库扩展
RUN docker-php-ext-install gd
####################

####### mysql 库 #############
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli
####################

####### imap 库（发送邮件相关） #############
RUN docker-php-ext-install exif
RUN apt-get install -y libc-client2007e-dev libkrb5-dev \
    && docker-php-ext-configure imap --with-kerberos=/usr/kerberos --with-imap-ssl \
    && docker-php-ext-install imap
####################

####### pcntl 库（进程管理相关库） #############
RUN docker-php-ext-install pcntl
####################



####### composer 包管理工具 #############
ADD composer.phar /usr/local/bin/composer
RUN chmod 755 /usr/local/bin/composer
####################

# 默认工作目录
WORKDIR /data/wwwroot/
RUN usermod -u 1000 www-data
