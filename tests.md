test unitaire : tester une méthode isolée
test fonctionnel : par exemple dans le cas d'une base de données
tests end to end : tester l'application comme un simple utilisateur 

Pour exécuter les tests :

php bin/console bin/phpunit


Pour créer un test :

php bin/console make:test

Le nom des méthodes doit commencer par test


fichier d'environnement spécifique aux tests : .env.test

environnement de test dans config/packages/tests




# Tester avec une base de données
==================================================================================================

DoctrineFixturesBundle :

https://symfony.com/bundles/DoctrineFixturesBundle/current/index.html#sln


composer require --dev orm-fixtures


Pour créer un test : 

php bin/console make:test  
et choisir l'option Kerneltestcase
car on a besoin du kernel pour récupérer le repository 






