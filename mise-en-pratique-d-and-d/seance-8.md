---
description: >-
  Dans cette première séance, nous allons mettre en place les différentes
  classes pour gérer les personnages et le armes.
---

# Séance 8

{% hint style="info" %}
### Notation

Cet exercice sera à faire valider en fin de séance **obligatoirement**.

* 0, rien n'est fait
* 1, début d'exercice, mais non fonctionnel
* 2, TP réalisé exactement comme demandé
* 3, TP réalisé avec quelques améliorations/optimisations
{% endhint %}

Nous mettrons également en place le principe [d'autoloader](https://www.php.net/manual/fr/language.oop5.autoload.php) afin que toutes les classes nécessaires soit chargées automatiquement dans notre projet.

## Les éléments à votre disposition

### La classe Affichage

La classe Abstraite Affichage permet d'afficher le plateau avec les personnages.

### La feuille de style

Le fichier styles.css à placer dans un répertoire assets permet de mettre en forme le plateau.

### L'interface Personnage

Le fichier iPersonnage est l'interface que votre classe Personnage devra implémenter.

### Fichier application

Le fichier seance8.php est le fichier application qui permet de tester votre code et vos classes.

## Les classes à écrire

### Personnage

La classe personnage est abstraite et permet de définir globalement les personnages de notre jeu. Les propriétés sont les suivantes :

* $typePersonnage, contiendra la "race" du personnage
* $nbPtDeVie, contiendra le nombre de point de vie du personnage. Par défaut 100.
* $force, contiendra la force du personnage. Par défaut 100.
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

