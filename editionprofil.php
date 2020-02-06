<?php
session_start();
require("connexionbdd.php");
$bdd = connect_bd();
#$bdd = new PDO('mysql:host=127.0.0.1;dbname=peakyblinderswebsite', 'root','');
if((isset($_SESSION['id'])))
{
    $requser=$bdd->prepare("SELECT * FROM MEMBRES WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user=$requser->fetch();
    if(isset($_POST['nouveaupseudo']) AND !empty($_POST['nouveaupseudo']) AND $_POST['nouveaupseudo'] != $user['pseudo'])
    {
        $nouveaupseudo = htmlspecialchars($_POST['nouveaupseudo']);
        $taillenouveaupseudo=strlen($nouveaupseudo);
        if($taillepseudo <= 20 AND $taillenouveaupseudo >= 8)
        {
          $requsername=$bdd->prepare("SELECT * FROM MEMBRES WHERE pseudo = ? ");
          $requsername->execute(array($nouveaupseudo));
          $usernameexist= $requsername->rowCount();
          if($usernameexist==0)
          {
            $majpseudo = $bdd->prepare("UPDATE MEMBRES SET pseudo = ? WHERE id = ?");
            $majpseudo->execute(array($nouveaupseudo,$_SESSION['id']));
            header("Location: profil.php?id=".$_SESSION['id']);
          }
          else
          {
            $message = "Un utilisateur avec ce pseudonyme existe déjà !";
          }
        }
        else
        {
          $message = "Veuillez saisir un pseudonyme contenant entre 8 et 20 caractères";
        }
    }
    if(isset($_POST['nouveaumail']) AND !empty($_POST['nouveaumail']) AND $_POST['nouveaumail'] != $user['mail'])
    {
      $nouveaumail = htmlspecialchars($_POST['nouveaumail']);
      if(filter_var($mail,FILTER_VALIDATE_EMAIL))
        {
        $reqmail=$bdd->prepare("SELECT * FROM MEMBRES WHERE mail = ? ");
        $reqmail->execute(array($mail));
        $mailexist= $reqmail->rowCount();
        if ($mailexist==0)
        {
          $majmail = $bdd->prepare("UPDATE MEMBRES SET mail = ? WHERE id = ?");
          $majmail->execute(array($nouveaumail,$_SESSION['id']));
          header("Location: profil.php?id=".$_SESSION['id']);
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
    if(isset($_POST['nouveaumdp1']) AND !empty($_POST['nouveaumdp1']) AND isset($_POST['nouveaumdp2']) AND !empty($_POST['nouveaumdp2']) )
    {
        $mdp1= htmlspecialchars($_POST['nouveaumdp1']);
        $mdp2= htmlspecialchars($_POST['nouveaumdp2']);
        if($mdp1 == $mdp2)
        {
            $majmdp = $bdd -> prepare("UPDATE MEMBRES SET password = ? WHERE id = ?");
            $majmdp->execute(array($mdp1,$_SESSION['id']));
            header("Location: profil.php?id=".$_SESSION['id']);
        }
        else
        {
            $message = "Vos deux mots de passe doivent être identiques !";
        }
    }
    if(isset($_POST['nouveaupseudo']) AND $_POST['nouveaupseudo']==$user['pseudo'])
    {
        header("Location: profil.php?id=".$_SESSION['id']);
    }
?>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Peaky Blinders | Edition du profil</title>
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
    <div id="ModifProfilForm" align='center'>
        <br/>
        <h2>Édition de mon profil</h2>
        <br/>
        <form method="POST" action="">
          <input type="text" name="nouveaupseudo" id="nouveaupseudo" placeholder="Nouveau pseudo" value="<?php echo $user['pseudo'];?>">
          <input type="email" name="nouveaumail" id="nouveaumail" placeholder="Nouveau mail" value="<?php echo $user['mail'];?>">
          <input type="password" name="nouveaumdp1" id="nouveaumdp1" placeholder="Nouveau mot de passe">
          <input type="password" name="nouveaumdp2" id="nouveaumdp2" placeholder="Confirmation nouveau mot de passe">
          <input type="submit" name='formedition' value="Mettre à jour les informations du profil">
        </form>
        <?php
    if(isset($message)){
      echo "<font color='red'>".$message."</font>";
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
else
{
    header("Location: connexion.php");
}
?>