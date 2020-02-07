<?php
session_start();
require("connexionbdd.php");
$bdd = connect_bd();
#$bdd = new PDO('mysql:host=127.0.0.1;dbname=peakyblinderswebsite', 'root','');
if(!empty($_POST["pseudo"]) AND !empty($_POST["mail"]) AND !empty($_POST["mdp"]))
{
    $pseudo=htmlspecialchars($_POST["pseudo"]);
    $mail=htmlspecialchars($_POST["mail"]);
    $mdp=sha1($_POST["mdp"]);
    if(isset($_POST["forminscription"]))
    {
      $taillepseudo=strlen($pseudo);
      if($taillepseudo <= 20 AND $taillepseudo >= 8)
      {
        if(filter_var($mail,FILTER_VALIDATE_EMAIL))
        {
          $reqmail=$bdd->prepare("SELECT * FROM MEMBRES WHERE mail = ? ");
          $reqmail->execute(array($mail));
          $mailexist= $reqmail->rowCount();
          if ($mailexist==0)
          {
            $requsername=$bdd->prepare("SELECT * FROM MEMBRES WHERE pseudo = ? ");
            $requsername->execute(array($pseudo));
            $usernameexist= $requsername->rowCount();
            if($usernameexist==0)
            {
              $creationmembre= $bdd->prepare("INSERT INTO MEMBRES(pseudo,mail,password,rang,dateInscription) VALUES (?, ?, ?, ?, NOW())");
              $creationmembre->execute(array($pseudo,$mail,$mdp,'Membre'));
              $message = "Votre compte a bien été créé !";
            }
            else
            {
              $message = "Ce nom d'utilisateur est déjà pris";
            }
          }
          else
          {
            $message = "Cette adresse mail est déjà liée à un autre compte";
          }
        }
        else
        {
          $message = "Veuillez saisir une adresse mail valide !";
        }
      }
      else
      {
        $message = "Votre pseudo doit contenir entre 8 et 20 caractères !";
      }
    }    
  else
  {
    $message = "Tous les champs doivent être remplis !";
  }
}
?>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Peaky Blinders | Inscription</title>
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
    <div id="SigninForm" align='center'>
        <br/>
        <h2>Inscription</h2>
        <br/>
        <form method="POST" action="">
          <input type="text" name="pseudo" id="pseudo" placeholder="Pseudonyme" value=<?php if(isset($pseudo)){echo $pseudo;}?>>
          <input type="email"  name="mail" id="mail" placeholder="Adresse mail" value=<?php if(isset($mail)){echo $mail;}?>>
          <input type="password" name="mdp" id="mdp" placeholder="Mot de passe">
          <input type="submit" value="Inscription" name="forminscription">
        </form>
        <p>Déjà inscrit ? <a href="connexion.php">Me connecter</a></p>
        <?php
    if(isset($message)){
      echo "<font color='red'>".$message."</font>";
      if(isset($creationmembre)){
        echo "<a href='connexion.php'> Me connecter</a>";
      }
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