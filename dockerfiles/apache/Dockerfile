# La versión base la tomamos de un ARG (lo definís en el docker-compose):
    ARG PHP_VERSION=8.2-apache
    FROM php:${PHP_VERSION}
    
    # Instalar paquetes del sistema que necesitamos para compilar extensiones:
    RUN apt-get update && apt-get install -y \
        git \
        zip \
        unzip \
        libzip-dev \
        libpng-dev \
        libjpeg62-turbo-dev \
        libwebp-dev \
        libpq-dev \
        libicu-dev \
        && rm -rf /var/lib/apt/lists/*
    
    # ---------------------------------------------------------------------------
    # 1) Extensiones Core de PHP instaladas con docker-php-ext-install
    # ---------------------------------------------------------------------------
    # pdo_mysql -> para MySQL/MariaDB
    # mysqli -> por si te piden la extensión mysqli
    # pdo_pgsql + pgsql -> para PostgreSQL
    # gd -> para manipular imágenes (con JPEG, WebP)
    # intl -> para internacionalización (sorting, transliteración, etc.)
    # zip -> para funciones de compresión
    RUN docker-php-ext-configure gd --with-jpeg --with-webp \
        && docker-php-ext-install \
           pdo_mysql \
           mysqli \
           pdo_pgsql \
           pgsql \
           gd \
           intl \
           zip
    
    # ---------------------------------------------------------------------------
    # 2) Extensiones vía PECL (no vienen incluidas de serie)
    # ---------------------------------------------------------------------------
    # redis -> extensión nativa para Redis
    # mongodb -> extensión nativa para MongoDB
    # xdebug -> para debug de código PHP
    RUN pecl install redis mongodb xdebug \
        && docker-php-ext-enable redis mongodb xdebug
    
    # ---------------------------------------------------------------------------
    # 3) Ajuste opcional de Xdebug para desarrollo local
    #    (esto habilita Xdebug, apunta a host.docker.internal para debug)
    # ---------------------------------------------------------------------------
    RUN echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-$(php -r 'echo PHP_ZTS ? \"zts-\" : \"\"; echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;')/xdebug.so" > /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.log_level=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
    
    # ---------------------------------------------------------------------------
    # 4) Instalar Composer globalmente
    # ---------------------------------------------------------------------------
    RUN curl -sS https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin \
        --filename=composer
    
    # ---------------------------------------------------------------------------
    # 5) Configuraciones de Apache (mod_rewrite, etc.)
    # ---------------------------------------------------------------------------
    RUN a2enmod rewrite
    
    # ---------------------------------------------------------------------------
    # 6) Copiamos primero composer.json (si querés aprovechar caching)
    # ---------------------------------------------------------------------------
    COPY ./www/composer.json /var/www/html/
    WORKDIR /var/www/html
    
    # Si tu proyecto ya tiene un lock file, podés copiarlo también:
    # COPY ./www/composer.lock /var/www/html/
    
    # Instalar dependencias de Composer durante el build
    RUN composer install --no-dev --prefer-dist --no-interaction || true
    # (Ponemos `|| true` para que no rompa si no existe lock. 
    #  O podés no usarlo y que falle si no hay lock.)
    
    # ---------------------------------------------------------------------------
    # 7) Copiamos el resto de tu código PHP
    # ---------------------------------------------------------------------------
    COPY ./www /var/www/html
    
    # ---------------------------------------------------------------------------
    # 8) Copiamos config de Apache (ej. VirtualHost)
    # ---------------------------------------------------------------------------
    COPY ./apache-config/000-default.conf /etc/apache2/sites-available/000-default.conf
    
    # Ajustes opcionales de permisos
    # RUN chown -R www-data:www-data /var/www/html
    
    EXPOSE 80
    