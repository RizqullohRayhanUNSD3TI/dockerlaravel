FROM nginx:1.23.3

ADD ./vhost.conf /etc/nginx/conf.d/default.conf
WORKDIR /var/www