URL du projet : localhost/~brosseau/Site_PeakyBlinders

Explication du JS :

La validation du quizz se fait grâce à une fonction qui va appeller toutes les autres fonctions
 de vérifications question par question

Pour la fonction de vérification de la question 1:

On récupère la valeur saisie par l'uilisateur et la compare a notre ensemble de réponses possibles.
En fonction de la réponse on lui attribue une classe.

Pour la fonction de vérification de la question 2:

On récupère le contenu de l'attribut value de la case cochée
On compare ce que nous avons obtenu à la réponse souhaitée et on affiche un message selon la véracité de la réponse.

Pour la fonction de vérification de la question 3:

On vérifie que seulement les cases voulues soient cochées dans une condition et on affiche le message de réponse.

Pour la fonction de vérification de la question 4:

Sur le même principe que le jeu des pays en "stan" vu en cours,
On parcourt notre liste de personnages et on vérifie si l'indice de l'élement correspond à celui de la
liste des bonnes réponses établie au tout début.
On retrouve également la fonction qui permet de sélectionner une seule fois un personnage dans notre liste déroulante.


Réponse au quizz JS :

Question 1 
-> Thomas Shelby (majuscules non importantes)

Question 2 
-> Angleterre

Question 3 
-> Cochez les cases suivantes seulement : Thomas Shelby / Michael Gray / John Shelby / Arthur Shelby

Question 4 
->  1 - Grace Burgess
    2 - Polly Gray
    3 - Arthur Shelby
    4 - Michael Gray
    5 - John Shelby


Pour se connecter en tant qu'admin et consulter tous les commentaires et membres inscrits:

Pseudonyme : administrateur
Mot de passe : admin

L'onglet "Espace membre" est visible seulement si l'utilisateur connecté a le rang "Administrateur".

On peut éditer le compte sur lequel on est connecté ainsi que le supprimer.
Le compte admin ne peut être ni supprimé ni édité.
Rédaction d'un avis possible uniquement si la personne est connectée.


Changements possible à venir :

Des améliorations seront rajoutées à l'avenir afin de pouvoir enregistrer le score au quizz lorsque la personne est connectée.
D'autres améliorations en CSS sont également prévues.
Une synthétisation du code CSS est en cours en ajoutant des classes plutôt que des ID.