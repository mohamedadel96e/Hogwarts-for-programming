# Hogwarts for Programming

## 📌 Introduction

Hogwarts for Programming is a PHP-based application designed to help Magicians improve their coding skills in a structured and engaging way. This repository provides all necessary setup instructions to get the project running on your local machine.

---

## 🛠 Prerequisites

Before setting up the project, ensure you have the following installed on your machine:

- **PHP** (version 7.4 or higher)
    
  - [Intall Here](https://www.php.net/downloads)

- **Composer** (PHP dependency manager)
  - [Intall Here](https://getcomposer.org/download/)

    
- **MySQL** (or a compatible database system)
  - [Intall Here](https://dev.mysql.com/downloads/)


---

## 🚀 Getting Started

Follow these steps to set up the project:

### 1️⃣ Clone the Repository

```shell
git clone https://github.com/mohamedadel96e/Hogwarts-for-programming.git
cd Hogwarts-for-programming
```

### 2️⃣ Install Dependencies

```shell
composer install
```

### 3️⃣ Set Up the Database

#### Create a new database:

```sql
CREATE DATABASE hogwarts;
```

#### Update database credentials in `config/config.php` if necessary.

#### Import the schema:

```
mysql -u <username> -p hogwarts < Database/Schema.sql
```

### 4️⃣ Start the Development Server

```
php -S localhost:8000
```

### 5️⃣ Open in Browser

Navigate to:

```
http://localhost:8000
```

---

## 📂 Project Structure

```
Hogwarts-For-Programming/
│── assets/        # Static assets (CSS, JS, images, etc.)
│── config/        # Configuration files (database, app settings)
│── controllers/   # Controllers handling application logic
│── Database/      # Database scripts and migrations
│── includes/      # Reusable scripts and helpers
│── middleware/    # Middleware for request handling
│── models/        # Database models
│── uploads/       # User-uploaded files
│── vendor/        # Composer dependencies (auto-generated)
│── views/         # Frontend views (HTML, Blade, or Twig templates)
│── .gitignore     # Specifies files to exclude from version control
│── .htaccess      # Apache configuration file
│── bootstrap.php  # Application bootstrap file
│── composer.json  # Composer dependencies and autoloading
│── composer.lock  # Locked versions of dependencies
│── index.php      # Main entry point of the application
│── LICENSE        # Project license
│── README.md      # Documentation for setup and usage
│── routes.php     # Application routes definition
```

---

## 🏗 Contribution Guidelines

If you would like to contribute:

1. Fork the repository.
    
2. Create a new branch (`git checkout -b feature-branch`).
    
3. Make your changes and commit (`git commit -m 'Add new feature'`).
    
4. Push to your fork and submit a pull request.
    

---

## 📜 License

This project is licensed under the MIT License.

---

## 📧 Contact

For any issues or questions, feel free to open an issue in the repository or reach out to the maintainers.

Happy coding! 🧙‍♂️✨