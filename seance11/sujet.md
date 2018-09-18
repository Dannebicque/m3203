# TP 6 : Traitement des formulaires pour nos livres et auteurs

Nous allons exploiter les classes du TP5 et du TD5

## NOTATION

Cet exercice sera à faire valider en fin de séance **obligatoirement**.

* 0, rien n'est fait
* 1, début d'exercice, mais non fonctionnel
* 2, TP réalisé exactement comme demandé
* 3, TP réalisé avec quelques améliorations/optimisations

## Sujet

Nous avons créé des objets permettant de décrire des livres et des artistes. Nous avons ensuite vu comment créer des formulaires 
avec des objets.

Nous allons maintenant nous interesser au traitement des formulaires afin d'instancer des objets de type Auteurs, Livres, ...

## A disposition

Dans ce TP vous devrez écrire le fichier qui affichera un formulaire pour traiter des livres (et les classes filles), 
ou des Artistes (et les classes filles).

**N'oubliez pas qu'une classe fille est une spécialisation d'une classe parent !**

**Vous devez faire valider le bon fonctionnement de tp6.php en fin de séance**

## A faire

Ecrire un fichier qui permet d'afficher un formulaire en lien avec la classe Artiste (et ses filles).
Ecrire un fichier de traitement qui instancie la bonne classe.
Utiliser les méthodes d'affichage des objets pour vérifier le bon enregistrement des données.

**On peut prendre pour simplification que le champ image est de type texte et contiendra le nom du fichier**

Faire de même pour les Livres.

Au final vous devriez avoir 4 fichiers.

## Astuces

Pour la gestion des auteurs et des dessinateurs, on peut imaginer écrire un fichier contenant des objets ou un tableau d'objets avec des auteurs et des dessinateurs. Cela permettrait de simuler une requête depuis une base de données.
