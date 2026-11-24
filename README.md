<p align="center">
  <img src="public/static/logo.png" alt="FoodShala logo" width="96">
</p>

<h1 align="center">FoodShala</h1>

<p align="center">
  A small food-ordering website: restaurants list their dishes, and customers browse one shared menu and order.<br>
  Built in PHP on CodeIgniter 4 with MySQL, in under a week.
</p>

<p align="center">
  <a href="https://shubhamd13.github.io/projects/foodshala/">Project write-up</a>
</p>

---

## About

I built FoodShala on my own in June–July 2020 as the take-home assignment for a web developer role at Internshala. The brief was a working food-ordering site with separate restaurant and customer accounts, hosted online. I designed the database, wrote the app, and deployed it to AWS. That deployment has since been shut down, so this repository is the record of the project.

## Features

**Restaurants**

- Register with the restaurant's name, address, and FSSAI licence number.
- Add dishes with a name, a short description, a price in rupees, and a veg or non-veg tag.
- See their own menu, and a list of incoming orders showing who ordered which dish and when.

**Customers**

- Register with their name, address, and a veg or non-veg preference.
- Browse every restaurant's dishes on one menu, and hide non-veg dishes with a **Veg-Only** toggle.
- Order a dish with **Buy Now**, then check their order history.

Anyone can browse the menu without signing in. Buy Now sends signed-out visitors to the sign-in page.

**Security**

- Passwords are stored as bcrypt hashes.
- Every restaurant-only or customer-only page checks the session's account type, so customers can't add dishes and restaurants can't place orders.
- Validation runs on the server through the model rules, and in the browser through jQuery Validation. Input is sanitised, and output is HTML-escaped.

## Tech stack

| Layer    | Tools                                                     |
| -------- | --------------------------------------------------------- |
| Backend  | PHP 7.2+, [CodeIgniter 4.0.3](https://codeigniter.com/)   |
| Database | MySQL (InnoDB)                                            |
| Frontend | Bootstrap 4.5, jQuery, jQuery Validation, Font Awesome    |
| Hosting  | AWS Elastic Beanstalk (app) and Amazon RDS for MySQL (DB) |

## Project layout

Only `app/` and `foodshala.sql` are mine. `system/` is the CodeIgniter 4 framework, included unchanged.

```text
app/
├── Config/Routes.php      URL → controller mapping
├── Controllers/           Login, Registration, Menu, Restaurant, Order
├── Models/                One model per table, with its validation rules
├── Entities/              Row objects; Customer and Restaurant hash and check passwords
└── Views/                 Bootstrap pages (menu, sign-in, sign-up, add dish, orders)
public/                    Web root: index.php and static images
foodshala.sql              Database schema
```

## Database

```text
restaurants (id, restaurantname, email, password, fssain, address)
customers   (id, firstname, lastname, email, password, address, preference)
item        (id, dishname, description, price, preference, restaurant_id → restaurants)
orders      (id, cust_id → customers, restaurant_id → restaurants, item_id → item, created_at)
```

All foreign keys cascade on delete, so removing a restaurant also removes its dishes and their orders.

## Routes

| Method | Path                                          | Who        | What                        |
| ------ | --------------------------------------------- | ---------- | --------------------------- |
| GET    | `/`                                           | everyone   | Shared menu                 |
| GET    | `/login`                                      | signed out | Sign-in page (both roles)   |
| POST   | `/login/customer`, `/login/restaurant`        | signed out | Sign in                     |
| GET    | `/login/logout`                               | signed in  | Sign out                    |
| GET    | `/register/customer`, `/register/restaurant`  | signed out | Sign-up forms               |
| POST   | `/register/customer`, `/register/restaurant`  | signed out | Create an account           |
| GET    | `/addItem`                                    | restaurant | Add-dish form               |
| POST   | `/addItem`                                    | restaurant | Save a dish                 |
| GET    | `/viewItems`                                  | restaurant | Own menu                    |
| GET    | `/order/{itemId}`                             | customer   | Order a dish                |
| GET    | `/viewOrders`                                 | both       | Incoming orders / my orders |

## Running it locally

You need PHP 7.2 or newer with the `intl`, `mbstring`, and `mysqlnd` extensions, and a MySQL server.

1. Create a database and load the schema:

   ```bash
   mysql -u root -p -e "CREATE DATABASE foodshala"
   mysql -u root -p foodshala < foodshala.sql
   ```

2. Create a `.env` file in the project root. It is git-ignored, so your credentials stay local:

   ```ini
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'

   database.default.hostname = localhost
   database.default.database = foodshala
   database.default.username = your_mysql_user
   database.default.password = your_mysql_password
   database.default.DBDriver = MySQLi
   ```

3. Start CodeIgniter's development server and open <http://localhost:8080>:

   ```bash
   php spark serve
   ```

4. Register a restaurant and add a few dishes. Then sign out, register a customer, and place an order.

## Status

This is an archived 2020 project, written for CodeIgniter 4.0.3 and PHP 7.2–7.4, and it isn't maintained. It may need small fixes to run on current PHP or CodeIgniter releases.

## License

The CodeIgniter framework under `system/` is MIT-licensed by the British Columbia Institute of Technology and the CodeIgniter Foundation. See [license.txt](license.txt).
