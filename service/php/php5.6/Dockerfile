# 从官方PHP5.6镜像构建
FROM php:5.6-fpm

# 更换软件源地址，使用国内源
COPY sources.list.stretch /etc/apt/sources.list

ENV TZ=Asia/Shanghai

# 更新软件包
RUN apt-get update

# 核心扩展
# 相关依赖必须手动安装
RUN apt-get install -y \
        apt-utils \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
   
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && :\
    && apt-get install -y libicu-dev \
    && docker-php-ext-install intl \
    && :\
    && apt-get install -y \
            libxml2-dev \
            libxslt-dev \
    && docker-php-ext-install soap \
    && docker-php-ext-install xsl \
    && docker-php-ext-install xmlrpc \
    && docker-php-ext-install wddx \
    && :\
    && apt-get install -y \
            libbz2-dev \
    && docker-php-ext-install bz2 \
    && :\
    && docker-php-ext-install zip \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install exif \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install calendar \
    && docker-php-ext-install sockets \
    && docker-php-ext-install gettext \
    && docker-php-ext-install shmop \
    && docker-php-ext-install sysvmsg \
    && docker-php-ext-install sysvsem \
    && docker-php-ext-install sysvshm \
    && :\
    && apt-get install -y \
            curl \
            libcurl3 \
            libcurl4-openssl-dev \
    && docker-php-ext-install curl

# PECL 扩展
RUN apt-get install -y libmemcached-dev zlib1g-dev \
    && pecl install memcached-2.2.0 \
    && docker-php-ext-enable memcached \
    # redis 扩展
    && pecl install redis-3.1.4 \
    && docker-php-ext-enable redis
