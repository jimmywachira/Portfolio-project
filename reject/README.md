# RareFinds Marketplace: Connecting the Seekers with the Found

## Overview

RareFinds Marketplace is a web application designed to be a dedicated platform for buying and selling rare, discontinued, vintage, and otherwise hard-to-find items, including individual parts and components. It aims to solve the challenge of connecting individuals who possess these unique goods with those actively seeking them, fostering a community around the appreciation and preservation of rare finds.

This project was developed as a portfolio piece to showcase my skills in full-stack web development using PHP and Tailwind CSS.

## Key Features (MVP)

* **User Registration and Authentication:** Securely create and manage user accounts for both buyers and sellers.
* **Product Listing:** Sellers can easily create detailed listings for their rare items, including title, description, price, category, condition, and multiple images.
* **Product Browsing and Search:** Buyers can browse listings by category or use a keyword search to find specific items. Filtering options (e.g., category, condition, price) are available to refine search results.
* **Product Detail View:** Comprehensive pages display all information about a listed item, including images, descriptions, seller details, and contact information.
* **Basic Inquiry System:** Buyers can contact sellers directly through the platform to ask questions or express interest in an item.
* **User Profiles:** Registered users have a profile page to view their listings and manage their account information.

## Technologies Used

* **Backend:** PHP (Utilizing a custom MVC-inspired structure)
* **Frontend:** HTML, Tailwind CSS (for styling and responsive design)
* **Database:** MySQL
* **Composer:** PHP dependency management

## Getting Started

To run this project locally, please follow these steps:

### Prerequisites

* **PHP:** Version 7.4 or higher
* **MySQL:** Installed and running
* **Composer:** Installed globally
* **Web Server:** (e.g., Apache or Nginx)

### Installation

1.  **Clone the repository:**
    ```bash
    git clone [https://github.com/jimmywachira/portfolio-project.git](https://www.google.com/search?q=https://github.com/jimmywachira/portfolio-project.git)
    cd portfolio-project
    ```

2.  **Install PHP dependencies using Composer:**
    ```bash
    composer install
    ```

3.  **Database Setup:**
    * Create a new MySQL database (e.g., `rarefinds`).
    * Import the database schema from `database/schema.sql` (if included, otherwise you'll need to create the tables manually based on the models).
    * Update the database connection details in `config/database.php` with your MySQL credentials:
        ```php
        <?php
        return [
            'host' => 'localhost',
            'database' => 'your_database_name', // Replace with your database name
            'username' => 'your_username',     // Replace with your database username
            'password' => 'your_password',     // Replace with your database password
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
        ];
        ```

4.  **Web Server Configuration:**
    * Configure your web server (Apache or Nginx) to point the document root to the `public/` directory of the project.
    * **Apache Example (`.htaccess` in `public/`):** Ensure `mod_rewrite` is enabled. A basic `.htaccess` file might look like this:
        ```apache
        <IfModule mod_rewrite.c>
            RewriteEngine On
            RewriteBase /

            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            RewriteRule ^(.*)$ index.php?/$1 [L]
        </IfModule>
        ```
    * **Nginx Example (in your site configuration):**
        ```nginx
        server {
            listen 80;
            server_name your_domain.com;
            root /path/to/your/portfolio-project/public;
            index index.php index.html;

            location / {
                try_files $uri $uri/ /index.php?$query_string;
            }

            location ~ \.php$ {
                include snippets/fastcgi-php.conf;
                fastcgi_pass unix:/run/php/php7.4-fpm.sock; # Adjust path based on your PHP version
            }

            location ~ /\.ht {
                deny all;
            }
        }
        ```

5.  **Start the Web Server:** Ensure your Apache or Nginx server is running.

6.  **Access the Application:** Open your web browser and navigate to `http://localhost` (or your configured domain).

## Code Structure

The project follows a basic MVC-inspired structure:

* **`public/`:** Contains the front controller (`index.php`) and static assets (CSS, JavaScript, images).
* **`src/`:** Contains the core application logic:
    * `Controllers/`: Handles user requests and interacts with models.
    * `Models/`: Represents data and handles database interactions.
    * `Core/`: Contains core classes and functions (e.g., routing, database connection).
* **`views/`:** Contains the HTML templates rendered by the application.
    * `partials/`: Reusable view components (e.g., header, footer).
* **`config/`:** Configuration files (e.g., database settings).
* **`database/`:** Contains database-related files (e.g., schema SQL file - if included).
* **`composer.json` and `composer.lock`:** Composer dependency files.
* `.gitignore`: Specifies intentionally untracked files that Git should ignore.
* `README.md`: The current documentation file.

## Contributing

While this was a solo project for portfolio purposes, if you have suggestions or find issues, feel free to open an issue on the GitHub repository.

## License

[Specify your project license here, e.g., MIT License]

## Contact

[Your Name] - [Your Email Address] - [Your LinkedIn Profile URL (Optional)]

---

**Example of Enhanced Code Documentation (Illustrative - Add these to your actual PHP files):**

```php
<?php

namespace App\Controllers;

use App\Models\Product;
use App\Core\View;

/**
 * Controller for handling product-related actions.
 */
class ProductController
{
    /**
     * Displays a list of all products.
     *
     * @return void
     */
    public function index()
    {
        $products = Product::all(); // Fetch all products from the database
        View::render('products/index', ['products' => $products]); // Render the product listing view
    }

    /**
     * Displays the details for a specific product.
     *
     * @param int $id The ID of the product to display.
     * @return void
     */
    public function show($id)
    {
        $product = Product::find($id); // Find the product by its ID

        if ($product) {
            View::render('products/show', ['product' => $product]); // Render the product detail view
        } else {
            // Handle case where product is not found (e.g., redirect to 404)
            header("HTTP/1.0 404 Not Found");
            View::render('errors/404');
        }
    }

    /**
     * Handles the submission of a new product listing.
     *
     * @return void
     */
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $phone_number = htmlspecialchars($_POST['phone_number']);
            $category = htmlspecialchars($_POST['category']);
            $user_id = $_SESSION['user_id'] ?? 1; // Assuming user authentication

            if (!empty($title) && !empty($description) && is_numeric($price) && !empty($phone_number) && !empty($category)) {
                $product = new Product();
                $product->title = $title;
                $product->description = $description;
                $product->price = $price;
                $product->phone_number = $phone_number;
                $product->category = $category;
                $product->user_id = $user_id;
                $product->save(); // Save the new product to the database

                // Redirect to the product listing page or display a success message
                header('Location: /products');
                exit();
            } else {
                // Display error message if validation fails
                $error = "Please fill in all fields correctly.";
                View::render('products/create', ['error' => $error]);
            }
        } else {
            // Display the product creation form
            View::render('products/create');
        }
    }
}