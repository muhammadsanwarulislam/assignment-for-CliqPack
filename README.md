# Instructions of the project #
|           #             |   **Instructions**      |
|-------------------------|-------------------------|
| Step-1                  |   [Setup Nuxt project](#q1)<br>[Setup Laravel project](#q2)<br>|
| Short brief             |   [Api documentation](#q3)<br>|


## Q1
# Backend APP Or Admin Dashboard(Nuxt js) installations
Follow the steps mentioned below to install and run the project.
For both **frontend**
1. Clone or download the repository
2. Run the command `npm install`
3. Run `npm run dev` from the project root and visit `http://localhost:3000/`


## Q2
# Backend API(Laravel) installations
Follow the steps mentioned below to install and run the project.

1. Clone or download the repository
2. Go to the project directory and run `composer install`
3. Create `.env` file by copying the `.env.example`. You may use the command to do that `cp .env.example .env`
4. Update the database name and credentials in `.env` file
5. Run the command `php artisan migrate:fresh --seed`
6. If you get such kind of things 'Personal access client not found or Please create one' then run `php artisan passport:install`
7. Run the command `php artisan serve` to check api functionality
8. To login as a Manager provide email `manager@gmail.com`and password `password`
9. To login as a Teammate provide email `teammate@gmail.com`and password `password`



## Q3
# API Documentation

## Login

### Description
This API endpoint allows users to log in to the system.

### Endpoint
```
POST /api/login
```

### Request Parameters
- `email` (string, required): The email of the user.
- `password` (string, required): The password of the user.

### Request Example
```json
POST /api/login
Content-Type: application/json

{
  "email": "example_user",
  "password": "example_password"
}
```

### Response Example (Success)
```json
Status: 200 OK
Content-Type: application/json

{
  "access_token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."
}
```

### Response Example (Error)
```json
Status: 401 Unauthorized
Content-Type: application/json

{
  "error": "Invalid username or password"
}
```

## Registration

### Description
This API endpoint allows users to register for a new account.

### Endpoint
```
POST /api/register
```

### Request Parameters
- `username` (string, required): The desired username for the new account.
- `password` (string, required): The password for the new account.
- `email` (string, required): The email address for the new account.

### Request Example
```json
POST /api/register
Content-Type: application/json

{
  "username": "new_user",
  "password": "new_password",
  "email": "new_user@example.com"
}
```

### Response Example (Success)
```json
Status: 201 Created
Content-Type: application/json

{
  "message": "User registered successfully"
}
```

### Response Example (Error)
```json
Status: 400 Bad Request
Content-Type: application/json

{
  "error": "Username already exists"
}
```

## Inventory

### Description
This API endpoint manages the inventory of items.

### Item

#### Description
Represents an item in the inventory.

#### Attributes
- `id` (string, required): The unique identifier of the item.
- `name` (string, required): The name of the item.
- `description` (string, optional): The description of the item.
- `quantity` (integer, required): The quantity of the item.
- `price` (number, required): The price of the item.

### Endpoints

#### Create Item
```
POST /api/inventory/create
```
... (Add documentation for create item endpoint similar to previous examples)

#### Read Item
```
GET /api/inventory/{id}
```
... (Add documentation for read item endpoint similar to previous examples)

#### Update Item
```
PUT /api/inventory/update/{id}
```
... (Add documentation for update item endpoint similar to previous examples)

#### Delete Item
```
DELETE /api/inventory/delete/{id}
```
... (Add documentation for delete item endpoint similar to previous examples)
```
