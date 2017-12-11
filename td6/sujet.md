# TD 6 : Utilisation d'une base de données et des formulaires

Nous allons exploiter les classes du TP5 et du TD5, et les traitements des TP6 et TP7, et les bases de données du TP8

## NOTATION

Cet exercice sera à faire valider en fin de séance **obligatoirement**.

* 0, rien n'est fait
* 1, début d'exercice, mais non fonctionnel
* 2, TP réalisé exactement comme demandé
* 3, TP réalisé avec quelques améliorations/optimisations

## Sujet

Faire le lien entre le formulaire, le traitement et la base de données afin d'ajouter les artistes dans la base de données.

Faire également le lien avec le formulaire livre pour récupérer une liste, provenant de la base de données pour les Auteurs et les Dessinateurs.

**Vous devez faire valider le bon fonctionnement en fin de séance**

## Terminer le TP précédent et la classe ArtisteManager

Eléments de corrections :

Le constructeur de la classe ArtisteManager :

```php
class ArtisteManager {
  private $db;
  
  public function __construct ($login, $password, $serveur, $bdd)
  {
      $this->db = new PDO('mysql:dbname='.$bdd.';host='.$serveur.'", $login, $password);
  }
  ...
}
```

Le constructeur d'Artiste devient :

```php
class Artiste {
  ...
  protected $id; //Contiendra l'Id de l'Artiste dans la base
  
  public function __construct ($donnees)
  {
      $this->hydrate($donnees);
  }
  ...
}
```

La méthode addArtiste pourrait être :

```php
class ArtisteManager {
  ...
  
  public function addArtiste(Artiste $artiste) {
        $requete = 'INSERT INTO Artiste (nom, prenom, datenaissance, image, specialite) VALUES ("'.$artiste->getNom().'", "'.$artiste->getPrenom().'", "'.$artiste->getDateNaissance().'", "'.$artiste->getImage().'", "'.$artiste->getSpecialite().'")';
        $this->db->query($requete);

        return $this->db->lastInsertId(); // pour récupérer l'Id
    }
  ...
}
```

## Amélioration de ArtisteManager

Nous allons améliorer la classe ArtisteManager en Ajoutant les méthodes suivantes :

* recupereSpecialite($specialite) : pour récupérer les Artistes selon une spécialité pécise
* recupèreAuteur() : qui utilisera la méthode recupereSpecialite pour récupérer les auteurs
* recupèreDessinateur() : qui utilisera la méthode recupereSpecialite pour récupérer les dessinateurs

On pourrait aussi ajouter une méthode pour récupérer les données préformatées pour les selects.

## Travail à Faire

* Utiliser la classe ArtisteManager pour gérer le traitement et la sauvegarde du formulaire
* Utiliser la classe ArtisteManager pour générer les listes d'Auteurs dans les livres
