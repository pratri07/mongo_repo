FROM rhscl/php-56-rhel7:latest
USER root
RUN yum -y --disablerepo=* --enablerepo=rhel* install rh-php56-php-pecl-mongo && \
    yum clean all && \
    rm -rf /var/cache/yum
USER 1001
