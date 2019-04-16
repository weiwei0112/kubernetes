FROM centos:centos7
LABEL maintainer="The Nginx Dockerfile <qoo13149@mtopv.com>"

ENV nginxversion="1.14.0-1" \
    os="centos" \
    osversion="7" \
    elversion="7_4"

RUN yum install -y net-tools wget openssl sed &&\
    yum -y autoremove &&\
    yum clean all &&\
    wget http://nginx.org/packages/$os/$osversion/x86_64/RPMS/nginx-$nginxversion.el$elversion.ngx.x86_64.rpm &&\
    rpm -iv nginx-$nginxversion.el$elversion.ngx.x86_64.rpm

COPY ./conf.d/host.conf /etc/nginx/conf.d/host.conf
COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./www/index.html /var/www/html/index.html
VOLUME [ "/var/www/html" ]
EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
