# DB Transaction

Project ini adalah hasil dari pembuatan CRUD dan API yang diamankan dengan Personal Token Access menggunakan Laravel Sanctum.

## Tech Stack
- Laravel Version 10.10
- PHP Version 8.1
- MySQL
- Composer 2.6.3

## Additional Software for Testing API
- postman

## Installation
Jalankan setiap tahap kode dibawah ini pada terminal
```bash
    1. git clone git@github.com:n0tavaliduser/Laravel-RESTAPI-Sanctum.git <folder-name>

    2. cd <folder-name>

    3. composer install

    4. cp .env.example .env

    5. php artisan key:generate

    6. php artisan migrate

    7. php artisan db:seed

    8. php artisan serve
```
## POSTMAN
```bash
    1. open postman

    2. import new file

    3. select Postman/.editorconfig
```

## API
### Authentication API
#### Register

```http
  POST /api/register
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Required, String, Max:255**. Your Name |
| `email`      | `string` | **Required, String, Email, Max:255**. Your Email |
| `password`      | `string` | **Required, String, Min:8, Confirmed**. Your Password |
| `password_confirmation`      | `string` | **Required**. Your Password Confirmation |

#### Login

```http
  POST /api/login
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required**. Your Email |
| `password` | `string` | **Required**. Your Password |

### Task API
### Create New Task :

```http
  POST /api/task
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `bearer token` | **Required**. Your API Key |
| `title` | `char` | **Required, String, Max:200**. Task Title |
| `description` | `longText` | **Required, String**. Task Description |
| `m_category_task_id` | `bigInteger` | **Required, exists:m_category_task,id**. Task Category ID |

### Get All Task :

```http
  GET /api/tasks
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `bearer token` | **Required**. Your API Key |

### Get Task By ID :

```http
  GET /api/task/{id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `bearer token` | **Required**. Your API Key |
| `id` | `string` | **Required**. Task ID |

### Update Task By ID :

```http
  PATCH /api/task/{id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `bearer token` | **Required**. Your API Key |
| `id` | `string` | **Required**. Task ID |

### Delete Task By ID :

```http
  DELETE /api/task/{id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `bearer token` | **Required**. Your API Key |
| `id` | `string` | **Required**. Task ID |

### Master Data Category API :

### Create Category :

```http
  POST /api/m_category_task
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `bearer token` | **Required**. Your API Key |
| `name` | `string` | **Required, String, Max:50**. Category Name |

### Get All Categories :

```http
  GET /api/m_category_task
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `bearer token` | **Required**. Your API Key |

### Get Category By ID :

```http
  GET /api/m_category_task/{id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `bearer token` | **Required**. Your API Key |
| `id` | `string` | **Required**. Category ID |

### Update Category By ID :

```http
  PATCH /api/m_category_task/{id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `bearer token` | **Required**. Your API Key |
| `id` | `string` | **Required**. Category ID |

### Delete Category By ID :

```http
  DELETE /api/m_category_task/{id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `bearer token` | **Required**. Your API Key |
| `id` | `string` | **Required**. Category ID |
