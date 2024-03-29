# Instructions of the project #
|           #             |   **Instructions**      |
|-------------------------|-------------------------|
| Step-1                  |   [Setup Nuxt project](#q1)<br>[Setup Laravel project](#q2)<br>|
| Short brief             |   [User Authentication and Authorization](#q3)<br>|


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
# Short brif
Database structure for `users` table.
  1. User have id, username, email, email_verified_at, password, remember_token, created_at, updated_at, deleted_at, role_id.
  2. In the `users` table `role_id` define the employee role like is he/she a Manager or Teammate.
  3. When any user `register` from the registration page he/she will play as a Manager role.
  4. When `Manager` create a user as `Teammate` The user password will be `password` which is generated from `generateDefaultPassword` function.

