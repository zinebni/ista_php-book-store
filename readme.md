# Practical Work: Library Management System with PHP & MySQL

This repository contains a practical academic lab (TP 8) designed to practice relational database manipulation using MySQL and PHP interactive forms to perform complete CRUD operations (Create, Read, Update, Delete).

---

## 🎯 Objectives

- Learn relational database management using MySQL.
- Interact with the database through PHP web forms.
- Build a full management system for students and books.

---

## 🛠️ Project Structure & Architecture

### 1. Database Creation & Configuration
- **`biblio.sql`**: SQL DDL script to generate database tables based on the MCD conceptual schema.
- **Import**: Database named `biblio` hosted and managed via phpMyAdmin.

### 2. Connection Management
- **`connexion.php`**: Script handling connection establishment with the MySQL server.
- **`deconnexion.php`**: Script handling clean session teardown and database disconnection.

### 3. Student Management Module (`Gestion des étudiants`)
A main navigation menu indexes the following functional pages:
- **Insertion**:
  - `nouveauEtudiant.php`: Input form to register a new student.
  - `nouveauEtud_action.php`: Server-side processing script inserting data into the `Etudiant` table.
- **Selection & Search**:
  - `listeEtudiants.php`: Dynamic view displaying the complete student roster.
  - `recherheEtud.php`: Filtered search form.
  - `rechercheEtud_action.php`: Query handler returning search results based on selected criteria.
- **Modification**:
  - `modifierEudiant.php`: Checks student existence (redirects to form or displays *"Etudiant introuvable !*").
  - `modifierEudiant_Form.php`: Pre-filled update form for editing record details.
- **Deletion**:
  - `supprimerEudiant.php`: Student deletion lookup form by ID/code.
  - `supprimerEtud_action.php`: Handles record deletion in the database.

### 4. Book Management Module (`Gestion des Livres`)
- Mirror implementation of full CRUD operations (Insertion, Listing, Search, Update, Deletion) dedicated to managing book inventory.

---

## 💻 Prerequisites & Setup

1. Clone this repository into your local web server root directory (e.g., `htdocs` for XAMPP or `www` for WampServer):
   ```bash
   git clone [https://github.com/zinebni/ista_php-book-store.git](https://github.com/zinebni/ista_php-book-store.git)
    ```
2. Import the `biblio.sql` file into your MySQL database using phpMyAdmin or any MySQL client.
3. Ensure your PHP environment is running (e.g., start Apache and MySQL services in XAMPP/WampServer).
4. Access the application via your web browser at `http://localhost/ista_php-book-store`.
