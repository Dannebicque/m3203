---
description: Création des classes et autoloader
---

# Séance 8

Dans cette première séance, nous allons mettre en place les différentes classes pour gérer les personnages et le armes.

Nous utiliserons la classe Affichage pour contrôler que tout se passe bien.

Nous mettrons également en place le principe [d'autoloader](https://www.php.net/manual/fr/language.oop5.autoload.php) afin que toutes les classes nécessaires soit chargées automatiquement dans notre projet.



### Personnage

La classe personnage est abstraite et permet de définir globalement les personnages de notre jeu. Les propriétés sont les suivantes :

* $typePersonnage, contiendra la "race" du personnage
* $nbPtDeVie, contiendra le nombre de point de vie du personnage. Par défaut 100.
* $force, contiendra la force du personnage. Par défaut 100.
* $x, $y, contiendra la position du personnage sur un plateau.
* $nbPersonnages, propriété de classe, contiendra le nombre de personnages dans la partie.

### Humain

La classe Humain hérite de personnage. La race est "humain", et un humain est un personnage ayant 100 points de vie, et 100 points de force.

### Elfe

La classe Elfe hérite de personnage. La race est "Elfe", et un elfe est un personnage ayant 120 points de vie, et 80 points de force.

### Gobelin

La classe Gobelin hérite de personnage. La race est "Gobelin", et un Gobelin est un personnage ayant 80 points de vie, et 120 points de force.

