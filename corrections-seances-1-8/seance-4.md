# Séance 4

{% code title="animal.php" %}
```php
<?php


class Animal
{
    public $nom;
    public $age;
    public $ageTheorique;
    public $regime = [];
    public $etat = 'vivant';

    public function __construct($nom, $age, $ageTheorique)
    {
        $this->nom = $nom;
        $this->age = $age;
        $this->ageTheorique = $ageTheorique;
    }

    public function lire_informations()
    {
        return '<p>Nom '.$this->nom.', age théorique '.$this->ageTheorique.', etat '.$this->etat.'</p>';
    }

    public function mange($aliment)
    {
        if ($this->etat == 'vivant') {
            $this->regime[] = $aliment;
        } else {
            echo 'L\'animal ne peut plus manger';
        }
    }

    public function vieillir($nbannees)
    {
        $this->age += $nbannees;
        if ($this->age > $this->ageTheorique) {
            $this->etat = 'mort';
        }
    }

    public function lire_regime()
    {
        $html = '<ul>';
        foreach ($this->regime as $aliment) {
            $html .= '<li>'.$aliment.'</li>';
        }
        $html .='</ul>';
        return $html;
    }
}

class Chien extends Animal
{
    public $nomFamilier;

    public function __construct($age, $ageTheorique, $nomFamilier)
    {
        parent::__construct('Chien', $age, $ageTheorique);
        $this->nomFamilier = $nomFamilier;
    }

    public function lire_informations()
    {
        return parent::lire_informations().' Nom familier : '.$this->nomFamilier;
    }
}

```
{% endcode %}

```php
<?php
include('Animal.php');

//créer l’instance $bestiole de la classe animal :
//Nom : ‘Une drôle de bête’, Age : 1, Age théorique maximum : 10, état : ‘vivant’

$bestiole = new Animal('Une drôle de bête', 1, 10);

// Appeler la méthode : mange(‘fruits’)
$bestiole->mange('fruits');
// Appeler la méthode : mange(‘légumes’)
$bestiole->mange('légumes');
// Appeler la méthode : lire_regime()
echo $bestiole->lire_regime();
// Appeler la méthode : lire_informations()
echo $bestiole->lire_informations();
// Appeler la méthode : vieillir(4)
$bestiole->vieillir(4);
// Appeler la méthode : lire_informations()
echo $bestiole->lire_informations();
// Appeler la méthode : vieillir(6)
$bestiole->vieillir(6);
// Appeler la méthode : lire_informations()
echo $bestiole->lire_informations();

```

