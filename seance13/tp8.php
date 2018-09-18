<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TP8 - Manipulation de base de données</title>
</head>
<body>
<h1>Manipulation de base de données et d'Artiste</h1>
<?php
include 'interfaces.php';
include 'Humain.php';
include 'Artiste.php';
include 'ArtisteManager.php';

$am = new ArtisteManager('localhost', 'root', 'root', 'm3203');
$artiste = new Artiste(array('nom' => 'Conan Doyle', 'prenom' => 'Arthur', 'datenaissance' => '01/01/1800', 'specialite' => 'Auteur', 'image' => 'doyle.jpg'));
$id = $am->addArtiste($artiste);
echo '<p>Artiste ajouté avec l\'id numéro '.$id.'</p>';

$artiste2 = $am->getById($id);
echo '<p>'.$artiste2->sePresente().'</p>';
?>
<h1>Affichage de tous les artistes</h1>
<?php
echo $am->afficheAll();
?>
<h1>Gérer l'update</h1>
<?php
// Ajouter un appel pour la méthode update

echo $am->afficheAll();

?>
</body>
</html>
