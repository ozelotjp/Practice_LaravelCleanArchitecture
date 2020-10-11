FROM php:7.4-alpine
WORKDIR /var/www/html

# 開発用パッケージをインストール
RUN apk add --no-cache git

# Composerをインストール & 日本向けに最適化 & 並列ダウンロードプラグインを導入
RUN apk add --no-cache composer \
 && composer config -g repos.packagist composer https://packagist.jp \
 && composer global require hirak/prestissimo

# PHP拡張モジュールをインストール
# 1. Laravelで必要なもの（bcmath ctype fileinfo json mbstring openssl pdo tokenizer xml）
#    （ctyle, fileinfo, json, mbstring, openssl, pdo, tokenizer, xmlはphp:7.4-alpineにプリインストール済み）
RUN docker-php-ext-install bcmath
# 2. アプリケーションに必要なもの
RUN docker-php-ext-install pdo_mysql
RUN apk --no-cache add libpng-dev zlib-dev \
 && docker-php-ext-install gd
RUN apk --no-cache add libzip-dev \
 && docker-php-ext-install zip
