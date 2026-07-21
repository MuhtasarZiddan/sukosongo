git clone https://github.com/username/web-desa.git

cd web-desa

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

npm install

npm run dev

php artisan serve
