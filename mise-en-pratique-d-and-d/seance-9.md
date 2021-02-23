# Séance 9

{% hint style="info" %}
### Notation

Cet exercice sera à faire valider en fin de séance **obligatoirement**.

* 0, rien n'est fait
* 1, début d'exercice, mais non fonctionnel
* 2, TP réalisé exactement comme demandé
* 3, TP réalisé avec quelques améliorations/optimisations
{% endhint %}

## Sujet

Rédiger les classes permettant la gestion des Personnages et des Attributs dans une base de données. Nous allons passer par des "_manager_" \(ce terme est en référence au langage de nombreux framework\), qui vont faire l'intermédiaire entre la classe Personnage \(ou Attribut\) et la base de données.

En d'autres termes, la classe Personnage, ne contiendra que ce qui permet de manipuler un Personnage \(getters, setters, méthodes spécifiques\), et la classe PersonnageManager permettra les accès à la base de données et retournera un ou plusieurs objet Artiste en fonction des requêtes.

### A disposition

* Un fichier seance9.sql à intégrer dans votre base de données.

{% code title="seance9.sql" %}
```sql
CREATE TABLE `Personnage` (
  `id` int(11) NOT NULL,
  `typePersonnage` varchar(50) NOT NULL,
  `nbPtDeVie` int(11) NOT NULL,
  `force` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `attributs` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
ALTER TABLE `Artiste` ADD PRIMARY KEY (`id`);
ALTER TABLE `Artiste` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
```
{% endcode %}

* Un fichier seance9.php à tester

{% code title="seance9.php" %}
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seance 9 - Manipulation de base de données</title>
</head>
<body>
<h1>Manipulation de base de données et d'Artiste</h1>
<?php
    //... mettre l'autloader
    $am = new ArtisteManager('localhost', 'root', 'root', 'm3203');
    $artiste = new Artiste(array('nom' => 'Conan Doyle', 'prenom' => 'Arthur', 'datenaissance' => '01/01/1800', 'specialite' => 'Auteur', 'image' => 'doyle.jpg'));
    $id = $am->addArtiste($artiste);
    echo '<p>Artiste ajouté avec l\'id numéro '.$id.'</p>';
    $artiste2 = $am->getById($id);
    echo '<p>'.$artiste2->sePresente().'</p>';
?>
<h1>Affichage de tous les artistes</h1>
<?php
    echo $am->afficheAll();
?>
</body>
</html>

```
{% endcode %}

{% hint style="danger" %}
**Vous devez faire valider le bon fonctionnement en fin de séance**
{% endhint %}

### A faire

Nous allons concevoir le Manger pour la classe Personnage \(et de ces enfants\) uniquement dans ce TP.

Le schéma ci-dessous, illustre, sur un autre exemple, le principe que nous souhaitons mettre en place.

![Principe de fonctionnement d&apos;un Manager](../.gitbook/assets/principe.png)

#### La classe ArtisteManager

La classe ArtisteManager contiendra les méthodes suivantes :

* `addPersonnage($personnage)` : L’argument de cette méthode est une instance de la classe Personnage \(ou de ses filles\). Elle génère une requête `‘INSERT INTO...’` et l’exécute. Elle permet l’ajout d'un Artiste dans la table. Cette méthode retourne le dernier id inséré \([lastInsertId](http://php.net/manual/fr/pdo.lastinsertid.php)\) 
* `getById($id)` : L’argument permet de sélectionner l’enregistrement que l’utilisateur de l’application souhaite modifier. Elle est donc appelée par l’application. Cette méthode retourne une instance de la classe Personnage dont les propriétés sont initialisées avec les valeurs du Personnage sélectionné.   
* `updatePersonnage($personnage)` : L’argument de cette méthode est une instance de la classe Artiste. Elle génère une requête `‘UPDATE ...’` et l’exécute. Elle permet la modification de l’enregistrement concerné.  
* `getAll()` : Cette méthode construit un tableau contenant tous les Personnages de la table. Chaque élément du tableau est une instance de la classe Personnage dont les propriétés sont issues de chaque enregistrement de la table Personnage.  

La classe PersonnageManager contiendra une propriété privée qui est la connexion à la base de données. Cette connexion sera initialisée par le constructeur.

### Travail à Faire

* Ecrire la classe PersonnageManager
* Faire fonctionner la classe PersonnageManager avec le fichier seance9.php

