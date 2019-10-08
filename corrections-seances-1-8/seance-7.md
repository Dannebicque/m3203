# Séance 7

{% code-tabs %}
{% code-tabs-item title="Eleve.php" %}
```php
<?php
interface iEleve
{  
    public function afficheNomPrenom();
    public function convoque($date, $heure);
    public function ajouteNote($note);
    public function afficheNotes();
}

class Eleve implements iEleve
{
    protected $nom;
    protected $prenom;
    protected $tableauDeNotes = [];

    public function __construct($nom, $prenom){
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    public function afficheNomPrenom(){
        return 'Nom : '.$this->nom.' prenom '.$this->prenom.'<br>';
    }

    public function convoque($date, $heure){
        return 'Vous êtes convoqué le : '.$date.' à '.$heure.'<br>';
    }

    public function ajouteNote($note){
        //$this->tableauDeNotes[] = $note;
        array_push($this->tableauDeNotes, $note);
    }

    public function afficheNotes(){
        $html = '';
        foreach($this->tableauDeNotes as $note) {
            $html .= 'Note : '.$note.'<br>';
        }
        return $html;
    }
}

```
{% endcode-tabs-item %}
{% endcode-tabs %}

