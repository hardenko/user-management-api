# User Management API

A Laravel-based REST API for user management with authentication, image processing, and comprehensive validation.

## Project Overview

This API provides user management functionality for applications requiring:
- User registration with profile photos
- Token-based authentication system
- Paginated user listings
- Position management
- Image optimization using TinyPNG

## Requirements

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Git](https://git-scm.com/downloads)

## Installation

```bash
git clone https://github.com/hardenko/user-management-api.git .
chmod +x init.sh
./init.sh
```

## Usage

### API Endpoints

#### Authentication
```
GET /api/token
```
Returns an authentication token for API access.

#### Users
```
GET /api/users?page=1&count=6
POST /api/users
GET /api/users/{id}
```

#### Positions
```
GET /api/positions
```

### User Registration

```json
POST /api/users
Authorization: Bearer {token}

{
  "name": "John Doe",
  "email": "john@example.com",
  "phone": "+380501234567",
  "position_id": 1,
  "photo": "base64_image_data"
}
```

### Response Format

```json
{
  "success": true,
  "user_id": 47,
  "message": "New user successfully registered"
}
```

### User List Response

```json
{
  "success": true,
  "page": 1,
  "total_pages": 10,
  "total_users": 47,
  "count": 6,
  "links": {
    "next_url": "http://localhost/api/users?page=2",
    "prev_url": null
  },
  "users": [...]
}
```

### Business Rules

- User registration requires valid authentication token
- Profile photos are automatically optimized using TinyPNG
- Ukrainian phone numbers must follow +380XXXXXXXXX format
- Email addresses must be unique
- Pagination defaults to 6 users per page

## Testing

Run the comprehensive test suite:

```bash
./vendor/bin/sail artisan test
```

The test suite includes:
- User registration with validation
- Authentication middleware testing
- Pagination functionality
- Image upload validation
- Error handling scenarios

## Architecture

The project follows Laravel best practices:
- **DTOs** for data transfer between layers
- **Service classes** for business logic
- **Form Requests** for input validation
- **API Resources** for response formatting
- **Repository pattern** via Eloquent models

### Key Components

```
app/
├── Http/Controllers/Api/   # API endpoint controllers
├── Services/              # Business logic services
├── Dto/                   # Data transfer objects
├── Resources/             # API response formatters
├── Http/Request/          # Validation rules
└── Models/                # Database models
```

## Configuration

### TinyPNG Integration

Get your API key from [TinyPNG Developers](https://tinypng.com/developers) and add to `.env`:

```env
TINIFY_API_KEY=your_api_key_here
```

### Database

PostgreSQL configuration in `.env`:

```env
DB_CONNECTION=pgsql
DB_HOST=pgsql
DB_PORT=5432
DB_DATABASE=user_management_api
DB_USERNAME=sail
DB_PASSWORD=your_password
```

## Development

### Start Development Environment
```bash
./vendor/bin/sail up -d
```

### Run Migrations
```bash
./vendor/bin/sail artisan migrate --seed
```

### Code Quality
```bash
./vendor/bin/sail artisan pint
```

## Stopping the Application

To stop the Docker containers:
```bash
./vendor/bin/sail down
```
