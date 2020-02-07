<?php
session_start();
require("connexionbdd.php");
$bdd = connect_bd();
#$bdd = new PDO('mysql:host=127.0.0.1;dbname=peakyblinderswebsite', 'root','');
if(isset($_POST['formconnexion']))
{
    $pseudoconnect=htmlspecialchars($_POST['pseudoconnect']);
    $mdpconnect=sha1($_POST['mdpconnect']);
    if(!empty($pseudoconnect) AND !empty($mdpconnect))
    {
        $requser=$bdd->prepare("SELECT * FROM MEMBRES WHERE pseudo =  ? AND password = ?");
        $requser->execute(array($pseudoconnect,$mdpconnect));
        $userexist=$requser->rowCount();
        if($userexist == 1)
        {
          $userinfo=$requser->fetch();
          $_SESSION['id']=$userinfo['id'];
          $_SESSION['pseudo']=$userinfo['pseudo'];
          $_SESSION['mail']=$userinfo['mail'];
          $_SESSION['rang']=$userinfo['rang'];
          header("Location: profil.php?id=".$_SESSION['id']);
        }
        else
        {
            $message = "Mot de passe ou pseudo invalide ! Ce compte n'existe peut-être pas";
        }
    }
    else
    {
        $message = "Tous les champs doivent être renseignés !";
    }
}
?>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Peaky Blinders | Connexion</title>
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
    <div id="LoginForm" align='center'>
        <br/>
        <h2>Connexion</h2>
        <br/>
        <form method="POST" action="">
          <input type="text" name="pseudoconnect" id="pseudoconnect" placeholder="Pseudonyme">
          <input type="password" name="mdpconnect" id="mdpconnect" placeholder="Mot de passe">
          <input type="submit" name="formconnexion" value="Connexion">
        </form>
        <p>Pas encore inscrit ? <a href="inscription.php">M'inscrire</a></p>
        <?php
        if(isset($message))
        {
            echo "<font color='red'>".$message."</font>";
        }
        ?>
    </div>
    <br/>
    <footer>
      <p>
      © 2019 Aaron BROSSEAU
      <br>
      Tous droits réservés
      </p>
    </footer>
  </body>
</html>