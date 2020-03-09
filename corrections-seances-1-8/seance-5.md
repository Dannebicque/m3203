# Séance 5

```php
<?php

class Vehicule {

    protected $marque;
    protected $puissance;
    protected $kilometrage;

    public function __construct($marque, $kilometrage, $puissance)
    {
        $this->marque = $marque;
        $this->kilometrage = $kilometrage;
        $this->puissance = $puissance;
    }

    public function augmenterKilometrage($distanceParcourue)
    {
        $this->kilometrage = $this->kilometrage + $distanceParcourue;
    }

    public function afficherCaracteristiques()
    {
        echo '<p>Marque : '.$this->marque.'</p>';
        echo '<p>Kilometrage : '.$this->kilometrage.'</p>';
        echo '<p>puissance : '.$this->puissance.'</p>';
    }
}

class Voiture extends Vehicule {
    protected $type;

    public function __construct($marque, $kilometrage, $puissance, $type) {
        parent::__construct($marque, $kilometrage, $puissance);
        $this->setType($type);
    }

    public function setType($type){
        //on vérifie et on sauvegarde le type
        /*if ($type == 'SUV' || $type == '4x4' || $type='break' || $type == 'berline'){
            $this->type = $type;
        } else {
            echo 'Erreur de type de voiture';
        }*/
        //2
        if (in_array($type, ['SUV', '4x4', 'berline', 'break'])) {
            $this->type = $type;
        } else {
            echo 'Erreur de type de voiture';
        }
        //3
        /*switch($type) {
            case '4x4':
            case 'berline':
            case 'break':
            case 'SUV':
                $this->type=$type;
                break;
            default:
                echo 'erreur de type';
        }*/
    }

    public function lire_type()
    {
        return $this->type;
    }

    //On souhaite pouvoir lire les caractéristiques du véhicule
    public function afficherCaracteristiques()
    {
        echo '<p>Marque : '.$this->marque.'</p>';
        echo '<p>Kilometrage : '.$this->kilometrage.'</p>';
        echo '<p>puissance : '.$this->puissance.'</p>';
        echo '<p>type : '.$this->type.'</p>';

    }
}

```

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
    $voiture->afficherCaracteristiques();
    $voiture->augmenterKilometrage(3500);
    $voiture->afficherCaracteristiques();

    $voiture2 = new Voiture('Peugeot', 20000, 110, 'SUV');
    $voiture2->afficherCaracteristiques();
    $voiture2->augmenterKilometrage(1500);
    $voiture2->afficherCaracteristiques();

    $voiture3 = new Voiture('Porsche', 20000, 210, 'voituredesport');
    $voiture3->afficherCaracteristiques();
    $voiture3->augmenterKilometrage(1500);
    $voiture3->afficherCaracteristiques();
?>
</body>
</html>
```
