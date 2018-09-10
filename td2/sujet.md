## TD2 Concepts de la POO

###	Objectifs

*	Mettre en œuvre les concepts de propriété et de méthode.
*	Mettre en œuvre les concepts de classe et d’objet
*	Construire une application PHP Orienté Objet

----------
Pour les TD et TP de POO nous allons travailler en local pour gagner en efficacité et éviter de devoir uploader le code sur un serveur pour tester. Nous allons donc installer un serveur local. Pour les utilisations de **Windows** vous pouvez utiliser *WampServer*, pour les utilisateurs d'**Apple**, vous pouvez utiliser *MAMP*.
----------

###	Enoncé et travail à faire

Les propriétés

Une voiture est un **OBJET** du monde réel. Il se caractérise par :
*	Sa marque
*	Sa puissance en CV
*	Son kilométrage

Les méthodes

Utiliser une voiture a pour effet d’augmenter la valeur du kilométrage.
On souhaite pouvoir lire les caractéristiques de la voiture



Programmation :

*	Le code de la classe Voiture doit être enregistré dans le fichier **voiture.php**
*	Le code de l’application doit être enregistré dans le fichier **td2_voiture.php**. 
* Utilisez la commande *require* pour appeler la classe Voiture dans l’application.

1.	Ecrire la classe pour définir les propriétés et les méthodes de l’objet Voiture
2.	Ecrire une application :

*qui instanciera les deux voitures suivantes

| Nom de la voiture | marque   | puissance | kilometrage |
| ----------------- | -------- | --------- | ----------- |
| voiture1          | RENAULT  | 90        | 15000       | 
| Voiture2          | PEUGEOT  | 110       | 20000       | 

*	qui affiche les caractéristiques des deux voitures
*	qui modifie la puissance de la voiture1 : nouvelle valeur 110
*	qui affiche le kilométrage des voitures après un déplacement : la voiture 1 parcoure 3500 km et la voiture2 parcoure 1500 km.


