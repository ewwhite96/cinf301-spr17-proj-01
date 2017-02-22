# See "https://hub.docker.com/_/centos/" for Centos image
#
# Build using "docker build --rm -t centos ."
#
FROM centos:7
MAINTAINER "Eddie White" <ewwhite@stetson.edu>
ENV container docker
RUN (cd /lib/systemd/system/sysinit.target.wants/; for i in *; do [ $i == \
systemd-tmpfiles-setup.service ] || rm -f $i; done); \
rm -f /lib/systemd/system/multi-user.target.wants/*;\
rm -f /etc/systemd/system/*.wants/*;\
rm -f /lib/systemd/system/local-fs.target.wants/*; \
rm -f /lib/systemd/system/sockets.target.wants/*udev*; \
rm -f /lib/systemd/system/sockets.target.wants/*initctl*; \
rm -f /lib/systemd/system/basic.target.wants/*;\
rm -f /lib/systemd/system/anaconda.target.wants/*;
VOLUME [ "/sys/fs/cgroup" ]
CMD ["/usr/sbin/init"]

RUN yum -y install httpd php php-common php-cli; yum clean all; systemctl enable httpd.service
EXPOSE 80
CMD ["/usr/sbin/init"]

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"\
php -r "if (hash_file('SHA384', 'composer-setup.php') === '55d6ead61b29c7bdee5cccfb50076874187bd9f21f65d8991d46ec5cc90518f447387fb9f76ebae1fbbacf329e583e30') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"\
php composer-setup.php\
php -r "unlink('composer-setup.php');"
