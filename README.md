# Public HRMS

A Human Resource Management System (HRMS) for managing employees, attendance, leave, payroll, and documents.

## Features

*   Employee Management
*   Attendance Tracking
*   Leave Management
*   Payroll Processing
*   Document Management
*   User Authentication

## API Endpoints

All endpoints are prefixed with `/api/v1`.

### Authentication

*   `POST /register` - Register a new user.
*   `POST /login` - Login a user and get a JWT token.
*   `GET /profile` - Get the authenticated user's profile.
*   `PUT /profile/{id}/update` - Update the authenticated user's profile.
*   `POST /logout` - Logout the authenticated user.

### Departments

*   `GET /departments` - Get all departments.
*   `POST /departments` - Create a new department.
*   `GET /departments/{id}` - Get a single department.
*   `PUT /departments/{id}` - Update a department.
*   `DELETE /departments/{id}` - Delete a department.

### Employees

*   `GET /employees` - Get all employees.
*   `POST /employees` - Create a new employee.
*   `GET /employees/{id}` - Get a single employee.
*   `PUT /employees/{id}` - Update an employee.
*   `DELETE /employees/{id}` - Delete an employee.

### Attendance

*   `GET /attendances` - Get all attendances.
*   `POST /attendances` - Create a new attendance record.
*   `GET /attendances/{id}` - Get a single attendance record.
*   `PUT /attendances/{id}` - Update an attendance record.
*   `DELETE /attendances/{id}` - Delete an attendance record.

### Leave

*   `GET /leaves` - Get all leave records.
*   `POST /leaves` - Create a new leave record.
*   `GET /leaves/{id}` - Get a single leave record.
*   `PUT /leaves/{id}` - Update a leave record.
*   `DELETE /leaves/{id}` - Delete a leave record.

### Payroll

*   `GET /payrolls` - Get all payroll records.
*   `POST /payrolls` - Create a new payroll record.
*   `GET /payrolls/{id}` - Get a single payroll record.
*   `PUT /payrolls/{id}` - Update a payroll record.
*   `DELETE /payrolls/{id}` - Delete a payroll record.

### Documents

*   `GET /documents` - Get all documents.
*   `POST /documents` - Create a new document.
*   `GET /documents/{id}` - Get a single document.
*   `PUT /documents/{id}` - Update a document.
*   `DELETE /documents/{id}` - Delete a document.

## Scalability Improvements

*   **Unused Code Removal:** Removed the unused `holiday` model and its corresponding migration file.
*   **Caching:** Added caching to the `DepartmentController` to improve performance by reducing database queries for the list of departments.
*   **Error Handling:** Improved the error handling in the `EmployeeController` and `PayrollController` to use a more structured JSON:API-compliant error response when a resource is not found.
*   **Code Refactoring:** Refactored the `PayrollController` to remove code duplication by extracting the net salary calculation into a private helper method.

## Setup and Installation

1.  Clone the repository:
    ```bash
    git clone https://github.com/ahsan-alam-500/laravel-hrms.git
    ```
2.  Install dependencies:
    ```bash
    composer install
    ```
3.  Copy the `.env.example` file to `.env` and configure your database and other settings:
    ```bash
    cp .env.example .env
    ```
4.  Generate an application key:
    ```bash
    php artisan key:generate
    ```
5.  Run the database migrations:
    ```bash
    php artisan migrate
    ```
6.  Run the database seeders:
    ```bash
    php artisan db:seed
    ```
7.  Start the development server:
    ```bash
    php artisan serve
    ```
