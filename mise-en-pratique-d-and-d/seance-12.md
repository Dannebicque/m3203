# Séance 12

{% hint style="info" %}
### Notation

Cet exercice sera à faire valider en fin de séance **obligatoirement**.

* 0, rien n'est fait
* 1, début d'exercice, mais non fonctionnel
* 2, TP réalisé exactement comme demandé
* 3, TP réalisé avec quelques améliorations/optimisations
{% endhint %}

## Terminer les séances précédentes

N'oubliez pas d'ajouter la gestion des attributs avec un manager \(voir séance 9\)

## Gérer les déplacements

En vous basant sur le fichier ci-dessous \(à compléter\), permettre le choix d'un personnage et de saisir son déplacement.

{% code title="seance12.php" %}
```php
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/styles.css">
  <title>Séance 12</title>
</head>
<body>
<?php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});

$pm = new PersonnageManager(...);

$personnages = ...;
foreach ($personnages as $personnage)
{
  Affichage::addPersonnage($personnage);
}

?>

<div>
  <div class="plateau">
    <?php
    Affichage::affichePlateau();
    ?>
  </div>
  <div class="deplacement">
    <form action="deplacement.php" method="post">
      <p>Personnage : <select name="personnage">
          <option value="">Choisir</option>
          <?php
          ... liste des personnages dans la liste déroulante
          ?>
        </select>
      </p>
      <p>Déplacement en X : <input name="dep_x" type="text"></p>
      <p>Déplacement en Y : <input name="dep_y" type="text"></p>
      <button type="submit">Déplacer</button>
    </form>
  </div>
</div>

</body>
</html>

```
{% endcode %}

{% code title="deplacement.php" %}
```php
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
    <?php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});

$pm = new PersonnageManager(...);

$id = $_POST['personnage'];
$personnage = $pm->getById($id);

//Déplacement
    $personnage->deplaceX($_POST['dep_x']);
    $personnage->deplaceY($_POST['dep_y']);

    $pm->update($personnage);
?>
<script>
  window.location.href = 'http://localhost:8888/M3203Exercices/TPs/seance12.php';
</script>
</body>
</html>

```
{% endcode %}

Le fichier de traitement est partiellement donné ci-dessous.

Il doit :

* déplacer le personnage en X et en Y
* S'assurer que le personnage ne sort pas du plateau \(la nouvelle position doit rester dans le plateau. Si ce n'est pas le cas, ne pas bouger le personnage dans le sens qui pose problème\)
* Sauvegarder la nouvelle position du personnage dans la base de données.

### Eléments à intégrer

Vous devrez ajouter une propriété id dans la classe personnage pour récupérer l'id de la base de données.

Vous devrez ajouter une méthode update dans la classe PersonnageManager pour mettre à jour le personnage.

## Résolution des combats

Si deux personnages sont sur la même case, une phase de combat commence.

Ajouter le code ci-dessous dans le fichier de traitement de votre formulaire

```php
$personnages = $pm->getAll();
    foreach ($personnages as $perso)
    {
        $combat = Combat::ResolutionCombat($perso, $personnage);
        if ($combat == true)
        {
            $pm->update($personnage);
            $pm->update($perso);
        }
    }
```

Ce fichier regarde pour tous les personnages si un personnage est déjà présent sur la case.

Si c'est le cas :

* On vérifie que ce n'est pas le même personnage \(id identique\)
* On inflige les dégâts
  * Une arme inflige des dégâts, mais la protection la bloque. 
  * A chaque fois qu'une protection bloque, elle perd des points équivalent aux dégâts.
  * Une protection peut donc disparaître.
  * Un personnage sans point de vue meurt.
  * C'est le personnage qui arrive qui attaque en premier
  * Si les deux personnages sont toujours vivant à la fin d'un conflit, le personnage qui arrive recule d'une case en X ou en Y. 

Le début de la classe abstraite Combat peut être

```php
abstract class Combat
{
    public static function ResolutionCombat(&$perso1, &$perso2)
    {
        if ($perso1->getId() != $perso2->getId())
        {
            ...
        }

        return ...;
    }
}
```

