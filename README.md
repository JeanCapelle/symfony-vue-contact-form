
Vous êtes développeur chez ACSEO. Vous recevez une demande de la part d'un client pour la mise en place d'une nouvelle fonctionnalité sur son site Internet.

Nous souhaiterions mettre en place un formulaire de contact sur notre site. Le formulaire de contact doit être simple : il doit nous permettre de connaitre les coordonnées de l'internaute, et sa question. Il nous faut au moins son nom, son email, et sa question pour que nous traitions sa demande.

Il nous faudrait aussi un petit back-office avec accès sécurisé pour permettre au webmaster de consulter la liste des demandes, et de pouvoir cocher les messages que nous avons traité

Il vous est demandé de mettre en place la solution sur la base du Framework Symfony 3 ou 4.

### Start containers / project
`docker-compose up`

### Enter in your app container
`docker-compose exec app /bin/bash`

### Install vendor
`composer install`

### Install node modules
`npm install`

### Generate database
`php bin/console doctrine:migration:migrate`

### Load fixtures
`php bin/console doctrine:fixtures:load`

### Access
App: app.localhost (login: foo / pass: bar)

phpMyAdmin: phpadmin.app.localhost

