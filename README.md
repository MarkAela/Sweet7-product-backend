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
- Role-based authorization (Admin and User)
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
| GET | `/api/categories` | View all categories |
| GET | `/api/categories/{category}` | View category details |
| GET | `/api/test` | Test API connection |

### Protected Routes

These routes require an authenticated user through Laravel Sanctum:

| Method | Endpoint | Description |
|---|---|---|
| POST | `/api/logout` | Log out the authenticated user |
| GET | `/api/products` | View all products |
| GET | `/api/products/{product}` | View product details |
| POST | `/api/products` | Create a product (Admin only) |
| PUT, PATCH | `/api/products/{product}` | Update a product (Admin only) |
| DELETE | `/api/products/{product}` | Delete a product (Admin only) |
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

The `ProductController` checks whether the authenticated user's role is `admin` before allowing product creation, updating, or deletion.

Regular users can view products but cannot create, update, or delete them. Users without administrator privileges receive a `403 Forbidden` response.

### API Testing

To view the registered API routes and their middleware, run:

```bash
php artisan route:list --path=api -v
```

To run the Laravel application's automated tests, use:

```bash
php artisan test
```

## Activity #8 - Part 3.3: Backend API Verification

The Sweet7 backend API was tested using Postman to verify authentication, authorization, and Product CRUD operations.

### 1. Authentication Tests

| Test | HTTP Status | Result |
|---|---|---|
| Register with valid data | 201 Created | User successfully registered |
| Register with existing email | 422 Unprocessable Entity | Duplicate email rejected |
| Login with valid credentials | 200 OK | Login successful; token returned |
| Login with invalid credentials | 401 Unauthorized | Invalid credentials rejected |

### 2. Product Authorization Tests

| Test | HTTP Status | Result |
|---|---|---|
| GET /api/products without token | 401 Unauthorized | Guest access denied |
| GET /api/products with user token | 200 OK | Product list returned |
| POST /api/products with user token | 403 Forbidden | Regular user cannot create products |
| POST /api/products with admin token | 201 Created | Admin successfully created a product |
| PATCH /api/products/{id} with admin token | 200 OK | Admin successfully updated a product |
| DELETE /api/products/{id} with admin token | 200 OK | Admin successfully deleted a product |

### 3. Logout and Token Revocation Tests

| Test | HTTP Status | Result |
|---|---|---|
| POST /api/logout with valid token | 200 OK | Current token successfully revoked |
| GET /api/products using revoked token | 401 Unauthorized | Access denied after logout |

### 4. Response Format

- Registration and login return user information and an authentication token.
- Passwords and password hashes are excluded from authentication responses.
- Product responses use a `data` object or collection containing product information.
- Unauthorized requests return HTTP 401.
- Forbidden operations return HTTP 403.
- Validation errors return HTTP 422.
- Successful logout returns a confirmation message.

### 5. Conclusion

Postman testing confirmed that the Sweet7 backend API implements authentication and role-based authorization.

Regular users can view products but cannot create, update, or delete them. Administrators can perform Product CRUD operations. Guests cannot access protected Product endpoints, and logout revokes the current authentication token.
