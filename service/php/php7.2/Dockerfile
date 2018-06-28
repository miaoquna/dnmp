# 从官方PHP7.2镜像构建
FROM php:7.2-fpm

# 更换软件源地址，使用国内源
COPY sources.list.stretch /etc/apt/sources.list

ENV TZ=Asia/Shanghai

# 更新软件包
RUN apt-get update

################################################## 安装扩展 ##########################################################
# php扩展分为 核心扩展、PECL扩展、其他扩展
# 下边分为三种方式来选择安装扩展
#
# 核心扩展
# 相关依赖必须手动安装
RUN apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    #&& :\
    #&& apt-get install -y libc-client-dev libkrb5-dev \
    #&& docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    #&& docker-php-ext-install imap \
    #&& :\
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
    #&& docker-php-ext-install opcache \
    && :\
    && apt-get install -y \
            curl \
            libcurl3 \
            libcurl4-openssl-dev \
    && docker-php-ext-install curl
    #&& docker-php-ext-install pdo_firebird \
    #&& docker-php-ext-install pdo_dblib \
    #&& docker-php-ext-install pdo_oci \
    #&& docker-php-ext-install pdo_odbc \
    #&& docker-php-ext-install pdo_pgsql \
    #&& docker-php-ext-install pgsql \
    #&& docker-php-ext-install oci8 \
    #&& docker-php-ext-install odbc \
    #&& docker-php-ext-install dba \
    #&& docker-php-ext-install interbase \
    #&& apt-get install -y libreadline-dev \
    #&& docker-php-ext-install readline \
    #&& :\
    #&& apt-get install -y libsnmp-dev \
    #&& apt-get install -y snmp \
    #&& docker-php-ext-install snmp \
    #&& :\
    #&& apt-get install -y libpspell-dev \
    #&& apt-get install -y aspell-en \
    #&& docker-php-ext-install pspell \
    #&& :\
    #&& apt-get install -y librecode0 \
    #&& apt-get install -y librecode-dev \
    #&& docker-php-ext-install recode \
    #&& :\
    #&& apt-get install -y libtidy-dev \
    #&& docker-php-ext-install tidy \
    #&& :\
    #&& apt-get install -y libgmp-dev \
    #&& ln -s /usr/include/x86_64-linux-gnu/gmp.h /usr/include/gmp.h \
    #&& docker-php-ext-install gmp \
    #&& :\
    #&& apt-get install -y postgresql-client \
    #&& apt-get install -y mysql-client \
    #&& apt-get install -y libldb-dev \
    #&& apt-get install -y libldap2-dev \
    #&& docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu \
    #&& docker-php-ext-install ldap \
#
# PECL 扩展
RUN apt-get install -y libmemcached-dev zlib1g-dev \
    && pecl install memcached-3.0.4 \
    && docker-php-ext-enable memcached \
    #&& :\
    # xdebug 扩展
    #&& pecl install xdebug-2.5.5 \
    #&& docker-php-ext-enable xdebug \
    #&& :\
    # redis 扩展
    && pecl install redis-3.1.4 \
    && docker-php-ext-enable redis
    #&& :\
    # imagick扩展
    #&& apt-get install -y libmagickwand-dev \
    #&& pecl install imagick-3.4.3 \
    #&& docker-php-ext-enable imagick
#
# 其他扩展
# RUN curl -fsSL 'https://xcache.lighttpd.net/pub/Releases/3.2.0/xcache-3.2.0.tar.gz' -o xcache.tar.gz \
#    && mkdir -p /tmp/xcache \
#    && tar -xf xcache.tar.gz -C /tmp/xcache --strip-components=1 \
#    && rm xcache.tar.gz \
#    && docker-php-ext-configure /tmp/xcache --enable-xcache \
#    && docker-php-ext-install /tmp/xcache \
#    && rm -r /tmp/xcache
#
#
################################################# 安装扩展完毕 #######################################################


# composer 包管理工具
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
####### composer 包管理工具 #############
ADD composer.phar /usr/local/bin/composer
RUN chmod 755 /usr/local/bin/composer
RUN composer config -g repo.packagist composer https://packagist.phpcomposer.com
####################