pass
====

Pass est un gestionnaire de mots de passe dédié pour la gestion des mots de passe de manière collaborative sur un serveur Apache, MySQL et PHP

```bash
composer install
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load
```