# Séance 2

{% code title="vehicule.php" %}
```php
<?php

class Vehicule {

    /*Sa marque
        Sa puissance en CV
        Son kilométrage*/

    public $marque;
    public $puissance;
    public $kilometrage;

    public function __construct($marque, $kilometrage, $puissance)
    {
        $this->marque = $marque;
        $this->kilometrage = $kilometrage;
        $this->puissance = $puissance;
    }

    //Utiliser un véhicule a pour effet d’augmenter la valeur du kilométrage
    public function augmenterKilometrage($distanceParcourue)
    {
        $this->kilometrage = $this->kilometrage + $distanceParcourue;
        //ou $this->kilometrage += $distanceParcourue;
    }

    //On souhaite pouvoir lire les caractéristiques du véhicule
    public function afficherCaracteristiques()
    {
        echo '<p>Marque : '.$this->marque.'</p>';        
        echo '<p>Kilometrage : '.$this->kilometrage.'</p>';
        echo '<p>puissance : '.$this->puissance.'</p>';

    }
}
```
{% endcode %}

{% code title="seance2.php" %}
```php
<!DOCTYPE html>
<html>
<head>
    <title>TP1</title>
</head>
<body>
<?php
    require('vehicule.php');

    $voiture = new Vehicule('Renault', 15000, 90);
    //$voiture->marque = 'Renault';
    //$voiture->puissance = 90;
    //$voiture->kilometrage = 15000;

    $voiture->afficherCaracteristiques();
    $voiture->augmenterKilometrage(3500);
    $voiture->afficherCaracteristiques();
    $voiture->puissance = 110;
    $voiture->afficherCaracteristiques();

    $voiture2 = new Vehicule('Peugeot', 20000, 110);
    $voiture2->afficherCaracteristiques();
    $voiture2->augmenterKilometrage(1500);
    $voiture2->afficherCaracteristiques();
?>
</body>
</html>
```
{% endcode %}

