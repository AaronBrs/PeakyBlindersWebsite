<?php
require("connexionbdd.php");
$bdd = connect_bd();
#$bdd = new PDO('mysql:host=127.0.0.1;dbname=peakyblinderswebsite', 'root','');
if(!empty($_POST["pseudo"]) AND !empty($_POST["mail1"]) AND !empty($_POST["mail2"]) AND !empty($_POST["mdp1"]) AND !empty($_POST["mdp2"]))
{
    $pseudo=htmlspecialchars($_POST["pseudo"]);
    $mail1=htmlspecialchars($_POST["mail1"]);
    $mail2=htmlspecialchars($_POST["mail2"]);
    $mdp1=sha1($_POST["mdp1"]);
    $mdp2=sha1($_POST["mdp2"]);
    if(isset($_POST["forminscription"]))
    {
        $pseudolength=strlen($pseudo);
        if($pseudolength <= 255)
        {
            if ($mail1 == $mail2)
            {
                if(filter_var($mail1,FILTER_VALIDATE_EMAIL))
                {
                    $reqmail=$bdd->prepare("SELECT * FROM MEMBRES WHERE mail = ? ");
                    $reqmail->execute(array($mail1));
                    $mailexist= $reqmail->rowCount();
                    if ($mailexist==0)
                    {
                        if ($mdp1 == $mdp2)
                        {
                            $creationmembre= $bdd->prepare("INSERT INTO MEMBRES(pseudo,mail,password) VALUES (?, ?, ?)");
                            $creationmembre->execute(array($pseudo,$mail1,$mdp1));
                            $message = "Votre compte a bien été créé !";
                        }
                        else
                        {
                            $message = "Vos deux mots de passe ne sont pas identiques !";
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
                $message = "Vos deux adresses mail ne correspondent pas !";
            }
        }
        else
        {
            $message = "Votre pseudo ne doit pas contenir plus de 255 caractères !";
        }
    }
    else
    {
        $message= "Tous les champs doivent être remplis !";
    }
}
?>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Peaky Blinders | Inscription</title>
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
      <a class = "BoutonConnexion" href="connexion.php"><button>Connexion</button></a>
    </header>
    <div id="SigninForm" align='center'>
        <br/>
        <h2>INSCRIPTION</h2>
        <br/>
        <form method="POST" action="">
          <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" value=<?php if(isset($pseudo)){echo $pseudo;}?>>
          <input type="email" placeholder="Votre mail" name="mail1"id="mail1" value=<?php if(isset($mail1)){echo $mail1;}?>>
          <input type="email" placeholder="Confirmez votre mail" name="mail2" id="mail2" value=<?php if(isset($mail2)){echo $mail2;}?>>
          <input type="password" name="mdp1" id="mdp1" placeholder="Mot de passe">
          <input type="password"  name="mdp2" id="mdp2" placeholder="Confirmation de votre mdp">
          <input type="submit" value="Inscription" name="forminscription">
        </form>
        <p>Déjà inscrit ? <a href="connexion.php">Me connecter</a></p>
    </div>
    <?php
    if(isset($message)){
        echo "<font color='red'>".$message."</font>";
        if(isset($creationmembre)){
             echo "<a href='connexion.php'>Me connecter</a>";
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