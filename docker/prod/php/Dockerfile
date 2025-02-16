# Usamos a imagem oficial do PHP com FPM e extensões necessárias
FROM php:8.4-fpm

# Definindo o diretório de trabalho
WORKDIR /var/www/html

# Instalando dependências do sistema
RUN apt-get update && apt-get install -y \
    nginx \
    zip unzip git curl \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libzip-dev libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring zip xml pdo pdo_mysql bcmath opcache

# Instalando o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiando arquivos da aplicação (exceto os que estão no .dockerignore)
COPY . .

# Ajustando permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Configurando o PHP-FPM
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini

# Expondo a porta do PHP-FPM
EXPOSE 9000

# Comando de inicialização
CMD ["php-fpm"]
