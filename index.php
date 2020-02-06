<?php
session_start();
require("connexionbdd.php");
$bdd = connect_bd();
#$bdd = new PDO('mysql:host=127.0.0.1;dbname=peakyblinderswebsite', 'root','');
if(isset($_POST['BoutonCommentaire'])){
  $commentaire=htmlspecialchars($_POST['CommentArea']);
  $postcomment=$bdd->prepare('INSERT INTO COMMENTAIRES(textComm, dateComm, idMembre)VALUES (?, NOW(), ?)');
  $postcomment->execute(array($commentaire,$_SESSION['id']));
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Peaky Blinders | Accueil</title>
    <link rel="icon" href="images/icone.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
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
    <div id="Accueil">
      <article>
        <h1>L'univers Peaky Blinders</h1>
        <section id="Synopsis">
          <h2>Synopsis</h2>
          <p>
            De retour dans les années 1920, au coeur de la ville de Birmingham, une famille formant un gang qui règne sur le monde illégal britannique.
            Entre paris illégaux, vols, rackets, violences en tout genre, bérets et rasoirs, le gang Shelby veut s'imposer et devenir les maîtres de la ville ...
          </p>
        </section>
      </article>
      <aside>
        <h2>Informations complémentaires</h2>
        <section class='AsideSub'>
          <header>
            <h3>Actualités</h3>
          </header>
          <p>Ici seront rédigées les dernières actualités concernant la série.</p>
        </section>
        <section class='AsideSub'>
          <header>
            <h3>Réseaux Sociaux</h3>
          </header>
          <div align='center' class="LiensRS" >
            <a href="https://twitter.com/thepeakyblinder" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.facebook.com/PeakyBlinders" target="_blank">
              <i class="fab fa-facebook"> </i>
            </a>
            <a href="https://www.instagram.com/peakyblindersofficial" target="_blank">
              <i class="fab fa-instagram"> </i>
            </a>
          </div>
        </section>
        <section class='AsideSub'>
          <header>
            <h3>Avis sur la série</h3>
          </header>
          <div align='center'>
            <p>Qu'avez-vous pensez de cette série ?</p>
            <?php
            if(isset($_SESSION['id'])){?>
            <form action="" method="POST">
              <input type='text' name='CommentArea' placeholder='Rédigez votre avis ...' class="CommentArea"><br/>
              <input type='submit' name='BoutonCommentaire' id='BoutonCommentaire' value='Soumettre'>
            </form>
            <?php
              }
              else{?>
              <p><a href='connexion.php'>Connectez-vous</a> ou <a href='inscription.php'>inscrivez-vous</a> pour donner votre avis !</p>
              <?php
              }
              ?>
          </div>
        </section>
        <section class="AsideSub">
          <header>
            <h3>Contactez-moi !</h3>
          </header>
          <div class = "InfoContact">
            <div class="CarteContact">
              <i class="IconeContact fas fa-envelope"></i>
              <p>brosseau.aaron@gmail.com</p>
            </div>
            <div class="CarteContact">
              <i class="IconeContact fas fa-phone"></i>
              <p>07 86 14 24 73</p>
            </div>
          </div>
        </section>
      </aside>
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
