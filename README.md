# SAE-FAGE-Ethan-Alexandre-Eric-Jim-205

Groupe 205 : 
- Ethan
- Alexandre
- Jim
- Eric



# POUR BIEN LE LANCER CHEZ VOUS

1. PRÉPARATION Télécharger XAMPP (si vous l'avez pas) --> Installer tout par défaut. Ouvrir XAMPP --> Cliquer sur Start pour Apache --> Cliquer sur Start pour MySQL.

2. LES FICHIERS Dézipper mon fichier --> Prendre le dossier fage. Aller dans C: --> xampp --> htdocs. Coller le dossier fage ici --> Vous devez avoir C:\xampp\htdocs\fage.

3. LA BASE DE DONNÉES Aller sur http://localhost/phpmyadmin --> Cliquer sur Nouvelle. Nom de la base : fage_bdd --> Créer. Cliquer sur l'onglet Importer --> Choisir le fichier fage_bdd.sql (il est dans le dossier du site) --> Valider en bas.

4. C'EST FINI ! Aller sur --> http://localhost/fage

🔑 Compte Admin : Email --> admin@fage.fr Mdp --> admin

# Lien pour ouvrir le site sinon en version heberger :

Pour faciliter la correction et les tests, nous avons déployé une version en ligne du site.
**Vous pouvez y accéder directement ici :**



# DIAGRAMME ARCHITECTURE SITE

```text
fage/
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── script.js
│
├── includes/
│   ├── db.php
│   ├── footer.php
│   ├── head.php
│   ├── navbar.admin.php
│   ├── roleverif.php
│   ├── nav.php
│   └── router.php
│
├── pages/
│   ├── accueil.php
│   ├── actualites.php
│   ├── admin.php
│   ├── admin_actus.php
│   ├── admin_benevoles.php
│   ├── admin_missions.php
│   ├── admin_newsletter.php
│   ├── Civique.php
│   ├── Droit.php
│   ├── Fage.php
│   ├── formationFage.php
│   ├── guideElu.php
│   ├── login.php
│   ├── logout.php
│   ├── missions.php
│   ├── newsletter.php
│   ├── read.php
│   └── scolariteEtudiant.php
│
├── sql/
│   └── fage_bdd.sql
│
└── index.php           # Point d’entrée principal de l’application
