# Usa a imagem oficial do PHP 8.2.27 com Apache
FROM php:8.2.27-apache

# Instala as dependências necessárias e extensões do PHP para o Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www/html

# Se preferir copiar os arquivos para a imagem durante o build, descomente a linha abaixo:
# Copia os arquivos do projeto
COPY . .

# Instala as dependências do Composer
RUN composer install

# Ajusta as permissões da pasta (caso necessário)
RUN chown -R www-data:www-data /var/www/html

# Ativa o módulo de reescrita do Apache
RUN a2enmod rewrite

# Expõe a porta 80
EXPOSE 8000

# Comando padrão para iniciar o Apache
CMD ["apache2-foreground"]