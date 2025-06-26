# 🏡 Real Estate Listings Management

This web application helps manage rental and sale listings for a real estate agency. It was created as a first experience working with databases. Listings are stored in a MySQL database and dynamically displayed using PHP. Images are saved in a local folder, while their paths are stored in the database.

---

## 🚀 Key Features

* **🏠 Home**:

  * Displays all listings as cards (4 per row).
  * Each card contains: title, type (rental/sale), surface area, address, price, date, image, and description.
  * Two action buttons: **Edit** and **Delete**.
  * Filters available by type (Rental or Sale) and price range (min–max).

* **🔹 Edit Listing**:

  * Opens a modal or redirects to a page to update an existing listing.

* **🔹 Delete Listing**:

  * Opens a confirmation modal or page before deleting the selected listing.

* **➕ Add New Listing**:

  * Displays a form to insert a new listing into the database.
  * Automatically stores the current date as the listing date.

---

## ⚙️ Installation

1. Create a MySQL database and import the SQL file located at `config/annonces_table.sql`.
2. Update DB credentials in `config/db_connect.php`.
3. Deploy the project files on a PHP-supported server (e.g., Apache, Nginx + PHP-FPM).
4. Store listing images in the `images/` folder.

---

## 🧑‍💻 Usage

Open `index.php` to view listings. Use the filter form to search by type and price range. Add, edit, and delete listings via modals or dedicated pages.

---

## 🛠️ Tech Stack

* 🐘 PHP
* 🐬 MySQL
* 🌐 HTML / CSS
* ⚡ JavaScript

> ⚠️ This project is an educational exercise and focuses on basic CRUD with one table and image handling.

---

## 🎯 Learning Objectives

This project was built to practice key web development skills:

* ✅ **Database Modeling** using a predefined SQL file
* ✅ **Basic CRUD** (Create, Read, Update, Delete) functionality with PHP
* ✅ **Image Uploading** and storing file paths
* ✅ **User Interface Layouts** with card grids and modals
* ✅ **Filtering and Searching** by type and price range
* ✅ **Server-Side Logic** for managing structured data
* ✅ **Frontend-Backend Integration** in a simplified real estate context

---
## 🖥️ Screenshots

![image](https://github.com/user-attachments/assets/481db505-63cc-4c96-ad2f-95d381c4d87a)
![image](https://github.com/user-attachments/assets/1ed66243-1488-4a18-8b4a-cdd76a840b6b)
![image](https://github.com/user-attachments/assets/d5305752-7cab-4ef7-b622-c6c936f0f5ac)


