# 构建nginx
# 从官方nginx镜像构建
FROM nginx:1.13.12
# 添加当前目录下到 nginx.conf 到服务器作为配置文件
# ADD  nginx.conf      /etc/nginx/nginx.conf
# 添加
# ADD  sites-enabled/*    /etc/nginx/conf.d/
# 添加 wwwroot 目录，很重要
RUN  mkdir /data && mkdir /data/wwwroot
RUN  chown -R www-data.www-data /data /data/wwwroot

# 需要挂载的目录，设置挂载位置后拥有读写权限
VOLUME ["/data/wwwroot", "/var/log/nginx"]
