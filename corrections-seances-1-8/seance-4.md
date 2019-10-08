# Séance 4

{% code-tabs %}
{% code-tabs-item title="Animal.php" %}
```php
<?php

class Animal
{
    private $nom;
    private $age;
    private $ageTheorique;
    private $regimeAlimentaire = [];
    private $etat = 'vivant';

    public function __construct($nom, $age, $ageTheorique) 
    {
        $this->nom = $nom;
        $this->age = $age;
        $this->ageTheorique = $ageTheorique;
    }

    public function lire_informations()
    {
    }
    
    public function mange($aliment)
    {
        $this->regimeAlimentaire[] = $aliment;
        //array_push($this->regimeAlimentaire, $aliment);
    }

    public function vieillir($nbannees)
    {
        $this->age += $nbannees;
        if($this->age > $this->ageTheorique) {
            $this->etat = 'mort';
        }

    }

    public function lire_regime()
    {
        foreach($this->regimeAlimentaire as $aliment)
        {
            echo '<p>'.$aliment.'</p>';
        }
    }
}
```
{% endcode-tabs-item %}
{% endcode-tabs %}

{% code-tabs %}
{% code-tabs-item title="td4\_heritage.php" %}
```php
<?php
include('animal.php');

//créer l’instance $bestiole de la classe animal : 
//Nom : ‘Une drôle de bête’, Age : 1, Age théorique maximum : 10, état : ‘vivant’

$bestiole = new Animal('Une drôle de bête', 1, 10);

// Appeler la méthode : mange(‘fruits’)
$bestiole->mange('fruits');
// Appeler la méthode : mange(‘légumes’)
$bestiole->mange('légumes');
// Appeler la méthode : lire_regime()
$bestiole->lire_regime();
// Appeler la méthode : lire_informations()
$bestiole->lire_informations();
// Appeler la méthode : vieillir(4)
$bestiole->vieillir(4);
// Appeler la méthode : lire_informations()
$bestiole->lire_informations();
// Appeler la méthode : vieillir(6)
$bestiole->vieillir(6);
// Appeler la méthode : lire_informations()
$bestiole->lire_informations();
```
{% endcode-tabs-item %}
{% endcode-tabs %}

