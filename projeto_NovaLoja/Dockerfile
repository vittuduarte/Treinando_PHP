FROM php:8.1-fpm

# Argumentos
ARG user=projetoroot
ARG uid=1000

# Configura fuso horário
ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    locales \
    vim \
    nodejs \
    npm \
    gnupg \
    wget \
    software-properties-common \
    jpegoptim optipng pngquant gifsicle \
    graphviz \
    postgresql-client \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala extensões PHP (PostgreSQL, GD, etc.)
RUN docker-php-ext-install pdo_pgsql pgsql mbstring exif pcntl bcmath zip gd sockets

# Instala Redis e Xdebug
RUN pecl install redis xdebug \
    && docker-php-ext-enable redis xdebug

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cria usuário não-root
RUN useradd -G www-data,root -u $uid -d /home/$user $user && \
    mkdir -p /home/$user/.composer && chown -R $user:$user /home/$user

# Instala Yarn
RUN npm install -g yarn

# Diretório de trabalho
WORKDIR /var/www

# Custom INI (ignorado se não existir)
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

# Configuração do Xdebug (modo desenvolvimento)
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.discover_client_host=true" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.output_dir=/tmp" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Permissões para o usuário
USER $user

EXPOSE 8000
