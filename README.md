# Forum étudiant multilingue

## Description

Ceci est un forum construit avec Laravel. Il permet aux utilisateurs de créer, gérer et afficher des articles en plusieurs langues. Le système prend en charge l'authentification des utilisateurs, le contrôle d'accès basé sur les rôles et diverses fonctionnalités adaptées aux administrateurs et aux étudiants.

## Fonctionnalités

-   Authentification et autorisation des utilisateurs
-   Support multilingue (anglais, français)
-   Contrôle d'accès basé sur les rôles (Admin, Étudiant)
-   Création et gestion d'articles
-   Téléchargement et gestion de documents
-   Sélecteur de langue

## Installation

1. Clonez le dépôt :

```
git clone https://github.com/redouaneT/maisonneuve.git
```

2. Allez dans le répertoire du projet :

```
cd maisonneuve
```

3. Installez les dépendances :

```
composer install
```

4. Copiez le fichier `.env.example` pour créer un nouveau fichier `.env` :

```
cp .env.example .env
```

5. Mettez à jour le fichier `.env` avec la configuration de votre base de données et autres paramètres.

6. Générez une clé d'application :

```
php artisan key:generate
```

7. Lancez les migrations et peuplez la base de données (facultatif) :

```
php artisan migrate --seed
```

8. Démarrez le serveur de développement local :

```
php artisan serve
```

L'application devrait maintenant être accessible à l'adresse `http://localhost:8000`.

## Démo

Une démonstration en direct du projet peut être trouvée à [ce lien](https://e2295517.webdev.cmaisonneuve.qc.ca/maisonneuve/).

https://e2295517.webdev.cmaisonneuve.qc.ca/maisonneuve/

## Contribuer

Si vous souhaitez contribuer au projet, veuillez suivre ces étapes :

1. Faites un fork du dépôt
2. Créez une nouvelle branche avec vos modifications
3. Soumettez une demande d'extraction (pull request)

## Licence

Ce projet est sous licence [MIT License](LICENSE.md).
