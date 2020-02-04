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
    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo'])
    {
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $majpseudo = $bdd->prepare("UPDATE MEMBRES SET pseudo = ? WHERE id = ?");
        $majpseudo->execute(array($newpseudo,$_SESSION['id']));
        header("Location: profil.php?id=".$_SESSION['id']);
    }
    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail'])
    {
        $newmail = htmlspecialchars($_POST['newmail']);
        $majmail = $bdd->prepare("UPDATE MEMBRES SET mail = ? WHERE id = ?");
        $majmail->execute(array($newmail),$_SESSION['id']);
        header("Location: profil.php?id=".$_SESSION['id']);
    }
    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']) )
    {
        $mdp1= htmlspecialchars($_POST['newmdp1']);
        $mdp2= htmlspecialchars($_POST['newmdp2']);
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
    if(isset($_POST['newpseudo']) AND $_POST['newpseudo']==$user['pseudo'])
    {
        header("Location: profil.php?id=".$_SESSION['id']);
    }
?>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Peaky Blinders | Edition du profil</title>
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
        <h2>Édition de mon profil</h2>
        <form  method="POST" action="">
          <table>
            <tr>
              <td><label for="newpseudo">Pseudo : </label></td>
              <td><input type="text" name="newpseudo" id="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo'];?>"></td>
            </tr>
            <tr>
              <td><label for="newmail">Mail : </label></td>
              <td><input type="email" name="newmail" id="newmail" placeholder="Mail" value="<?php echo $user['mail'];?>"><br/></td>
            </tr>
            <tr>
              <td><label for="newmdp1">Mot de passe : </label></td>
              <td><input type="password" name="newmdp1" id="newmdp1" placeholder="Mot de passe"><br/></td>
            </tr>
            <tr>
              <td><label for="newmdp2">Confirmation de votre mot de passe : </label></td>
              <td><input type="password" name="newmdp2" id="newmdp2" placeholder="Confirmation de votre mdp"><br/></td>
            </tr>
          </table>            
          <input type="submit" value="Mettre à jour les informations du profil">
        </form>
        <?php
        if(isset($message))
        {
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