# Projet de Gestion des Ressources Humaines

Un système complet de gestion des ressources humaines développé avec Laravel, structuré en modules indépendants pour une meilleure organisation et maintenance.

## Description

Ce projet est une solution complète pour la gestion des ressources humaines d'une entreprise. Il est divisé en plusieurs modules spécialisés qui peuvent fonctionner indépendamment ou être intégrés pour former un système complet.

## Structure du Projet

Le projet est organisé en plusieurs modules Laravel indépendants :

- **GestionEmployees** : Gestion des informations des employés
- **GestionConges** : Gestion des demandes et suivis des congés
- **GestionEvaluations** : Gestion des évaluations de performance
- **GestionFormations** : Gestion des formations professionnelles
- **GestionRespRH** : Outils pour les responsables RH

## Fonctionnalités

### Module de Gestion des Employés
- Ajout, modification et suppression des profils d'employés
- Recherche et filtrage des employés
- Suivi des informations personnelles et professionnelles

### Module de Gestion des Congés
- Demande de congés par les employés
- Approbation/refus des congés
- Suivi des soldes et historiques des congés
- Différents types de congés (maladie, payés, etc.)

### Module de Gestion des Évaluations
- Création et gestion des évaluations de performance
- Attribution de notes et commentaires
- Historique des évaluations par employé
- Rapports d'évaluation

### Module de Gestion des Formations
- Catalogue de formations disponibles
- Inscription des employés aux formations
- Suivi de progression des formations
- Évaluation des formations

### Module de Gestion pour les Responsables RH
- Tableaux de bord et rapports RH
- Outils d'analyse et statistiques
- Gestion des accès et permissions

## Prérequis

- PHP >= 8.0
- Composer
- MySQL ou tout autre SGBD compatible avec Laravel
- Serveur web (Apache/Nginx)
- Node.js et npm (pour la compilation des assets)

## Installation

1. Clonez le dépôt sur votre serveur web local ou distant
   ```
   git clone [URL_DU_REPO]
   ```

2. Pour chaque module, effectuez les étapes suivantes :
   ```
   cd [NOM_DU_MODULE]
   composer install
   cp .env.example .env
   php artisan key:generate
   ```

3. Configurez les connexions de base de données dans chaque fichier `.env`

4. Lancez les migrations pour créer les structures de base de données
   ```
   php artisan migrate
   ```

5. (Optionnel) Ajoutez des données de test
   ```
   php artisan db:seed
   ```

6. Compilez les assets si nécessaire
   ```
   npm install
   npm run dev
   ```

## Configuration

Chaque module peut être configuré indépendamment via son propre fichier `.env`. Les principales configurations concernent :
- Connexion à la base de données
- Paramètres de messagerie pour les notifications
- Paramètres d'authentification

## Utilisation

Chaque module dispose de son propre point d'entrée via un serveur web :

- Gestion des Employés : `/GestionEmployees/public`
- Gestion des Congés : `/GestionConges/public`
- Gestion des Évaluations : `/GestionEvaluations/public`
- Gestion des Formations : `/GestionFormations/public`
- Outils Responsables RH : `/GestionRespRH/public`

Vous pouvez également configurer un serveur web pour rediriger vers ces différents modules depuis un portail commun.

## Routes principales

### Module Employés
- `/employees` - Liste des employés
- `/employees/create` - Création d'un employé
- `/employees/{id}` - Détails d'un employé
- `/employees/{id}/edit` - Édition d'un employé

### Module Congés
- `/conges` - Liste des demandes de congés
- `/conges/create` - Nouvelle demande de congé
- `/conges/{id}` - Détails d'une demande
- `/conges/{id}/edit` - Modification d'une demande

### Module Évaluations
- `/evaluations` - Liste des évaluations
- `/evaluations/create` - Création d'une évaluation
- `/evaluations/{id}` - Détails d'une évaluation
- `/evaluations/{id}/edit` - Modification d'une évaluation

## Développement

Le projet suit l'architecture MVC de Laravel :
- `app/Models` - Modèles de données
- `app/Http/Controllers` - Contrôleurs
- `resources/views` - Vues
- `routes` - Définition des routes
- `database/migrations` - Migrations de base de données

## Contributions

Les contributions au projet sont les bienvenues. Veuillez suivre ces étapes :
1. Forker le projet
2. Créer une branche pour votre fonctionnalité
3. Commiter vos changements
4. Pousser vers la branche
5. Ouvrir une Pull Request

## Contact

Pour toute question ou suggestion concernant ce projet, veuillez contacter moetazbelhadj15@gmail.com .
