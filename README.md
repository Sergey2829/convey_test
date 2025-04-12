 
# Domain Management System

A Laravel-based application for managing domains and user subscriptions.

## Features

- User authentication and authorization
- Domain management (add, edit, delete domains)
- Subscription plan management
- Admin panel for user management
- SQLite database for easy setup

## Prerequisites

- PHP 8.1 or higher
- Composer
- SQLite

## Installation

1. Clone the repository:
```
git clone <repository-url>
cd convey_test
```

2. Install PHP dependencies:
```
composer install
```

3. Create environment file and generate application key:
```
cp .env.example .env
php artisan key:generate
```

4. Configure database:
```
touch database/database.sqlite
```

5. Update .env file to use SQLite:
```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/your/project/database/database.sqlite
```

## Running the Application

1. Run database migrations and seeders:
```
php artisan migrate:fresh --seed
```

2. Start the development server:
```
php artisan serve
```

The application will be available at `http://localhost:8000`

## Default Credentials

After running the seeders, you can log in with the following credentials:

- Admin User:
  - Email: admin@example.com
  - Password: password

    
