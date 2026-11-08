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

## API Routes and Permissions

The Sweet7 backend provides public API routes and protected API routes using Laravel Sanctum authentication.

### Public Routes

These routes can be accessed without logging in:

| Method | Endpoint | Description |
|---|---|---|
| POST | `/api/register` | Register a new user |
| POST | `/api/login` | Log in a user |
| GET | `/api/products` | View all products |
| GET | `/api/products/{product}` | View product details |
| GET | `/api/categories` | View all categories |
| GET | `/api/categories/{category}` | View category details |
| GET | `/api/test` | Test API connection |

### Protected Routes

These routes require an authenticated user through Laravel Sanctum:

| Method | Endpoint | Description |
|---|---|---|
| POST | `/api/logout` | Log out the authenticated user |
| GET, POST, PUT, PATCH, DELETE | `/api/addresses` | Manage user addresses |
| GET, POST, PUT, PATCH, DELETE | `/api/cart` | Manage cart items |
| GET, POST, PUT, PATCH, DELETE | `/api/orders` | Manage orders |
| GET, POST, PUT, PATCH, DELETE | `/api/payments` | Manage payments |

### Administrator Permissions

Product management operations require an authenticated administrator account.

| Method | Endpoint | Permission |
|---|---|---|
| POST | `/api/products` | Admin only |
| PUT, PATCH | `/api/products/{product}` | Admin only |
| DELETE | `/api/products/{product}` | Admin only |

The `ProductController` checks whether the authenticated user's role is `admin` before allowing product creation, updating, or deletion. Users without administrator privileges receive a `403 Forbidden` response.

### API Testing

To view the registered API routes and their middleware, run:

```bash
php artisan route:list --path=api -v
```

To run the Laravel application's automated tests, use:

```bash
php artisan test
```

