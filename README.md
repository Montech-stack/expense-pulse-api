# 💰 ExpensePulse API

[![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php)](https://php.net)
[![Docker](https://img.shields.io/badge/Docker-Enabled-2496ED?style=for-the-badge&logo=docker)](https://www.docker.com/)

**ExpensePulse** is a professional RESTful API built with Laravel 10 designed for granular financial tracking. It demonstrates a deep understanding of **relational database design**, **query optimization**, and **automated testing**.

---

## 📂 Project Architecture



```bash
expense-pulse-api/
├── app/
│   ├── Http/
│   │   ├── Controllers/    # Business logic isolation
│   │   ├── Requests/       # Data validation & Security
│   │   └── Resources/      # API Transformation Layer (Decoupling)
│   └── Models/             # Eloquent Relationships (1:N)
├── database/
│   ├── migrations/         # Strict Schema Definitions
│   └── seeders/            # Automated Demo Data
├── tests/
│   └── Feature/            # Automated API Quality Assurance
└── Dockerfile              # Containerized Environment
```

## Features

- Transaction Management

-        List transactions (GET /api/transactions)
-        Create transactions (POST /api/transactions)
-        List categories (GET /api/categories)

-    Performance: N+1 Query Prevention

        In the TransactionController, implemented Eager Loading (Transaction::with('category')). This reduces database overhead from $N+1$ queries to just 2 queries, ensuring the API remains fast as the dataset grows.

-    Security & Integrity

        Form Requests: All inputs are sanitized and validated before hitting the controller.
        Database Constraints: Utilized constrained() foreign keys to enforce referential integrity at the database level.
        Financial Precision: Used decimal(12,2) instead of float to prevent rounding errors in financial calculations.

-    Professional API Standards

        Eloquent Resources: Used to transform models into standardized JSON, preventing internal database changes from breaking the frontend.
        Soft Deletes: (Optional implementation) ensuring data can be recovered.

    Clean MVC structure
    Request validation using FormRequest
    Dockerized environment for consistent setup
    Feature tests for API endpoints

## Tech Stack

    PHP 8.2
    Laravel 10
    MySQL (conceptual)
    Docker & Docker Compose
    PHPUnit (testing)
    Composer (dependency management)

## Setup Instructions

Clone the repository

git clone https://github.com/yourusername/expense-pulse-api.git

    cd expense-pulse-api

    Install dependencies

    composer install
    Setup environment
    cp .env.example .env

    update DB settings
    php artisan 

    key:generate
    Run database migrations

    php artisan migrate --seed
    Start the server

    php artisan serveor using Docker: docker-compose up -d

    docker-compose exec app php artisan migrate --seed

    Test API endpointsGet paginated transactions with category details:textGET http://127.0.0.1:8000/api/transactionsStore new record (Validated):textPOST http://127.0.0.1:8000/api/transactions
    Content-Type: application/json
    Body: { "amount": 100.00, "description": "Example expense", "category_id": 1 }List all available categories:textGET http://127.0.0.1:8000/api/categories

## 🛤️ API Roadmap

Method,Endpoint,Description
GET,/api/transactions,Paginated history with category details
POST,/api/transactions,Store new record (Validated)
GET,/api/categories,List all available categories

## 🧪 Testing Suite
    To verify API stability and prevent regressions, run the feature test suite:

    php artisan test
   
