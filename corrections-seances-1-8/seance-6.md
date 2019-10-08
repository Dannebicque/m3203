# Séance 6

{% code-tabs %}
{% code-tabs-item title="VehiculeAMoteur.php" %}
```php
<?php

abstract class VehiculeAMoteur
{
    protected $typeMoteur;
    protected $nombrePassagers;
    static $nbvehicules = 0;

    public function __construct($typemoteur, $nombrepassagers)
    {
        $this->typeMoteur = $this->verification($typemoteur);
        $this->nombrePassagers = $this->verificationnbpassagers($nombrepassagers);
        self::$nbvehicules++;
    }

    public function __destruct()
    {
        self::$nbvehicules--;
    }

    public function verification($type)
    {
        if ($type == 'E' || $type == 'T')
        {
            return $type;
        } else {
            echo 'Erreur sur le type de véhicule';
            return '';
        }
    }

    public function verificationnbpassagers($nombre)
    {
        if (is_int($nombre))
        {
            return $nombre;
        } else {
            echo 'Erreur sur le nombre de passagers';
            return 0;
        }
    }
}
```
{% endcode-tabs-item %}
{% endcode-tabs %}

{% code-tabs %}
{% code-tabs-item title="Voiture.php" %}
```php
<?php

class Voiture extends VehiculeAMoteur
{
    protected $marque;
    protected $puissance;

    public function __construct($typemoteur, $nombrepassagers, $marque, $puissance)
    {
        parent::__construct($typemoteur, $nombrepassagers);
        $this->marque = $marque;
        $this->puissance = $puissance;
    }

    public function lirecaracteristiques()
    {
        return 'Type de moteur '.$this->typeMoteur.', Nombre de passagers '.$this->nombrePassagers.', marque '.$this->marque.', puissance '.$this->puissance;
    }
}
```
{% endcode-tabs-item %}
{% endcode-tabs %}

{% code-tabs %}
{% code-tabs-item title="VoitureDeSport.php" %}
```php
<?php

class VoitureDeSport extends Voiture
{
    protected $zeroacent;

    public function __construct($typemoteur, $nombrepassagers, $marque, $puissance, $zeroacent)
    {
        parent::__construct($typemoteur, $nombrepassagers, $marque, $puissance);
        $this->zeroacent = $zeroacent;
    }

    public function lirecaracteristiques()
    {
        return parent::lirecaracteristiques().', Zéro à cent '.$this->zeroacent;
    }
}
```
{% endcode-tabs-item %}
{% endcode-tabs %}

{% code-tabs %}
{% code-tabs-item title="VoitureTourisme.php" %}
```php
<?php

class VoitureTourisme extends Voiture
{
    protected $consommation;
    protected $kilometrage = 0;

    public function __construct($typemoteur, $nombrepassagers, $marque, $puissance, $consommation)
    {
        parent::__construct($typemoteur, $nombrepassagers, $marque, $puissance);
        $this->consommation = $consommation;

    }

    public function lirecaracteristiques()
    {
        return parent::lirecaracteristiques().', kilometrage '.$this->kilometrage.', Consommation '. $this->consommation;
    }

    public function utiliser($distance)
    {
        $this->kilometrage += $distance;
    }
}
```
{% endcode-tabs-item %}
{% endcode-tabs %}

{% code-tabs %}
{% code-tabs-item title="Camion.php" %}
```php
<?php

class Camion extends VehiculeAMoteur
{
    protected $tonnage;
    protected $nbessieux;

    public function __construct($typemoteur, $nombrepassagers, $tonnage, $nbessieux)
    {
        parent::__construct($typemoteur, $nombrepassagers);
        $this->tonnage = $tonnage;
        $this->nbessieux = $nbessieux;
    }

    public function lirecaracteristiques()
    {
        return 'Type de moteur '.$this->typeMoteur.', Nombre de passagers '.$this->nombrePassagers.', tonnage '.$this->tonnage.', nbessieux '.$this->nbessieux;
    }
}
```
{% endcode-tabs-item %}
{% endcode-tabs %}

