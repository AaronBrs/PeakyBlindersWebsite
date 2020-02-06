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
    <title>Peaky Blinders | Personnages</title>
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
    <article id="shelby">
      <h1>Le clan Shelby</h1>
      <section id="thomasshelby">
        <figure>
          <img src="images/thomasshelby.png" alt="Thomas Shelby">
          <figcaption>Thomas Shelby</figcaption>
        </figure>
        <div>
          <h2>Thomas Shelby</h2>
          <p>
            Chef du gang aux rasoirs, entrepreneur criminel,
            bookmaker légitime, capitaine d'industrie et maintenant député,
            Tommy Shelby a connu une ascension astronomique dans la société britannique.
            Il est la définition d'un self-made man - un maître manipulateur,
            négociateur et entrepreneur dont l'ambition débridée est à la mesure de ses
            instincts de survie. Homme de naissance modeste (il a des origines gitanes
            des deux côtés de sa famille), il revient de la guerre avec un sergent-major
            décoré, mais aussi un homme différent, désabusé par ses expériences et souffrant
            du syndrome de stress post-traumatique.
          </p>
        </div>
      </section>
      <section id="arthurshelby">
        <div>
          <h2> Arthur Shelby </h2>
          <p>
            Arthur Shelby est l'aîné des frères et soeurs Shelby et un membre important
            des Peaky Blinders et le vice-président adjoint de la Shelby Company Limited.
            Il est également membre de l'ICA et est le bras droit de son frère Tommy Shelby.
          </p>
        </div>
        <figure>
          <img src="images/arthurshelby.jpg" alt="Arthur Shelby">
          <figcaption>Arthur Shelby</figcaption>
        </figure>
      </section>
      <section id="johnshelby">
        <figure>
          <img src="images/johnshelby.png" alt="John Shelby">
          <figcaption>John Shelby</figcaption>
        </figure>
        <div>
          <h2> John Shelby </h2>
          <p>
            John Michael Shelby, également connu sous le nom de Johnny ou John Boy,
            était le troisième des frères et soeurs Shelby et un membre de haut rang
            des Peaky Blinders. Il était actionnaire à hauteur d'un tiers de l'entreprise
            familiale Shelby, Shelby Company Limited. Il était le mari d'Esme Shelby
            et était donc apparenté à la famille Lee par le mariage.
            Après que les Peaky Blinders se soient mêlés à la famille Changretta,
            John reçoit la Main Noire de leur part, mais il est lent à réagir et
            manque un avertissement de son frère Tommy, et est abattu dans le domaine familial.
          </p>
        </div>
      </section>
      <section id="pollygray">
        <div>
          <h2> Polly Gray </h2>
          <p>
            Polly Gray est la matriarche de la famille Shelby, la tante des frères et sœurs Shelby,
            la trésorière du gang criminel de Birmingham, une comptable agréée
            et la trésorière de la société Shelby Company Limited. Elle a géré les Peaky Blinders
            lorsque les Shelby étaient absents pendant la Grande Guerre. Elle est le chef officieux
            de la famille Shelby et conseille souvent Thomas Shelby sur les affaires du gang.
          </p>
        </div>
        <figure>
          <img src="images/pollygray.png" alt="Polly Gray">
          <figcaption>Polly Gray</figcaption>
        </figure>
      </section>
      <section id="michaelgray">
        <figure>
          <img src="images/michaelgray.png" alt="Michael Gray">
          <figcaption>Michael Gray</figcaption>
        </figure>
        <div>
          <h2> Michael Gray </h2>
          <p>
            Michael Gray est le fils de Polly Shelby, le cousin des frères et soeurs Shelby
            et un membre puissant et de haut rang des Peaky Blinders. Il est le chef comptable
            de la Shelby Company Limited, un poste qui a provoqué des tensions entre John Shelby
            et lui-même avant.
          </p>
        </div>
      </section>
      <section id="adashelby">
        <div>
          <h2> Ada Shelby </h2>
          <p>
            Ada Shelby est la quatrième et seule femme de la fratrie Shelby et la seule membre
            de la famille à ne pas avoir été impliquée dans le gang des Peaky Blinders.
            À la fin de 1924, cependant, Ada occupe une position de premier plan dans la branche
            américaine de la Shelby Company Limited, où elle ne s'occupe que des acquisitions légales,
            contrairement à ses frères de Birmingham, en Angleterre.
          </p>
        </div>
        <figure>
          <img src="images/adashelby.jpg" alt="Ada Shelby">
          <figcaption>Ada Shelby</figcaption>
        </figure>
      </section>
      <section id="graceburgess">
        <figure>
          <img src="images/graceburgess.jpg" alt="Grace Burgess">
          <figcaption>Grace Burgess</figcaption>
        </figure>
        <div>
          <h2> Grace Burgess </h2>
          <p>
            Grace Shelby était une barmaid irlandaise qui a pris un emploi au Garrison Pub,
            et a secrètement opéré comme agent secret pour la police de Birmingham.
            Sa mission consistait à se rapprocher de Thomas Shelby dont elle était tombée amoureuse.
            Lui aussi lui a rendu la pareille, mais il a eu le cœur brisé lorsqu'il a découvert sa trahison.
            Partie à New York, Grace revient au milieu de l'année 1922, mariée à un Américain,
            mais lorsqu'elle retrouve Thomas, il est clair que leurs sentiments antérieurs
            ne se sont pas dissipés. Les retrouvailles, quelque peu gênantes,
            se terminent facilement par un bref rendez-vous galant qui mène à la grossesse de Grace.
            Elle épousa Thomas en 1924, après le suicide de son premier mari.
            Elle a ensuite été assassinée d'une balle qui était destinée à Thomas Shelby.
            Après l'incident, elle continua à hanter Thomas avec ses souvenirs, qui n'avait pas pu
            se remettre de sa mort.
          </p>
        </div>
      </section>
    </article>
    <footer>
      <p>
      © 2019 Aaron BROSSEAU
      <br>
      Tous droits réservés
      </p>
    </footer>
  </body>
</html>
