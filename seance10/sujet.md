# Génération de formulaire en POO

## NOTATION

Cet exercice sera à faire valider en fin de séance **obligatoirement**.

* 0, rien n'est fait
* 1, début d'exercice, mais non fonctionnel
* 2, TP réalisé exactement comme demandé
* 3, TP réalisé avec quelques améliorations/optimisations

## Objectifs

Dans cette séance, nous allons voir comment utiliser la POO pour générer des formulaires rapidement, 
sans devoir écrire tout le code HTML.

Dans cette séance, nous allons tout définir dans une seule classeL En général les frmaeworks définissent une 
classe par type de champs et un formulaire est composé de plusieurs objets de type champs. Vous pouvez par 
exemple consulter la document de symfony qui gérer les formulaires de cette manière [Documentation Symfony](https://symfony.com/doc/current/reference/forms/types.html). Cette seconde solution est plus souple et permet de construire le formulaire sans se soucier de sa mise en page et de l'ordre des champs.

**Dans notre cas on supposera que les champs sont construits dans l'ordre**

Cette solution présente plusieurs avantages

* réutilisabilité du code dans différents projets
* Rapiditié de modification du style (le HTML est centralisé dans un unique fichier)

## A disposition

Pour cette séance, vous avez à votre disposition :
* Un fichier contenant les interfaces que vous devez respecter. Ce fichier sera à inclure dans vos différentes classes. [fichier interfacestd5.php](interfacetd5.php)
* Un fichier td5.php qui vous permettra de tester le fonctionnement de vos classes. [fichier td5.php](td5.php)

**Vous devez faire valider le bon fonctionnement de td5.php en fin de séance**

## Classe formulaire : Description des méthodes

A vous d'identifier les propriétés nécesiares dans cette classe. Seul le fonctionnement des méthodes est présenté ici. 
Vous disposez de l'interface pour otenir leur signature à implémenté.

### Constructeur

Doit permetre de définir la balise form d'un formulaire en initialisant l'action, la méthode et le nom du formulaire. 
De manière **optionnelle** on peut définir la classe de style.

### ajoutChampSimple

Doit permetre de créer les champs *input* simple (text, password, email, number, ...). Cette méthode doit prendre les paramètres 
permettant d'écrire un input avec son label associé. Le libellé, le type et le nom du champ sont des champs obligatoires. L'id s'il et vide sera 
égal au nom. De manière **optionnelle** on peut définir la classe de style.

### ajoutChampSelect

Doit permetre de créer les champs *select*. Cette méthode doit prendre les paramètres 
permettant d'écrire un select avec son label associé. Le libellé et le nom du champ sont des champs obligatoires. L'id s'il et vide sera 
égal au nom. De manière **optionnelle** on peut définir la classe de style. On devra également ajouter un champ obligatoire permettant
d'obtenir les valeurs du select pour générer les différentes *option* de notre select.

### ajoutChampChoix

Doit permetre de créer les champs *input* de type *radio* ou *checkbox*. Cette méthode doit prendre les paramètres 
permettant d'écrire un input avec son label associé. Le libellé, le type (radio ou checkbox) et le nom du champ sont des champs obligatoires. L'id s'il et vide sera 
égal au nom. De manière **optionnelle** on peut définir la classe de style. On devra également ajouter un champ obligatoire permettant
d'obtenir les valeurs de l'input pour générer les différentes valeurs.

### genereFormulaireHTML

Cette méthode retournera le code HTML généré pour pouvoir affichier le formulaire dans la page.

### Toutes les autres méthodes présentent dans l'interface ou dans le fichier de test.

Vous pouvez également créer toutes les méthodes privées qui pourraient vous faciliter la vie...

## Bonus

Utiliser un framework CSS (Bootstrap, semanticUI, ...) pour la mise en page de vos formulaire.

