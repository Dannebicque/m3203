# Séance 8

Correction partielle

{% code title="individu.php" %}
```php
<?php

interface iHumain
{
    public function travailler($nombreheures);
    public function reposer($nombrejours);
    public function sePresente();
}

abstract class Individu implements iHumain
{
    protected $nom;
    protected $prenom;
    protected $sexe;
    protected $revenu = 0;
    protected $conges = 0;

    public function __construct($nom, $prenom, $sexe)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->sexe = $sexe;
    }

    public function travailler($nombreheures)
    {
        $this->revenu += $nombreheures * 9.5;
    }

    public function reposer($nombrejours)
    {
        $this->conges += $nombrejours;
    }

    public function sePresente()
    {
        return '..à définir..';
    }

    public function RAZrevenu()
    {
        $this->revenu = 0;
    }

    public function RAZconges()
    {
        $this->conges = 0;
    }

    public function declareSalaire()
    {
        return 'Nom : '.$this->nom.', prénom : '.$this->prenom.', revenus : '.$this->revenu.' €.';
    }
}

class Etudiant extends Individu
{
    protected $numetudiant; // : 10 chiffres et une lettre
    protected $age; // : valeur numérique
    protected $formation; // : valeur alphanumérique
    protected $resultat; // : valeur alphanumérique calculée lors de l’évaluation (méthode évaluer) qui prendra deux valeurs possibles ‘reçu(e)’ ou ‘ajourné(e)’
    protected static $nbEtudiants;

    public function __construct($nom, $prenom, $sexe, $numetudiant, $age, $formation)
    {
        parent::__construct($nom, $prenom, $sexe);
        $this->numetudiant = $numetudiant;
        $this->age = $age;
        $this->formation = $formation;
        self::$nbEtudiants++;
    }


    public static function getNombreIndividus() {
        return self::$nbEtudiants;
    }

    public function travailler($nombreheures)
    {
        //La méthode travailler($nombreheures) permet de calculer le revenu cumulé d’un(e) étudiant(e) sur la base horaire de 9.5 euros. Mais ce tarif horaire sera minoré de 20% si l’étudiant(e) est âgé(e) de moins de 18 ans. A chaque appel de cette méthode, on cumulera le salaire calculé au salaire précédent.
        if ($this->age <18) {
            $this->revenu = ($nombreheures * 9.5) * 0.8;
        } else {
            parent::travailler($nombreheures);
        }

    }

    public function evaluer($noteExamen)
    {
        //La méthode evaluer($noteExamen) retournera un texte précisant le nom, le prénom et l’indication reçu(e) ou ajourné(e) à l’examen selon la note. Pour être reçu, il faut avoir la moyenne.
        if ($noteExamen >= 10) {
            $this->resultat = 'reçu(e)';
        } else {
            $this->resultat = 'ajourné(e)';
        }
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function sePresente() {
        return '..à définir pour l\'étudiant...';
    }
}

final class Etudiant_mmi extends Etudiant
{
    private $option;

    public function __construct($nom, $prenom, $sexe, $numetudiant, $age, $option)
    {
        parent::__construct($nom, $prenom, $sexe, $numetudiant, $age, 'MMI');
        $this->option = $option;
    }

    public function quelleOption()
    {
        //retourne un texte indiquant le nom, le prénom et l’option choisie
        return 'Option choisie : '.$this->option;
    }

    public function ChangerOption($option)
    {
        //permet de modifier l’option de l’étudiant
        $this->option = $option;
    }

    public function sePresente()
    {
        //reprend la méthode initiale et complète le texte par ‘ et je suis en MMI’ .
        return '..à définir pour l\'étudiant MMI...';
    }
}

```
{% endcode %}

