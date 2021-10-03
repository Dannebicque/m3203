# Séance 1

{% code title="Exercice 1" %}
```php
<?php
// Déclaration d'un tableau 1 dimension
$tableau_notes = array(12, 14, 10);

// Valeur de la 1ère note directement grâce à l'indice
echo $tableau_notes[ 0 ];
echo '<br>';

// Ajout la note de 15 dans le tableau $tableau_notes
array_push($tableau_notes, 15);
$tableau_notes[] = 15; //autre solution


// Boucle de lecture
foreach ($tableau_notes as $note) {
  echo $note .'<br>';
}
echo 'Nombre de notes '. count($tableau_notes);
?>
```
{% endcode %}

{% code title="Exercice 2" %}
```php
<?php
// Déclaration d'un tableau associatif
$tableau_notes = array("Partiel"=>15, "TP"=>11);

// Valeur de la 1ère note directement grâce à son nom
echo 'Note du partiel : '.$tableau_notes[ 'Partiel' ];

//boucle pour afficher les notes avec leur clé
foreach ($tableau_notes as $key => $value) {
  echo 'Note du '.$key.' : '.$value;
  echo '<br>';
}
?>
```
{% endcode %}

{% code title="Exercice 3" %}
```php
<?php
// Déclaration d'un tableau 2 dimension
$tableau_notes = array();
// Ajout de données,$tableau_notes est un tableau de tableau
$tableau_notes[0] = array('Pierre',14);
$tableau_notes[1] = array('Paul',10);
$tableau_notes[2] = array('Jacques',12);

// Afficher la note de Paul
echo $tableau_notes[1][1];

// Boucle de lecture
foreach ($tableau_notes as $etudiant ) {
  // $etudiant est un tableau
  echo $etudiant[0]; // nom de l'étudiant
  echo ' : ';
  echo $etudiant[1] ; // note de l'étudiant
  echo '<br>';
}
?>
```
{% endcode %}

{% code title="Exercice 4" %}
```php
<?php
// Déclaration de la fonction
function affichage_footer($nom, $departement, $module){
    echo '<p>'.$nom.' - '.$departement.' - ' . $module.'</p>';
}

// Appel de la fonction
affichage_footer('IUT de troyes', 'MMI', 'M3203');
affichage_footer('IUT de troyes', 'MMI', 'M2203');

?>
```
{% endcode %}

