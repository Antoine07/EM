# Tests unitaires

Les tests unitaires permettent de tester la logique algorithmique de l'application.

Les tests unitaires sont fondés sur le principe d'isolation des tests, chaque test est isolé des autres tests. Voir la méthode setUp qui est exécutée pour chaque test de la classe.

Chaque classe de test est suffixé par Test comme CartTest.

Chaque test (méthode dans une classe) est préfixé par test : testRestore.

## Installation PHPUnit

Avec composer dans un dossier Cart, dossier qui va nous permettre de découvrir le composant PHPUnit pour réaliser des tests unitaires.

```bash
composer require --dev phpunit/phpunit
```

Dans le dossier de travail tester la version de phpunit

```bash
./vendor/bin/phpunit --version
```

Puis on crée les dossiers et fichiers suivants de notre projet Cart

```txt
src/
    Cart.php      <-- la classe métier
tests/
    bootstrap.php <-- d'initialisation des tests
    CartTest.php  <-- les tests que l'on fait sur la classe métier
public/

composer.json
phpunit.xml

```

Il faut créer un fichier xml, c'est le fichier de configuration du composant PHPUnit. 

On a un fichier spécifique également dans le dossier tests, bootstrap.php, qui permettra d'instancier les dépendances de nos tests unitaires.

```xml
<phpunit bootstrap="./tests/bootstrap.php" colors="true">
    <testsuites>
        <testsuite name="cart">
            <directory>tests</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

## 01 Exercice 

En TDD (tests driven developpment), testez que la méthode buy ajoute bien un produit dans un panier storage (array php) en appliquant la tva de 20 % pour chaque produit ajouté.

## 02 Exercice Product

Créez maintenant une classe Product et commandez des produits, puis tester que le total du prix des produits commandés.

## 03 Exercice Restore

Créez la méthode restore qui retire un produit du storage. Vous pouvez tester le total dans la classe Cart avant, puis après avoir retirer un produit du storage, pour vérifiez son bon fonctionnent.

## 04 Exercice buy add same product

Testez que la méthode buy peut commander plusieurs le même produit

## 05 Exercice delete 

Créez et testez la méthode qui vous permet de retirer l'ensemble des produits dans le panier.