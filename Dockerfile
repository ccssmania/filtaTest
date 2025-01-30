FROM php:8.4.1-fpm

LABEL manteiner="ccss@utp.edu.co"

ARG user=www
ARG group=www

WORKDIR /var/www

# Install system dependencies
RUN apt-get update

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql bcmath

# Add user for laravel application
RUN groupadd -g 1000 $group
RUN useradd -u 1000 -ms /bin/bash -g $group $group

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory permissions
COPY --chown=$user:$user . /var/www

USER $user

# NVM & Node
ENV NODE_VERSION=20.15.0
RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.34.0/install.sh | bash
ENV NVM_DIR=/home/www/.nvm
RUN . "$NVM_DIR/nvm.sh" && nvm install ${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm use v${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm alias default v${NODE_VERSION}
ENV PATH="/home/www/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"

ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

ENTRYPOINT [ "sh", "./entrypoint.sh" ]