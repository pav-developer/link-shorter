FROM php:8.2-fpm
WORKDIR /var/www/html

# Копируем entrypoint
#COPY entrypoint.sh /usr/local/bin/
#RUN chmod +x /usr/local/bin/entrypoint.sh

# Установка зависимостей
RUN apt-get update -y && \
    apt-get install -y \
        libxml2-dev \
        libzip-dev \
        zlib1g-dev \
        libpng-dev \
        libonig-dev \
        sudo \
        nano \
        unzip && \
    rm -rf /var/lib/apt/lists/*

# Установка PHP расширений
RUN docker-php-ext-install pdo pdo_mysql xml zip dom

#RUN apt-get update && apt-get install -y mysql-client && rm -rf /var/lib/apt/lists/*

# Установка Composer (исправленная версия)
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer && \
    chmod +x /usr/local/bin/composer

#RUN usermod -u 1000 www-data  # Совпадение с хостовым UID

#RUN chown -R www-data:www-data /var/www/html \
#    && chmod -R 755 /var/www/html

# Указываем entrypoint
#ENTRYPOINT ["entrypoint.sh"]
CMD ["php-fpm"]