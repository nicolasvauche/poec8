# Symfony POEC8  
Une application web basée sur Symfony 6.  

## Pré-requis  
- LAMP :
  - Linux core OS
  - Apache ^2.4
  - MySQL ^8.0
  - PHP ^8.1
- Symfony CLI ^5.4
- NodeJS ^16.18
- Yarn ^1.22

## Installation  
1. Dans votre environnement LAMP, décompressez ou clonez ce repository dans son propre dossier  
2. Dupliquez le fichier `.env` et renommer le nouveau en `.env.local`, renseigner la ligne de connexion à la base de données avec votre configuration locale  
3. Installer les dépendances backend du projet : `composer install`  
4. Initialiser la base de données : 
   - `php bin/console doctrine:database:create` (pour créer la base de données)  
   - `php bin/console doctrine:migrations:migrate` (pour créer les tables)  
   - `php bin/console doctrine:fixtures:load` (pour insérer les données initiales)  
   - `php bin/console cache:clear` (pour réinitialiser le cache)  
5. Installer les dépendances frontend du projet : `yarn install`  
6. Créer le dossier `/public/build` pour Webpack Encore : `yarn encore dev`  
7. Lancer le server avec Symfony CLI : `symfony server:start`  

