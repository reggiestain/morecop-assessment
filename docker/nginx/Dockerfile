FROM nginx:latest

RUN apt-get update \
    && apt-get install openssl

RUN mkdir /var/oauth

WORKDIR "/var/oauth"

RUN openssl genrsa -passout pass:_passphrase_ -out private.key 2048

RUN openssl rsa -in private.key -passin pass:_passphrase_ -pubout -out public.key

COPY default.conf /etc/nginx/conf.d/