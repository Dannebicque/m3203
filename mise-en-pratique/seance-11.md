# Séance 11 : Traitement des formulaires pour nos livres et auteurs

Nous allons exploiter les classes des séances [Séance 9 : Structure de base](seance-9.md)  et [Séance 10 : Génération de formulaire en POO](seance-10.md)

{% hint style="info" %}
### Notation

Cet exercice sera à faire valider en fin de séance **obligatoirement**.

* 0, rien n'est fait
* 1, début d'exercice, mais non fonctionnel
* 2, TP réalisé exactement comme demandé
* 3, TP réalisé avec quelques améliorations/optimisations
{% endhint %}

## Sujet

Nous avons créé des objets permettant de décrire des livres et des artistes. Nous avons ensuite vu comment créer des formulaires avec des objets.

Nous allons maintenant nous intéresser au traitement des formulaires afin d'instancier des objets de type Auteurs, Livres, ...

### A disposition

Dans cette séance vous devrez écrire le fichier qui affichera un formulaire pour traiter des livres \(et les classes filles\), ou des Artistes \(et les classes filles\).

**N'oubliez pas qu'une classe fille est une spécialisation d'une classe parent !**

{% hint style="danger" %}
**Vous devez faire valider le bon fonctionnement de seance11.php en fin de séance**
{% endhint %}

### A faire

Ecrire un fichier qui permet d'afficher un formulaire en lien avec la classe Artiste \(et ses filles\). Ecrire un fichier de traitement qui instancie la bonne classe. Utiliser les méthodes d'affichage des objets pour vérifier le bon enregistrement des données.

**On peut prendre pour simplification que le champ image est de type texte et contiendra le nom du fichier**

Faire de même pour les Livres.

Au final vous devriez avoir 4 fichiers.

### Astuces

Pour la gestion des auteurs et des dessinateurs, on peut imaginer écrire un fichier contenant des objets ou un tableau d'objets avec des auteurs et des dessinateurs. Cela permettrait de simuler une requête depuis une base de données.

{% code-tabs %}
{% code-tabs-item title="listeartistes.php" %}
```php
<?php

$auteur1 = new Auteur('Corbeyran', 'Eric', '14/12/1964', 'corbeyran.jpg');
$auteur2 = new Auteur('Van Hamme', 'Jean', '16/01/1939', 'van-hamme.jpg');
$auteur3 = new Auteur('Bartoll', 'Jean-Claude', '12/11/1962', 'bartoll.jpg');
$auteur4 = new Auteur('Goscinny', 'René', '14/08/1926', 'goscinny.jpg');

$tabAuteurs = array(1 => $auteur1, 2 => $auteur2, 3 => $auteur3, 4 => $auteur4);

$dessinateur1 = new Dessinateur('Guérineau', 'Richard', '18/11/1969', 'guerineau.jpg');
$dessinateur2 = new Dessinateur('Legrain', 'Thomas', '22/01/1981', 'legrain.jpg');
$dessinateur3 = new Dessinateur('Bilal', 'Enki', '07/10/1951', 'bilal.jpg');

$tabDessinateurs = array($dessinateur1, $dessinateur2, $dessinateur3);

$auteurRoman = new Auteur('Conan Doyle', 'Arthur', '22/05/1859', 'doyle.jpg');
```
{% endcode-tabs-item %}
{% endcode-tabs %}

