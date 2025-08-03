FROM ubuntu:24.04

RUN apt update && apt install -y \
    software-properties-common \
    && add-apt-repository ppa:ondrej/php \
    && apt update && apt install -y php8.4 php8.4-cli php8.4-opcache curl unzip git

# COPY php.ini /etc/php/8.4/cli/php.ini

WORKDIR /app