# TP N°4 : Revoir les concepts en autonomie

## OBJECTIFS :

*	Construire des classes mettant en œuvre les concepts d’interface, d’héritage et d’encapsulation.
*	Être capable d’écrire seul(e) du code PHP en POO 

## NOTATION

Cet exercice sera à faire valider en fin de séance **obligatoirement**.

* 0, rien n'est fait
* 1, début d'exercice, mais non fonctionnel
* 2, TP réalisé exactement comme demandé
* 3, TP réalisé avec quelques améliorations/optimisations

## TRAVAIL DEMANDE

Codez en PHP les classes suivantes en les regroupant dans un fichier nommé **individu.php**
Récupérez ici le fichier de test : [fichier tp1.php](tp1.php)

Vous pouvez bien sûr commenter des éléments dans le fichier tp1.php pour effectuer vos tests. A la fin de la séance, 
l'ensemble des appels du fichier doivent fonctionner.


##	Classe Individu et interface iHumain

La classe Individu est une classe abstraite qui implémente l’interface iHumain qui définit les méthodes 

*	travailler($nombreheures)
*	reposer($nombrejours)
*	sePresente()

### Les attributs

Les 5 attributs **privés** de la classe Individu sont :

*	$nom : valeur alphanumérique
*	$prenom : valeur alphanumérique
*	$sexe : valeur alphanumérique (homme ou femme)
*	$revenu : revenu en euros, valeur numérique calculée valant 0 par défaut
*	$conges : nombre de congés, valeur numérique calculée valant 0 par défaut

### Les méthodes

*	La méthode travailler($nombreheures) permet de calculer le revenu cumulé d’un individu sur la base horaire de 9.5 euros. A chaque appel de cette méthode, on cumulera le salaire calculé au salaire précédent.
*	La méthode reposer($nombrejours) permet de cumuler le nombre de jours de congés pris. (A chaque appel de la méthode, on cumule les congés)
*	La méthode sePresente() retourne un texte avec le nom et le prénom de l’individu
*	La méthode RAZrevenu() permettra de remettre à zéro le revenu.
*	La méthode RAZconges() permettra de remettre à zéro le nombre de jours de congés
*	La méthode declareSalaire() retournera un texte indiquant le nom, le prénom et le revenu de l’individus

Codez cette classe

## Classe Etudiant

La classe Etudiant est une classe qui hérite de la classe Individu 

### Les attributs

Les attributs privés de la classe Etudiant sont :
*	$numetudiant : 10 chiffres et une lettre
*	$age valeur numérique
*	$formation : valeur alphanumérique
*	$resultat : valeur alphanumérique calculée lors de l’évaluation (méthode évaluer) qui prendra deux valeurs possibles ‘reçu(e)’ ou ‘ajourné(e)’

Cette classe possède également un attribut propre à la classe $nbetudiants qui permettra de connaître le nombre d’instances créées.

### Les méthodes 

*	La méthode travailler($nombreheures) permet de calculer le revenu cumulé d’un(e) étudiant(e) sur la base horaire de 9.5 euros. Mais ce tarif horaire sera minoré de 20% si l’étudiant(e) est âgé(e) de moins de 18 ans. A chaque appel de cette méthode, on cumulera le salaire calculé au salaire précédent.
*	La méthode evaluer($noteExamen) retournera un texte précisant le nom, le prénom et l’indication reçu(e) ou ajourné(e) à l’examen selon la note. Pour être reçu, il faut avoir la moyenne.
*	D’autres méthodes sont à créer : observez le code du fichier [fichier tp1.php](tp1.php) pour les repérer.

Codez cette classe

## Classe Etudiant_mmi

La classe Etudiant_mmi hérite de la classe Etudiant. Il n’est pas possible d’hériter de la classe Etudiant_mmi.

### Les attributs

Un attribut privé : $option. Valeur alphanumérique indiquant le titre de l’option choisie par un(e) étudiant(e) au semestre 4

### Les méthodes

*	La méthode quelleOption() retourne un texte indiquant le nom, le prénom et l’option choisie
*	La méthode ChangerOption($option) permet de modifier l’option de l’étudiant
*	La méthode sePresente reprend la méthode initiale et complète le texte par ‘ et je suis en MMI’.

Codez cette classe
