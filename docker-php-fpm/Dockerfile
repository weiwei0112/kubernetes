FROM 192.168.212.12/qoo13149/c7-systemd

MAINTAINER The php-fpm Dockerfile"<qoo13149@mtopv.com>"

# Install required repos, update, and then install PHP-FPM
RUN yum install -y epel-release \
        http://rpms.remirepo.net/enterprise/remi-release-7.rpm  \
        yum-utils && \
        yum-config-manager --enable remi-php73 && \
        yum install -y \
        php-bcmath \
        php-cli \
        php-fpm \
        php-mysqlnd \
        php-mssql \
        php-xml \
        php-pgsql \
        php-gd \
        php-mcrypt \
        php-ldap \
        php-imap \
        php-soap \
        php-tidy \
        php-mbstring \
        php-opcache \
        php-pdo \
        php-pecl-apcu \
        php-pecl-apcu-bc \
        php-pecl-geoip \
        php-pecl-igbinary \
        php-pecl-imagick \
        php-pecl-redis \
        unzip && \
        yum --enablerepo=epel install -y fcgi && \
        yum clean all &&\
        mkdir -p /run/php-fpm

COPY container-entrypoint check_fcgi /usr/sbin/
COPY php-fpm.conf php.ini /etc/
COPY php-fpm.d/www.conf /etc/php-fpm.d/www.conf
COPY fix-permissions.sh ./

RUN mkdir -p /app && \
#    chmod 644 /etc/php.ini && \
#    chmod 644 /etc/php-fpm.conf && \
#    chmod 644 /etc/php-fpm.d/ && \
#    chmod 644 /run/php-fpm && \
#    chmod 644 /app && \
#    chmod 644 /var/lib/php/session/

     ./fix-permissions.sh /etc/php.ini && \
     ./fix-permissions.sh /etc/php-fpm.conf && \
     ./fix-permissions.sh /etc/php-fpm.d/ && \
     ./fix-permissions.sh /run/php-fpm && \
     ./fix-permissions.sh /app && \
     ./fix-permissions.sh /var/lib/php/session/
     
EXPOSE 9000
ENTRYPOINT ["container-entrypoint"]

# Run PHP-FPM on container start.
CMD ["/usr/sbin/php-fpm", "-F", "-R"]
