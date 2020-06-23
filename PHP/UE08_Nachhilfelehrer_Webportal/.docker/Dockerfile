FROM debian:latest
MAINTAINER Clemens Rumpfhuber <mail@clemens-rumpfhuber>
ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update
RUN apt-get -y install lsb-release apt-transport-https ca-certificates wget
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list
RUN apt-get update
RUN apt-get install --no-install-recommends -y supervisor curl net-tools mlocate nano vim less apache2 apache2-utils libapache2-mod-security2 libapache2-mod-php7.4 php7.4 php7.4-bz2 php7.4-mbstring php7.4-mysql php7.4-zip php7.4-pdo
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN echo "ServerSignature Off" >> /etc/apache2/apache2.conf
RUN echo "ServerTokens Prod" >> /etc/apache2/apache2.conf
RUN a2enmod rewrite
RUN service apache2 restart
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
EXPOSE 80