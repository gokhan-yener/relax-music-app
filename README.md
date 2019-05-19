# Rahatlatıcı Müzikler Uygulaması

## Installing


```bash

docker-compose-up -d

docker exec -it <container-id> bash

# install Vendor Libraries
composer install

# create DB tables
php artisan migrate

# for fake data
php artisan db:seed

# running
localhost:8000

