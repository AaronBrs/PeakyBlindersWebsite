<?php
session_start();
require("connexionbdd.php");
$bdd = connect_bd();
#$bdd = new PDO('mysql:host=127.0.0.1;dbname=peakyblinderswebsite', 'root','');

if(isset($_SESSION['rang'])){
    if($_SESSION['rang']=='Administrateur'){

?>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Peaky Blinders | Espace membre</title>
    <link rel="icon" href="images/icone.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <img id="banniere" src="images/banniere.jpg" alt="Bannière">
    <header id="En-tête">
      <nav id="MenuNavigation">
        <ul class="LiensMenus">
          <li><a href="index.php">Accueil</a></li>
          <li><a href="saisons.php">Saisons</a></li>
          <li><a href="personnages.php">Personnages</a></li>
          <li><a href="quizz.php">Quizz</a></li>
          <?php
          if(isset($_SESSION['rang'])){
            if($_SESSION['rang']=='Administrateur'){
          ?>
          <li><a href="espacemembre.php">Espace membre</a></li>

          <?php
            }
          }
          ?>
        </ul>
      </nav>
      <?php
      if(isset($_SESSION['id'])){?>
      <a class = "BoutonProfil" href="profil.php?id=<?php echo $_SESSION['id'];?>"><button>Mon profil</button></a>
      <?php
      }
      else{?>
      <a class = "BoutonConnexion" href="connexion.php"><button>Connexion</button></a>
      <?php
      }
      ?>
    </header>
    <?php
    $reqaffichagecomm=$bdd->prepare("SELECT pseudo,textComm,dateComm FROM MEMBRES M NATURAL JOIN COMMENTAIRES C WHERE C.idMembre=M.id ORDER BY dateComm DESC");
    $reqaffichagecomm->execute();
    $commentaires=array();
    while($row = $reqaffichagecomm->fetch())
      $commentaires[]=$row;
    ?>
    <section>
    <h1>Liste des commentaires</h1>
    <table class = "listeBDD">
    <thead>
      <tr>
        <th>Pseudo</th>
        <th>Commentaires</th>
        <th>Date de publication</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach($commentaires as $commentaire):
      ?>
      <tr>
        <td><?php echo $commentaire['pseudo'];?></td>
        <td><?php echo $commentaire['textComm'];?></td>
        <td><?php echo $commentaire['dateComm'];?></td>
      </tr>
      
    <?php
    endforeach;
    ?>
    </tbody>
    </table>
    <?php
    $reqaffichagemembres=$bdd->prepare("SELECT id,pseudo,mail,password,dateInscription FROM MEMBRES ORDER BY dateInscription DESC");
    $reqaffichagemembres->execute();
    $membres=array();
    while($row = $reqaffichagemembres->fetch()){
      $membres[]=$row;
    }
    ?>
    <h1>Liste des membres inscrits</h1>
    <table class = "listeBDD">
    <thead>
      <tr>
        <th>Pseudo</th>
        <th>Mail</th>
        <th>Mot de passe</th>
        <th>Date d'inscription</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach($membres as $membre):
      ?>
      <tr>
        <td><?php echo $membre['pseudo'];?></td>
        <td><?php echo $membre['mail'];?></td>
        <td><?php echo $membre['password'];?></td>
        <td><?php echo $membre['dateInscription'];?></td>
        <td><a href="profil.php<?php echo '?id='.$membre['id'];?>">Voir profil</a></td>
      </tr>
      
    <?php
    endforeach;
    ?>
    </tbody>
    </table>
  </section>
    <footer>
      <p>
      © 2019 Aaron BROSSEAU
      <br>
      Tous droits réservés
      </p>
    </footer>
  </body>
</html>
<?php
    }
}
?>