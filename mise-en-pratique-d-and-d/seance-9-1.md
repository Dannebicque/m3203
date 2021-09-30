---
description: >-
  Dans cette première séance, nous allons mettre en place les différentes
  classes pour gérer les personnages et le armes.
---

# Séance 9

{% hint style="info" %}
### Notation

Cet exercice sera **à faire valider en fin de séance obligatoirement**.

* 0, rien n'est fait
* 1, début d'exercice, mais non fonctionnel
* 2, TP réalisé exactement comme demandé
* 3, TP réalisé avec quelques améliorations/optimisations
{% endhint %}

Nous mettrons également en place le principe [d'autoloader](https://www.php.net/manual/fr/language.oop5.autoload.php) afin que toutes les classes nécessaires soit chargées automatiquement dans notre projet.

{% hint style="danger" %}
C'est à vous de vous manifester auprès de l'enseignant pour la validation de la séance. Aucun validation a posteriori des séances.
{% endhint %}

## Les éléments à votre disposition

### La classe Affichage

La classe Abstraite Affichage permet d'afficher le plateau avec les personnages.

{% file src="../.gitbook/assets/affichage.php" caption="Classe Affichage.php" %}

{% code title="Affichage.php" %}
```php
<?php


abstract class Affichage
{
    protected static $listePersonnage = [];
    const LONGUEUR_PLATEAU = 8;
    const LARGEUR_PLATEAU = 8;
    const MAX_PERSONNAGE = 4;

    public static function addPersonnage($personnage)
    {
        if (Personnage::$nbPersonnages < self::MAX_PERSONNAGE) {
            self::$listePersonnage[] = $personnage;
        } else {
            echo '<p>Trop de personnage ! Impossible d\'ajouter ' .$personnage->getTypePersonnage().'</p>';
        }

    }

    public static function affichePlateau()
    {
        $html = '<table class="plateau">';
        for ($i = 1; $i <= self::LONGUEUR_PLATEAU; $i++) {
            $html .= '<tr>';
            for ($j = 1; $j <= self::LARGEUR_PLATEAU; $j++) {
                $html .=  '<td>';
                foreach (self::$listePersonnage as $perso)
                {
                    if ($perso->getX() == $i && $perso->getY() == $j)
                    {
                        $html .= $perso->affichePersonnage();
                    }
                }
                $html .=  '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</table>';
        echo $html;
    }
}

```
{% endcode %}

### La feuille de style

Le fichier styles.css à placer dans un répertoire assets permet de mettre en forme le plateau.

{% file src="../.gitbook/assets/styles.css" caption="Feuille de style" %}

{% code title="styles.css" %}
```css
.plateau td{
    border:1px solid darkgray;
    height: 60px;
    width: 60px;
    text-align: center;
}

.force {
    font-size: 10px;
    color:blue;
}

.ptdevie {
    font-size: 10px;
    color:darkgreen;
}

```
{% endcode %}

### L'interface Personnage

Le fichier iPersonnage est l'interface que votre classe Personnage devra implémenter.

{% file src="../.gitbook/assets/ipersonnage.php" caption="Interface Personnage" %}

{% code title="iPersonnage.php" %}
```php
<?php

interface iPersonnage
{
    public function place($x, $y);
    public function deplaceX($x = 1);
    public function deplaceY($y = 1);
    public function affichePersonnage();
    public function addAttribut($attributs);
}

```
{% endcode %}

### Fichier application

Le fichier seance9.php est le fichier application qui permet de tester votre code et vos classes.

{% file src="../.gitbook/assets/seance8 \(1\).php" caption="Fichier application" %}

{% code title="seance9.php" %}
```php
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="assets/styles.css">
  <title>Séance 9</title>
</head>
<body>
<?php
require 'iPersonnage.php';
require 'Personnage.php';
require 'Elfe.php';
require 'Gobelin.php';
require 'Humain.php';
require 'Attribut.php';
require 'Arme.php';
require 'Magie.php';
require 'Protection.php';
require 'Affichage.php';


$perso1 = new Gobelin();
$perso1->place(2, 3);
Affichage::addPersonnage($perso1);

$perso2 = new Elfe();
$perso2->place(5, 6);
Affichage::addPersonnage($perso2);

$perso3 = new Humain();
$perso3->place(6, 7);
Affichage::addPersonnage($perso3);

$perso4 = new Humain();
$perso4->place(1, 2);
Affichage::addPersonnage($perso4);
Affichage::affichePlateau();

//Ajout des attributs

$att1 = new Arme('Epée', 10);
$att2 = new Arme('Hache', 15);
$att3 = new Arme('Massue', 20);

$att4 = new Protection('Bouclier', 10);
$att5 = new Magie('Invisibilité', 15, 15);
$att6 = new Magie('Feu', 0,30);

$perso1->addAttribut($att2);
$perso1->addAttribut($att3);

$perso3->addAttribut($att1);
$perso3->addAttribut($att4);

$perso2->addAttribut($att5);
$perso2->addAttribut($att6);

echo $perso1->afficherAttributs();
echo $perso2->afficherAttributs();
echo $perso3->afficherAttributs();
?>
</body>
</html>

```
{% endcode %}

## Les classes à écrire

### Personnage

La classe personnage est abstraite et permet de définir globalement les personnages de notre jeu. Les propriétés sont les suivantes :

* $typePersonnage, contiendra la "race" du personnage
* $nbPtDeVie, contiendra le nombre de point de vie du personnage. Par défaut 100.
* $nbPtDeForce, contiendra la force du personnage. Par défaut 100.
* $x, $y, contiendra la position du personnage sur un plateau.
* $nbPersonnages, propriété de classe, contiendra le nombre de personnages dans la partie.
* $attributs, est un tableau contenant les attributs du personnages \(Arme, Protection ou Magie\)

Toutes les méthodes décrites dans l'interface doivent être implémentées.

### Humain

La classe Humain hérite de personnage. La race est "humain", et un humain est un personnage ayant 100 points de vie, et 100 points de force.

Surchargez la méthode addAttribut\(\) afin de respecter la contrainte suivante : un humain peut avoir deux attributs Armes, et un attribut protection.

### Elfe

La classe Elfe hérite de personnage. La race est "Elfe", et un elfe est un personnage ayant 120 points de vie, et 80 points de force.

Surchargez la méthode addAttribut\(\) afin de respecter la contrainte suivante : un Elfe peut avoir uniquement des attributs magie, sans limite

### Gobelin

La classe Gobelin hérite de personnage. La race est "Gobelin", et un Gobelin est un personnage ayant 80 points de vie, et 120 points de force.

Surchargez la méthode addAttribut\(\) afin de respecter la contrainte suivante : un Gobelin peut avoir une arme et une protection.

### Attribut

Cette classe abstraite représente les accessoires de vos personnages \(Armes, Protections, Magie\). Un attribut est composé des propriétés suivantes :

* $typeAttribut \(arme, protection, magie\)
* $nom \(nom de l'attribut, exemple : épée, bouclier, ...\)

### Arme

La classe Arme, qui hérite de Attribut, est de type 'Arme', elle possède une propriété pointDeDegat indiquant le nombre de point de vie déduit au personnage attaqué.

Cette classe possède les méthodes suivantes :

* affiche\(\) qui affiche les informations de l'arme

### Protection

La classe Protection, qui hérite de Attribut, est de type 'Protection', elle possède une propriété pointDeProtection indiquant le nombre de point de vie ajouté au personnage possédant la protection.

Cette classe possède les méthodes suivantes :

* affiche\(\) qui affiche les informations de la protection

### Magie

La classe Magie, qui hérite de Attribut, est de type 'Magie', elle possède une propriété pointDeDegat indiquant le nombre de point de vie déduit au personnage attaqué et une propriété pointDeProtection indiquant le nombre de point de vie ajouté au personnage possédant ce pouvoir.

Cette classe possède les méthodes suivantes :

* affiche\(\) qui affiche les informations du pouvoir

## Quelques éléments

### Méthode addAttribut\(\)

La méthode addAttribut doit vérifier un nombre et un type d'attribut selon le type de personnage.  Pour faire la vérification il est possible d'utiliser le test "[instanceof](https://www.php.net/manual/fr/language.operators.type.php)" comme dans l'exemple suivant \(qui fonctionne pour la classe Elfe\):

```php
    public function addAttribut($attribut)
    {
        if ($attribut instanceof Magie)
        {
            $this->attributs[] = $attribut;
        } else {
            echo 'Uniquement des attributs de magie sont possible';
        }
    }
```

Lorsqu'il s'agit de compter un nombre limite, vous pouvez, par exemple avoir des propriétés privées qui permettent de garder un compteur à jour.

