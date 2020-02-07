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
    <title>Peaky Blinders | Saisons</title>
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
    <article id='Saisons'>
      <h1>Trailer & résumé des saisons</h1>
      <section id='Saison1'>
        <h2>Saison 1</h2>
        <iframe width="1024" height="576" src="https://www.youtube.com/embed/oVzVdvGIC7U" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <table class="tabSaison">
          <thead>
              <tr>
                <th class='CaseEpisode'> N°Episode </th>
                <th class='CaseTitre'> Titre </th>
                <th class='CaseRésumé'> Résumé </th>
              </tr>
          </thead>
          <tbody>
            <tr>
              <td class='NumEpisode'> Episode 1 </td>
              <td class='TitreEpisode'> Episode 1.1 </td>
              <td class='RésuméEpisode'> Birmingham, 1919. Thomas Shelby controls the Peaky Blinders, one of the city's most feared criminal organizations, but his ambitions go beyond running the streets. When a crate of guns goes missing, Thomas recognizes an opportunity to move up in the world. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 2 </td>
              <td class='TitreEpisode'> Episode 1.2 </td>
              <td class='RésuméEpisode'> Thomas fixes a horse race, provoking the ire of local kingpin Billy Kimber. He also start a war with gypsy family the Lees. Meanwhile, Inspector Campbell carries out a vicious raid of Small Heath in search of the stolen guns. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 3 </td>
              <td class='TitreEpisode'> Episode 1.3 </td>
              <td class='RésuméEpisode'> Thomas plans to go to Cheltenham races in order to get closer to Billy Kimber. Knowing the gangster's appetite for beautiful women, Thomas invites Grace to accompany him. Meanwhile, some IRA sympathisers approach Thomas with an offer to buy the stolen guns. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 4 </td>
              <td class='TitreEpisode'> Episode 1.4 </td>
              <td class='RésuméEpisode'> Thomas Shelby's war with the Lee family of gypsies escalates and Campbell puts further pressure on him to deliver the stolen guns. Meanwhile, John Shelby plans to marry a former prostitute, but Thomas suspects that she's still on the game. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 5 </td>
              <td class='TitreEpisode'> Episode 1.5 </td>
              <td class='RésuméEpisode'> Thomas has to deal with an IRA chief who has come to Small Heath to avenge his cousin's death. Meanwhile, Campbell gets closer to the stolen guns, and Grace has to decide whether her loyalties lie with him or with Thomas. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 6 </td>
              <td class='TitreEpisode'> Episode 1.6 </td>
              <td class='RésuméEpisode'> As Thomas prepares to oust Billy Kimber, hidden secrets are revealed and the family have to face up to the problems that have divided them. Meanwhile, Campbell, obsessed with taking down the Peaky Blinders, unleashed one last plan to destroy them. </td>
            </tr>
          </tbody>
        </table>
      </section>
      <section id='Saison2'>
        <h2>Saison 2</h2>
        <iframe width="1024" height="576"  src="https://www.youtube.com/embed/Z2NeGIDEmfo" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <table class='tabSaison'>
          <thead>
            <tr>
              <th class='CaseEpisode'> N°Episode </th>
              <th class='CaseTitre'> Titre </th>
              <th class='CaseRésumé'> Résumé </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class='NumEpisode'> Episode 1 </td>
              <td class='TitreEpisode'> Episode 2.1 </td>
              <td class='RésuméEpisode'> Peaky Blinders picks up two years later, in 1921. Thomas reveals to his family that he plans to expand their successful business to London. Polly tries to find out what happened to her children, while Thomas, Arthur and John visit a jazz club run by Darby Sabini. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 2 </td>
              <td class='TitreEpisode'> Episode 2.2 </td>
              <td class='RésuméEpisode'> Ada is rescued from Sabini’s men by Peaky Blinders members, while Thomas is in the hospital recovering. He discharges himself from the hospital and heads to Camden Town to meet Alfie Solomons. Arthur Shelby Jr. accidentally beats an opponent to death in a boxing ring, and Thomas receives a letter from Grace. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 3 </td>
              <td class='TitreEpisode'> Episode 2.3 </td>
              <td class='RésuméEpisode'> Whilst Irish gangs fight each other in Birmingham, Arthur is threatened by the mother of the boy he killed in the boxing match and who is not appeased by promises of money. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 4 </td>
              <td class='TitreEpisode'> Episode 2.4 </td>
              <td class='RésuméEpisode'> Arthur spearheads a ferocious takeover of London's Eden Club, meanwhile Thomas and his new horse trainer become better acquainted. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 5 </td>
              <td class='TitreEpisode'> Episode 2.5 </td>
              <td class='RésuméEpisode'> Tommy's powerbase in London has been obliterated. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 6 </td>
              <td class='TitreEpisode'> Episode 2.6 </td>
              <td class='RésuméEpisode'> As Derby day arrives, Tommy is faced with impossible decisions as he prepares to strike back at his enemies and take the family business to the next level. </td>
            </tr>
          </tbody>
        </table>
      </section>
      <section id='Saison3'>
        <h2>Saison 3</h2>
        <iframe  width="1024" height="576" src="https://www.youtube.com/embed/t5D4-nTAWLY" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <table class='tabSaison'>
          <thead>
            <tr>
              <th class='CaseEpisode'> N°Episode </th>
              <th class='CaseTitre'> Titre </th>
              <th class='CaseRésumé'> Résumé </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class='NumEpisode'> Episode 1 </td>
              <td class='TitreEpisode'> Episode 3.1 </td>
              <td class='RésuméEpisode'> It is Thomas Shelby's long-awaited wedding day. A mysterious visitor imperils the entire Shelby family, and Tommy finds himself pulled into a web of intrigue more lethal than anything he has yet encountered. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 2 </td>
              <td class='TitreEpisode'> Episode 3.2 </td>
              <td class='RésuméEpisode'> Tommy discovers the extent of the mission given to him and the extreme lengths his new paymasters are willing to go to in their quest for power. Meanwhile his own family's activities lead to escalating danger in Washington. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 3 </td>
              <td class='TitreEpisode'> Episode 3.3 </td>
              <td class='RésuméEpisode'> Thomas travels to Wales seeking absolution, and uncovers a traitor in the Economic League. Michael develops a taste for guns. Arthur gets good news. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 4 </td>
              <td class='TitreEpisode'> Episode 3.4 </td>
              <td class='RésuméEpisode'> Polly goes to confession, igniting a chain of events that reveals a trap being laid at the Shelbys' expense. Thomas plans an exit from dirty business. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 5 </td>
              <td class='TitreEpisode'> Episode 3.5 </td>
              <td class='RésuméEpisode'>As the Russians test the Peaky Blinders, Tommy realises that he is seriously outmanoeuvred. But he has an ace up his sleeve. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 6 </td>
              <td class='TitreEpisode'> Episode 3.6 </td>
              <td class='RésuméEpisode'> As Tommy prepares to commit the most audacious crime of his career, an unexpected blow forces him to face his worst fears in a race against time. </td>
            </tr>
          </tbody>
        </table>
      </section>
      <section id='Saison4'>
        <h2>Saison 4</h2>
        <iframe width="1024" height="576" src="https://www.youtube.com/embed/0hr9lPqEAXg" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <table class='tabSaison'>
          <thead>
            <tr>
              <th class='CaseEpisode'> N°Episode </th>
              <th class='CaseTitre'> Titre </th>
              <th class='CaseRésumé'> Résumé </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class='NumEpisode'> Episode 1 </td>
              <td class='TitreEpisode'> The Noose </td>
              <td class='RésuméEpisode'> It is Christmas and Tommy Shelby receives a letter that makes him realize that he and every member of the family are in danger. He knows that it is time for the family to bury their differences and face the enemy together. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 2 </td>
              <td class='TitreEpisode'> Heathens </td>
              <td class='RésuméEpisode'> As the Shelbys come to terms with shocking events, Tommy makes a decision he may come to regret. Meanwhile, a bold new enemy makes his move. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 3 </td>
              <td class='TitreEpisode'> Blackbird </td>
              <td class='RésuméEpisode'> Luca Changretta understands the complexity of his enemy, as the weight of gypsy tradition hangs upon Arthur. But could there be a traitor within the Peaky Blinders' midst? </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 4 </td>
              <td class='TitreEpisode'> Dangerous </td>
              <td class='RésuméEpisode'> In a daring cat and mouse chase, will Tommy be outwitted by his enemies? And with the return of an old friend, Tommy tries to distract himself with other pursuits. </td>              </tr>
            <tr>
              <td class='NumEpisode'> Episode 5 </td>
              <td class='TitreEpisode'> The Duel </td>
              <td class='RésuméEpisode'> Tommy prepares himself as the bloody battle lines are drawn between the Peaky Blinders and Changretta. A deal is struck - with potentially devastating consequences. </td>
            </tr>
            <tr>
              <td class='NumEpisode'> Episode 6 </td>
              <td class='TitreEpisode'> The Company </td>
              <td class='RésuméEpisode'> It is the night of the big fight - Bonnie Gold versus Goliath. But as the bell rings and the crowd goes wild, dangers lurk in the shadows for Thomas Shelby and his family. When Luca Changretta plays his final ace, he sets in motion a series of events that will change the Peaky Blinders forever. </td>
            </tr>
          </tbody>
        </table>
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
