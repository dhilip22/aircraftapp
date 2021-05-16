Unzip the folder in apache path
cd project_folder

create a database:
create database aircraft

Change the DB connection settings in .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aircraft
DB_USERNAME=root
DB_PASSWORD=

composer install
npm install
npm run dev
php artisan migrate
php artisan passport:install
php artisan serve