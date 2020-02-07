<?php
session_start();
require("connexionbdd.php");
$bdd = connect_bd();
#$bdd = new PDO('mysql:host=127.0.0.1;dbname=peakyblinderswebsite', 'root','');
$id=$_SESSION['id'];
$reqsuppcompte=$bdd->prepare("DELETE FROM MEMBRES WHERE id = ?");
$reqsuppcompte->execute(array($id));
header('Location: deconnexion.php');
?>