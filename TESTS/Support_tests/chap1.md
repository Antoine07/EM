# Tests unitaires

Les tests unitaires permettent de tester la logique algorithmique de l'application.

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
