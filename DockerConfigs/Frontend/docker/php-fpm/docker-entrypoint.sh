#!/bin/bash
set -e

# Create jwt open ssl keys
# Password for keys is the same as in .env and .env.dist files

if [ ! -d "config/jwt" ]; then
  mkdir config/jwt
fi

if [ ! -f "config/jwt/private.pem" ]; then
  openssl genrsa -passout pass:eb297a683c7541b0af9281c9b22c602c -out config/jwt/private.pem -aes256 4096
fi

if [ ! -f "config/jwt/public.pem" ]; then
  openssl rsa -passin pass:eb297a683c7541b0af9281c9b22c602c -pubout -in config/jwt/private.pem -out config/jwt/public.pem
fi

if [ ! -f ".env" ]; then
    echo "Copying env file"
    php -r "copy('.env.dist', '.env');"
fi

exec "$@"