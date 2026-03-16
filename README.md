# Laravel 12 Fundamentals - Chirper

<p>This project was developed by <a href="https://github.com/thiagoow">Thiago Lopes</a> in March 2026.</p>

## Build Setup

First install PHP with Composer and Laravel following: [this documentation](https://laravel.com/docs/12.x#installing-php).

```bash
# Create a ".env" file on project root based on ".env.example"
$ cp .env.example .env

# Generate application key:
$ php artisan key:generate

# Install Laravel dependencies:
$ composer i

# Install project dependencies:
$ npm i

# Create a local database file:
$ touch database/database.sqlite

# Create database tables/structures:
$ php artisan migrate

# (Optional) Seed the database with sample data:
$ php artisan db:seed --class=ChirpSeeder

# Run the local server:
$ composer dev
```
