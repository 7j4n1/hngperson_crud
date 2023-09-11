# Simple CRUD API Documentation

Welcome to the CRUD API documentation Laravel application. This API allows you to create, read, update, and delete person records.

## Table of Contents

- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [API Endpoints](#api-endpoints)
- [Request and Response Formats](#request-and-response-formats)
- [Sample Usage](#sample-usage)
- [License](#license)

## Getting Started

### Prerequisites

Before you start, make sure you have the following prerequisites installed on your system:

- PHP (>= 7.4)
- Composer
- Laravel (>= 8.x)
- Database (e.g., MySQL, PostgreSQL)

### Installation

1. Clone this repository:

   ```bash
   git clone https://github.com/7j4n1/hngperson_crud.git
   cd hngperson_crud 
   ```

2. Install PHP dependencies using Composer:

    ```bash
    composer install
    ```
3. Create a .env file by copying the .env.example file and configure your database settings:
    ```bash
    cp .env.example .env
    ```
    Configure the database config variables as follows:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    ```
4. Run the migrations:
    ```bash
    php artisan migrate
    ```
5. Start the development server:
    ```bash
    php artisan serve

    ```
    Laravel API is now up and running!

### API Endpoints

### Request and Response Formats
The API uses JSON for both requests and responses. The following table describes the JSON format for the requests and responses:

<table>
    <thead>
        <th> Requests </th>
        <th> Response </th>
    </thead>
    <tbody>
        <tr>
            <td>POST /api</td>
            <td>201 Created with the newly created person in the response body</td>
        </tr>
        <tr>
            <td>GET /api</td>
            <td>200 OK with an array of people in the response body.</td>
        </tr>
        <tr>
            <td>GET /api/{id}</td>
            <td>200 OK with the person with the specified id in the response body.</td>
        </tr>
        <tr>
            <td>PUT /api/{id}</td>
            <td>200 OK with the updated person in the response body.</td>
        </tr>
        <tr>
            <td>PATCH /api/{id}</td>
            <td>200 OK with the updated person in the response body.</td>
        </tr>
        <tr>
            <td>DELETE /api/{id}</td>
            <td>204 No Content</td>
        </tr>
    </tbody>
</table>

### Sample Usage

The following code shows how to create a new person using the API:
```php
<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_PORT => "8000",
  CURLOPT_URL => "{{base_url}}/api",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'name' => 'Ahmad Dawud'
  ]),
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
```

Response
```
{
  "data": {
    "id": 1,
    "name": "Ahmad Dawud"
  },
  "message": "new person name saved successfully"
}
```