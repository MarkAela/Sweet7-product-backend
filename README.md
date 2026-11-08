# Sweet7 - Laravel Backend

Sweet7 is a bakery e-commerce system built with a React frontend and a Laravel REST API backend.

## Backend Technologies

- Laravel 12
- PHP 8.4
- MySQL 8.4
- Laravel Sanctum
- REST API

## Features

- User registration and login
- Authentication using Laravel Sanctum
- Product management (CRUD)
- Category management
- Product listing and details
- API responses using Laravel Resources
- Database migrations and seeders

## Installation

1. Clone the repository.
2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Create your environment file:

   ```bash
   copy .env.example .env
   ```

4. Generate the application key:

   ```bash
   php artisan key:generate
   ```

5. Configure your database credentials in `.env`.
6. Run database migrations:

   ```bash
   php artisan migrate
   ```

7. Start the Laravel development server:

   ```bash
   php artisan serve
   ```

## API Endpoint

The backend API is used by the Sweet7 React frontend.

Default local API address:

`http://127.0.0.1:8000/api`

## Related Repository

Frontend: https://github.com/MarkAela/Sweet7-product-frontend

## Project

Sweet7 - Every cake tells a sweet story.
