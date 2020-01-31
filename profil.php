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
    <title>Peaky Blinders | Connexion</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <img id="banniere" src="images/banniere.jpg" alt="Bannière">
    <header id="En-tête">
      <nav id="MenuNavigation">
        <ul class="LiensMenus">
          <li><a href="SiteFilm_Accueil.html">Accueil</a></li>
          <li><a href="SiteFilm_Saisons.html">Saisons</a></li>
          <li><a href="SiteFilm_Personnages.html">Personnages</a></li>
          <li><a href="SiteFilm_Quizz.html">Quizz</a></li>
        </ul>
      </nav>
      <a class = "BoutonConnexion" href="#"><button>Mon profil</button></a>
    </header>
    <div align='center'>
        <h2>Profil de <?php echo $userinfo['pseudo'];?></h2>
        <br/><br/>
        Pseudo : <?php echo $userinfo['pseudo'];?><br/>
        Mail : <?php echo $userinfo['mail'];?><br/>
        <?php 
        if(isset($_SESSION['id']) AND $userinfo['id']==$_SESSION['id'])
        {
        ?>
            <a href="editionprofil.php">Editer mon profil</a>
            <a href="deconnexion.php">Se déconnecter</a>
        <?php
        }
        ?>
        </form>
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