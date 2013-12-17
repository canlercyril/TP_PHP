<?php
$adresse = "127.0.0.1";
$nom_bdd = "blog";
$identif = "root";
$mdp = "";


mysql_connect($adresse,$identif,$mdp);
mysql_select_db($nom_bdd);

?>