<?php
session_start();
require("connexionbdd.php");
$bdd = connect_bd();
#$bdd = new PDO('mysql:host=127.0.0.1;dbname=peakyblinderswebsite', 'root','');
if((isset($_GET['id'])) AND ($_GET['id']>0))
{
    $getid=intval($_GET['id']);
    $requser=$bdd->prepare("SELECT * FROM MEMBRES WHERE id = ?");
    $requser->execute(array($getid));
    $userinfo=$requser->fetch();
?>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Peaky Blinders | Mon profil</title>
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
    <div align='center'>
        <h2>Profil de <?php echo $userinfo['pseudo'];?></h2>
        <br/><br/>
        Pseudo : <?php echo $userinfo['pseudo'];?><br/>
        Mail : <?php echo $userinfo['mail'];?><br/>
        Avis sur la série : 
        <?php 
        $sql = "SELECT textComm FROM COMMENTAIRES WHERE idMembre= ?";
        $reqcommentaire=$bdd->prepare($sql);
        $reqcommentaire->execute(array($userinfo['id']));
        $commentaire=$reqcommentaire->fetch();
        echo $commentaire['textComm'];
        ?>
        <br/>
        <?php 
        if(isset($_SESSION['id']) AND $userinfo['id']==$_SESSION['id'])
        {
        ?>
            <a href="editionprofil.php">Editer mon profil</a>
            <a href="deconnexion.php">Se déconnecter</a>
            <a href="">Supprimer mon compte</a>
        <?php
        }
        ?>
    </div>
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
?>