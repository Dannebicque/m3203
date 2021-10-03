# Séance 3

{% code title="personne.php" %}
```php
<?php
    //----------------------------------------------------
    // fichier : Personne.php
    // ---------------------------------------------------
    // Notion d'encapsulation : protection des propriétés
    // de l'objet.    
    // IUT de Troyes - MMI 2ème année
    //----------------------------------------------------

    class Personne {
        // Définition des attributs de la classe
        private $prenom;
        private $nom;
        private $age;

          // Définition de la fonction constructeur 
         public function __construct($n,$p,$a) { 
            $this->nom=$n;
            $this->prenom=$p;
            $this->age=$a;
        }  

        // Setter (ou mutateur pour la propriété Nom)
        public function setNom($value)
        {
            $this->nom = $value;
        }

        // Définition du comportement sePresente() 
        public function sePresente() {  
            return 'Je m\'appelle '.$this->prenom.' '.$this->nom.' et j\'ai '.$this->age.' ans '; 
        }
    }
?>
```
{% endcode %}

{% code title="seance3.php" %}
```php
<?php
    //----------------------------------------------------
    // fichier : seance3_exo1.php
    // ---------------------------------------------------
    // Notion d'encapsulation : protection des propriétés
    // de l'objet.    
    // IUT de Troyes - MMI 2ème année
    //----------------------------------------------------

    require 'personne.php';
    // Nouvelle instance de class.Personne
    $etudiant=new Personne('Martin','Paul',19);
    echo $etudiant->sePresente().'<br>'; //Je m'appelle Paul Martin et j'ai 19 ans 
    // Modification de l'attribut Nom
    $etudiant->setNom('Durand');
    echo $etudiant->sePresente().'<br>'; // Je m'appelle Paul Durand et j'ai 19 ans 
?>
```
{% endcode %}

