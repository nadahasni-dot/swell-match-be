<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Swell Match BE

Simple backend REST API for swell match frontend project.


## Installation

- Clone this repository, then install all the dependencies.

```bash
git clone https://github.com/nadahasni-dot/swell-match-be.git
composer install  
```
- Copy `.env.example` to `.env` and fill the required environment variables.
- Genereate the `APP_KEY`.
```bash
php artisan key:generate
```
- Run the database migration for initializing database scheme.
```bash
php artisan migrate:fresh
```
- Run the app locally.
```bash
php artisan serve
```
## Documentation

You can find the REST API Documentation [here](https://documenter.getpostman.com/view/10944704/2sA3JKehgz).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
