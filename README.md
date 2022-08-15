<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center"><a href="https://vuejs.org" target="_blank" rel="noopener noreferrer"><img width="100" src="https://vuejs.org/images/logo.png" alt="Vue logo"></a></p>


## Install

git clone https://github.com/leostereo/giver_task.git 

cd giver_task

cp .env.example .env
#adjust you api base url.
MIX_API_URL=http://app.laravue/api

#adjust database , for ex:
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravue
DB_USERNAME=root
DB_PASSWORD=root

#Laradock
git submodule add https://github.com/Laradock/laradock.git
cd laradock
cp .env.example .env
docker-compose up -d nginx mysql

#access to mysql container to create laravue db
create database laravue

#access to workspace to install all dependencies and run migrations.
composer install
npm install
npm run development
php artisan migrate

##Usage
access to /admin
login as admin@mail.com

Access to / will bring vue view.
