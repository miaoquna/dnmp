# 从官方PHP镜像构建
FROM php:7.0

# 将 index.php 复制到容器内到 /var/www 目录下
ADD index.php /var/www/

# 对外暴露 8080 端口
EXPOSE     8080

# 设置容器默认工作目录 /var/www
WORKDIR   /var/www

# 容器运行后默认执行的指令
ENTRYPOINT ["php", "-S", "0.0.0.0:8080"]
docker run -p 8081:80 -v ~/wwwroot:/opt -v ~/Dockerfile/data/nginx/wwwlog:/var/log/nginx  -it jiang/nginx-test




ldap




pcntl


sockets



swoole


xsl
zip


