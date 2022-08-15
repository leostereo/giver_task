<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center"><a href="https://vuejs.org" target="_blank" rel="noopener noreferrer"><img width="100" src="https://vuejs.org/images/logo.png" alt="Vue logo"></a></p>


# How to install
## Clone the repo
```console
git clone https://github.com/leostereo/giver_task.git 
```
## Prepare .env project.
```console
cd giver_task
cp .env.example .env
```
## Create api base url:
```console
MIX_API_URL=http://app.laravue/api
```
## Adjust database credencials , for example:
- DB_CONNECTION=mysql
- DB_HOST=mysql
- DB_PORT=3306
- DB_DATABASE=laravue
- DB_USERNAME=root
- DB_PASSWORD=root

## Bring the Laradock suite.
```console
git submodule add https://github.com/Laradock/laradock.git
cd laradock
cp .env.example .env
docker-compose up -d nginx mysql
```
## Access to mysql container and create laravue db
```console
create database laravue
```
## Access to workspace to install all dependencies and run migrations.
```console
composer install
npm install
npm run development
php artisan migrate
```
# Platform Usage
## Access to /admin for admin user
login as admin@mail.com with password `password`
## or for regular user:
Access to / , no login requiered.
