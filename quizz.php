<?php
session_start();
require("connexionbdd.php");
$bdd = connect_bd();
#$bdd = new PDO('mysql:host=127.0.0.1;dbname=peakyblinderswebsite', 'root','');

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Peaky Blinders | Quizz</title>
    <link rel="icon" href="images/icone.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/quizz.css">
    <script src='js/script.js'></script>
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
    <article id ="Quizz">
      <form id="Questionnaire">
        <!--          
          Intro du quizz (petit paragraphe avec titre de la page)
        -->
        <div id="QuestionUn">
          <h1>Question 1</h1>
          <img id="ImageQuestion1" src="images/thomasshelby.png" alt="Thomas Shelby">
          <br/>
          <label for="personnageQuestion1">Qui est ce personnage ?</label><br/><br/>
          <input type="text" name="QuestionPersonnage" id="personnageQuestion1" class="LabelTextDefault">
        </div> 
        <div id="QuestionDeux">
          <h1>Question 2</h1>
          <p>
            Dans quel pays se déroule la série ?<br/><br/>
            <input type="radio" name="QuestionPays" value="Angleterre" id="ANG"/><label for="ANG">Angleterre</label><br/>
            <input type="radio" name="QuestionPays" value="Ecosse" id="ECO"/><label for="ECO">Ecosse</label><br/>
            <input type="radio" name="QuestionPays" value="Irlande" id="IRL"/><label for="IRL">Irlande</label><br/>
            <input type="radio" name="QuestionPays" value="Pays de Galles" id="PDG"/><label for="PDG">Pays de Galles</label><br/>
          </p>
          <div id="ReponseDeux">

          </div>
        </div>
        <div id="QuestionTrois">
          <h1>Question 3</h1>
          <p>
            Le(s)quel(s) de ces personnages font partie du gang des Peaky Blinders ?<br/><br/>
            <input type="checkbox" name="ThomasShelby" id="ThSh"/><label for="ThSh">Thomas Shelby</label><br/>
            <input type="checkbox" name="JonnhyDogs" id="JoDo"/><label for="JoDo">Johnny Dogs</label><br/>
            <input type="checkbox" name="MichaelGray" id="MiGr"/><label for="MiGr">Michael Gray</label><br/>
            <input type="checkbox" name="JohnShelby" id="JoSh"/><label for="JoSh">John Shelby</label><br/>
            <input type="checkbox" name="BillyKimber" id="BiKi"/><label for="BiKi">Billy Kimber</label><br/>
            <input type="checkbox" name="ArthurShelby" id="ArSh"/><label for="ArSh">Arthur Shelby</label><br/>
            <input type="checkbox" name="FreddieThorne" id="FrTh"/><label for="FrTh">Freddie Thorne</label><br/>
            <input type="checkbox" name="AlfieSolomons" id="AlSo"/><label for="AlSo">Alfie Solomons</label><br/>
          </p>
          <div id="ReponseTrois">
            
          </div>
        </div>
        <div id="QuestionQuatre">
          <h1>Question 4</h1>
          <p>Qui sont ces personnages ?</p>
          <img src="images/QuizzPerso.png" alt="Personnages Quizz" id="ImageQuizzPerso">
          <div id="PersoNumero1">
            1 - 
            <select name="ListePerso1" id="ListeGrace" class="ListePersoQuizz" onchange="selectionPersonnage(this)">
              <option value="" selected>...</option>
              <option value="Arthur Shelby">Arthur Shelby</option>
              <option value="Grace Burgess">Grace Burgess</option>
              <option value="Michael Gray">Michael Gray</option>
              <option value="Polly Gray">Polly Gray</option>
              <option value="John Shelby">John Shelby</option>
            </select>
          </div>
          <div id="PersoNumero2">
            2 - 
            <select name="ListePerso2" id="ListePolly" class="ListePersoQuizz" onchange="selectionPersonnage(this)">
              <option value="" selected>...</option>
              <option value="Arthur Shelby">Arthur Shelby</option>
              <option value="Grace Burgess">Grace Burgess</option>
              <option value="Michael Gray">Michael Gray</option>
              <option value="Polly Gray">Polly Gray</option>
              <option value="John Shelby">John Shelby</option>
            </select>
          </div>
          <div id="PersoNumero3">
            3 - 
            <select name="ListePerso3" id="ListeArthur" class="ListePersoQuizz" onchange="selectionPersonnage(this)">
              <option value="" selected>...</option>
              <option value="Arthur Shelby">Arthur Shelby</option>
              <option value="Grace Burgess">Grace Burgess</option>
              <option value="Michael Gray">Michael Gray</option>
              <option value="Polly Gray">Polly Gray</option>
              <option value="John Shelby">John Shelby</option>
            </select>
          </div>
          <div id="PersoNumero4">
            4 - 
            <select name="ListePerso4" id="ListeMichael" class="ListePersoQuizz" onchange="selectionPersonnage(this)">
              <option value="" selected>...</option>
              <option value="Arthur Shelby">Arthur Shelby</option>
              <option value="Grace Burgess">Grace Burgess</option>
              <option value="Michael Gray">Michael Gray</option>
              <option value="Polly Gray">Polly Gray</option>
              <option value="John Shelby">John Shelby</option>
            </select>
          </div>
          <div id="PersoNumero5">
            5 - 
            <select name="ListePerso5" id="ListeJohn" class="ListePersoQuizz" onchange="selectionPersonnage(this)">
              <option value="" selected>...</option>
              <option value="Arthur Shelby">Arthur Shelby</option>
              <option value="Grace Burgess">Grace Burgess</option>
              <option value="Michael Gray">Michael Gray</option>
              <option value="Polly Gray">Polly Gray</option>
              <option value="John Shelby">John Shelby</option>
            </select>
          </div>
        </div>
      </form>
      <input type="button" name="Verifiertout" value="Verifier vos réponses" id="AllV" onclick="FormValidation()">
    </article>
    <footer>
      <p>
      © 2019 Aaron BROSSEAU
      <br/>
      Tous droits réservés
      </p>
    </footer>
  </body>
</html>
