## 📋 Key Features

### 1\. Back-End (RESTful API)

  * **Product Management (CRUD):**
      * View product list.
      * Add new products.
      * Update product data.
      * Delete products.
  * **Transaction Management:**
      * Record product purchases.
      * **Stock Validation:** Transactions are rejected if there is insufficient stock.
      * **Automation:** Stock is automatically deducted & Total price is automatically calculated upon a successful transaction.

### 2\. Front-End (Web View)

  * Product list page using **Bootstrap 5**.
  * **DataTables** integration for search & pagination features.
  * **Modal Form** for adding products (UI Interaction).

### 3\. Proof of Successful Endpoints & Web View in the Screenshots Folder

-----

## 🛠️ Technologies Used

  * **Framework:** Laravel 10
  * **Language:** PHP 8.1+
  * **Database:** SQLite
  * **Frontend:** Bootstrap 5, jQuery, DataTables CDN
  * **Tools:** Postman (API Testing), VS Code

-----

## 🚀 Installation & Setup

Follow these steps to run the project on your local machine:

### 1\. Clone Repository / Extract Folder

Ensure you are inside the project folder via your terminal.

### 2\. Install Dependencies

```bash
composer install
```

### 3\. Environment & Database Configuration

This project is configured to use **SQLite**.

  * Copy the `.env.example` file to `.env`.
  * Ensure the database configuration in `.env` looks like this:

<!-- end list -->

```env
DB_CONNECTION=sqlite
DB_DATABASE_SQLITE="${PWD}/database/database.sqlite"
# DB_HOST, DB_PORT, etc. can be left empty/deleted
```

  * Create an empty database file (if it doesn't exist yet):

<!-- end list -->

```bash
touch database/database.sqlite
```

### 4\. Run Migrations

To create the `products` and `transactions` tables and reset data:

```bash
php artisan migrate:fresh
```

### 5\. Run Server

```bash
php artisan serve
```

Access the project at: `http://127.0.0.1:8000`

-----

## 📖 API Documentation (Back-End)

Use Postman to test the following endpoints:

### 1\. Products

  * **GET** `/api/products` - Fetch all data.
  * **POST** `/api/products` - Add data.
      * *Body (JSON):*
        ```json
        {
            "name": "Gaming Laptop",
            "price": 15000000,
            "stock": 10
        }
        ```
  * **PUT** `/api/products/{id}` - Edit data.
  * **DELETE** `/api/products/{id}` - Delete data (Soft delete).

### 2\. Transactions

  * **POST** `/api/transactions`
      * *Body (JSON):*
        ```json
        {
            "product_id": 1,
            "quantity": 2
        }
        ```
      * *Note:* Stock will automatically decrease and `total_price` will be calculated by the system.

-----

## 🖥️ Web Page Access (Front-End)

To view the UI implementation:

1.  Ensure the server is running (`php artisan serve`).
2.  Open your browser and visit the URL:
    > **[http://127.0.0.1:8000/products-view](http://127.0.0.1:8000/products-view)**

### Web Page Features:

  * **Table:** Displays real-time product data from the database.
  * **DataTables:** Try the "Search" feature in the top right corner of the table.
  * **Add Product:** Click the **"+ Add Product"** button to open the Bootstrap Modal.

-----

## 👤 Author
Bryan Chan
