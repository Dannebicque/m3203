# TP 8 : Utilisation d'une base de données

Nous allons exploiter les classes du TP5 et du TD5, et les traitements des TP6 et TP7

## NOTATION

Cet exercice sera à faire valider en fin de séance **obligatoirement**.

* 0, rien n'est fait
* 1, début d'exercice, mais non fonctionnel
* 2, TP réalisé exactement comme demandé
* 3, TP réalisé avec quelques améliorations/optimisations

## Sujet

Rédiger les classes permettant la gestion des Artistes et des Livres dans une base de données. Nous allons passer par 
des "manager" (ce terme est en référence au langage de nombreux framework), qui vont faire l'intermédiaire entre la classe Artiste
et la base de données.

En d'autres termes, la classe Artiste, ne contiendra que ce qui permet de manipuler un Artiste (getters, setters, méthodes spécifiques), 
et la classe ArtisteManager permettra les accès à la base de données et retournera un ou plusieurs objet Artiste en fonction des requêtes.

## A disposition

Un fichier [tp8.sql](tp8.sql) a intégrer dans votre base de données, et un fichier [tp8.php](tp8.php) pour effectuer les tests.

**Vous devez faire valider le bon fonctionnement de tp8.php en fin de séance**

## A faire

Nous allons concevoir le Manger pour la classe Artiste uniquement dans ce TP.

Le schéma ci-dessous, illustre, sur un autre exemple, le principe que nous souhaitons mettre en place.

[Image du principe à mettre en place](!principe.png)

La classe ArtisteManager contiendra les méthodes suivantes :

* addArtiste(Artiste $artiste) : L’argument de cette méthode est une instance de la classe Artiste. Elle génère une requête 
‘INSERT INTO...’ et l’exécute. Elle permet l’ajout d'un Artiste dans la table.  
* getById($id) : L’argument permet de sélectionner l’enregistrement que l’utilisateur de l’application souhaite modifier. 
Elle est donc appelée par l’application. Cette méthode retourne une instance de la classe Artiste dont les propriétés sont 
initialisées avec les valeurs de l'Artiste sélectionné.   
* updateArtiste(Artiste $sh) : L’argument de cette méthode est une instance de la classe Artiste. Elle génère une requête 
‘UPDATE ...’ et l’exécute. Elle permet la modification de l’enregistrement concerné.  
* getAll() Cette méthode construit un tableau contenant tous les Artiste de la table. Chaque élément du tableau est une 
instance de la classe Artiste dont les propriétés sont issues de chaque enregistrement de la table superheros.  
* afficheAll() Cette méthode appelle la methode getAll(). Elle génère un tableau HTML à partir du tableau d'Artiste issu de 
la fonction getAll(). Les propriétés de chaque Artiste sont issues des getters de la classe Artiste. 
Un lien hypertexte (dernière colonne du tableau) permettra d’appeler le formulaire de modification ($_GET['id']) 

La classe ArtisteManager contiendra une propriété privée qui est la connexion à la base de données. Cette connexion sera initalisée par le constructeur.
On pourrait, aussi, exploiter la classe SQL que l'on a écrit dans un précédent TP.

## Astuce

Comme vous le constatez la classe ArtisteManager doit créer des objets Artiste. On pourrait facilement exploiter les Setters de chacune 
des propritétés pour remplir un objet Artiste en fonction des données issues d'une requête. Cela se fait très bien, si notre objet possède 2 ou 3 
propriétés. Mais l'opération devient plus fastidieuse lorsque l'on a beaucoup de propriété.

Pour palier à cela, on exploite souvent une méthode dite **d'hydratation** qui permet de remplir un objet en fonction d'un tableau associatif.
En fait ce tableau comporte comme clé, le nom de la propriété que l'on souhaite initialiser, et comme valeur, la valeur issue de la base de données pr exemple.

La méthode hydrate va essayer de construire les setters associés à chacune de ces clés. Et l'utiliser pour sauvegarder la valeur.
Si de manière judicieuse les champs de la table sont nommés de la même manière que les propriétés, il devient assez simple de construire une méthode 
qui fait le lien entre la table et l'objet de manière générique.

le code de l'hydratation pourrait ressembler au code ci-dessous:

```php
public function hydrate(array $donnees) 
{     
  foreach ($donnees as $key => $value)     
  {         
    $method = 'set'.ucfirst($key);          
    if (method_exists($this, $method))         
    {             
      $this->$method($value);         
    }    
  }
} 
```

La boucle parcourt le tableau $donnees. Il s’agit d’un tableau associatif. Le nom de chaque enregistrement est le nom de 
chaque propriété du super héros (id, nom, prenom, datenaissance, image, specialite). La variable $method est une chaîne de 
caractères correspondant à un setter. Si la méthode ainsi générée existe, elle est appelée : $this->$method($value).  
L’intérêt de cette technique est de simplifier le code en le réduisant le nombre d’instructions. 
* Constructeur : est tout simplement un appel de la fonction Hydrate. 
* Update() est une méthode qui appelle la méthode hydrate pour mettre à jour un objet

## Pour Aller plus loin

Comment pourriez vous gérer les Auteurs et les Dessinateurs ?
