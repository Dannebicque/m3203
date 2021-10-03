# Séance 12

{% hint style="info" %}
### Notation

Cet exercice sera à faire valider en fin de séance **obligatoirement**.

* 0, rien n'est fait
* 1, début d'exercice, mais non fonctionnel
* 2, TP réalisé exactement comme demandé
* 3, TP réalisé avec quelques améliorations/optimisations
{% endhint %}

## Objectifs

Exploiter la classe Formulaire, et les classes permettant la gestion de.la BDD pour permettre la création de Personnage et d'Attributs.

## Fichier de test 

{% code title="seance1213.php" %}
```php
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Séance 12 et 13</title>
</head>
<body>
<?php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});
?>

<ul>
    <li><a href="ajout_personnage.php">Ajouter un personnage</a></li>
    <li><a href="ajout_attribut.php">Ajouter un attribut</a></li><!-- A faire en séance 13 -->
    <li><a href="afficher_plateau.php">Afficher le plateau</a></li>
</ul>

</body>
</html>

```
{% endcode %}

Ce fichier permet d'accéder à 3 pages.

## Vous allez devoir créer les fichiers suivants :

### Ajout\_personnage.php

Qui doit proposer un formulaire pour ajouter un personnage, quelque soit son type, et que l'on puisse lui affecter des attributs. \(on ne fera pas de filtre selon le personnage à ce stade\). Proposer le fichier de traitement associé \(traitement\_personnage.php\) permettant de sauvegarder le personnage dans la BDD en utilisant **OBLIGATOIREMENT** la classe PersonnageManager.php

A l'issue du traitement on revient soit sur le sommaire \(seance1213.php\), soit on affiche le plateau \(afficher\_plateau.php\).

## L'affichage

Le troisième lien pointe vers l'affichage du plateau en se basant sur les données de la BDD.

Le fichier vous est donné.

{% code title="afficher\_plateau.php" %}
```php
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/styles.css">

    <title>Séance 11 | Afficher plateau</title>
</head>
<body>
<?php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});

$pm = new PersonnageManager('localhost', 'root', 'root', 'm3203');
$personnages = $pm->getAll();
foreach ($personnages as $personnage)
{
    Affichage::addPersonnage($personnage);
}
Affichage::affichePlateau();
?>
</body>
</html>

```
{% endcode %}

Vous devrez modifier la ligne suivante dans Affichage.php

```php
    const MAX_PERSONNAGE = 20;
```

Afin de pouvoir afficher tous les personnages.

