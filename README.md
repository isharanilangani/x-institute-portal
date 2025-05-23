# x-institute-portal

Follow these steps to get the project running on the local machine:

git clone [repository-url](https://github.com/isharanilangani/x-institute-portal)
cd x-institute-portal
cd x-institute

composer install
npm install
npm run dev

Update .env with the database credentials and other necessary config
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=x-institute-portal
DB_USERNAME=root
DB_PASSWORD=

php artisan migrate

php artisan db:seed

php artisan serve


