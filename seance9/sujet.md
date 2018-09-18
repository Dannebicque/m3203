# TP 5 : Reprenons doucement

Les TP qui vont suivre ont un lien entre eux. L'objectif est d'aboutir à une petite application permettant de gérer une collection de livre, et d'obtenir une sauvegarde dans une base de données. Pour simplifier le problème, nous ne nous formaliserons pas avec un structure MVC dans ces TP.

## NOTATION

Cet exercice sera à faire valider en fin de séance **obligatoirement**.

* 0, rien n'est fait
* 1, début d'exercice, mais non fonctionnel
* 2, TP réalisé exactement comme demandé
* 3, TP réalisé avec quelques améliorations/optimisations

## Sujet

Ce premier TP consiste à construire les classes qui vont manipuler les livres et les auteurs de ces livres.

On souhaite disposer d'une structure suffisamment générique afin d'intégrer tous les types de livre et de gérer les auteurs et leur implication dans un ouvrage.

**On va écrire chaque classe dans un fichier séparé. Ce fichier portera le nom de la classe.**

## A disposition

Pour ce premier TP, vous avez à votre disposition :
* Un fichier contenant les interfaces que vous devez respecter. Ce fichier sera à inclure dans vos différentes classes. [fichier interfaces.php](interfaces.php)
* Un fichier tp5.php qui vous permettra de tester le fonctionnement de vos classes. [fichier tp5.php](tp5.php)

**Vous devez faire valider le bon fonctionnement de tp5.php en fin de séance**

## Classe Abstraite Humain et Classe Artiste

### Classe Abstraite Humain

Un Humain est un objet possédant un nom, un prénom et une date de naissance.

Un Humain est capable de se présenter et de travailler. 

**Implémentez cette classe en respectant l'interface donnée.**

### Classe Artiste.

Un Artiste est un Humain qui possède une spécialité. Une spécialité est un champ texte. Un artiste possède également une image (vous pouvez récupérer ces images directement sur Wikipedia par exemple)

Nous considérerons dans un premier temps deux classes héritant d'Artiste: Un Auteur (spécialité écrire) et un Dessinateur (spécialité dessiner).

**Implémentez cette classe ainsi que les classes filles nécessaires.**


## Livre

### Classe Abstraire Livre

On va définir une classe abstraite livre qui contiendra les propriétés **privées** suivantes :

* Titre : chaîne de caractères, on s'assurera que le titre est formatté avec une majuscule sur chaque mot.
* NbPage : entier.
* Auteurs : tableau d'Auteurs. Un auteur est un Artiste dont la spécialité est d'écrire.

**Implémentez cette classe et les méthodes nécessaires et décrites dans l'interface**

### Classes enfants : BandeDessinnees et Roman

On définira deux classes enfants de cette classe Livre.

* Une classe BandeDessinnees, qui contiendra un tableau de Dessinateurs. Un Dessinateur étant un Artiste dont la spécialité est de dessiner.
* Une classe roman ne possède pas de spécificité.

**Implémentez ces deux classes et les méthodes associés**

**Testez et implémentez les méthodes utilisées dans le fichier tp5.php**
