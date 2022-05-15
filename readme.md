# TP  : Gestion d'une Bibliothèque avec PHP et MySQL

Ce projet est un travail pratique (TP 8) visant à appréhender la manipulation des bases de données MySQL à travers des formulaires PHP et la gestion du CRUD (Create, Read, Update, Delete).

---

## 🎯 Objectifs

- Apprendre la manipulation des bases de données relationnelles avec MySQL.
- Interagir avec la base de données à l'aide de formulaires PHP interactifs.
- Mettre en place un système complet de gestion pour les étudiants et les livres.

---

## 🛠️ Structure & Contenu du TP

### 1. Création et Configuration de la Base de Données
- **`biblio.sql`** : Script SQL contenant le DDL pour la création des tables basées sur le modèle MCD.
- **Importation** : Base de données `biblio` exécutée et gérée via phpMyAdmin.

### 2. Connexion & Déconnexion
- **`connexion.php`** : Script établissant la connexion avec le serveur de base de données MySQL.
- **`deconnexion.php`** : Script permettant d'assurer la fermeture propre de la session et de la connexion.

### 3. Gestion des Étudiants (`Gestion des étudiants`)
Un menu d'indexation permet de naviguer à travers les fonctionnalités suivantes :
- **Insertion** :
  - `nouveauEtudiant.php` : Formulaire de saisie des informations d'un nouvel étudiant.
  - `nouveauEtud_action.php` : Script d'insertion des données récupérées dans la table `Etudiant`.
- **Sélection / Recherche** :
  - `listeEtudiants.php` : Affichage dynamique de la liste complète des étudiants.
  - `recherheEtud.php` : Formulaire de recherche par critère.
  - `rechercheEtud_action.php` : Traitement et affichage des résultats selon le critère choisi.
- **Modification** :
  - `modifierEudiant.php` : Vérification de l'existence de l'étudiant (redirection ou message « *Etudiant introuvable !* »).
  - `modifierEudiant_Form.php` : Formulaire pré-rempli pour mettre à jour les données.
- **Suppression** :
  - `supprimerEudiant.php` : Formulaire de demande de suppression par identifiant/code.
  - `supprimerEtud_action.php` : Traitement de la suppression dans la base de données.

### 4. Gestion des Livres (`Gestion des Livres`)
- Mise en œuvre des fonctionnalités équivalentes (Insertion, Affichage, Recherche, Modification, Suppression) dédiées à la gestion des livres.

---

## 💻 Prérequis & Installation

1. Clonez ce dépôt dans le répertoire web de votre serveur local (ex. `htdocs` pour XAMPP ou `www` pour WampServer) :
   ```bash
   git clone [https://github.com/zinebni/ista_php-book-store.git](https://github.com/zinebni/ista_php-book-store.git)