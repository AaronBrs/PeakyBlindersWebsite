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