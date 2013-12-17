<?php

if (isset($_POST['Ajouter'])) {


$titre = $_POST["titre"];
$texte= $_POST["texte"];
$date= date("d.m.y");
$statut= (!empty($_POST["statut"])) ? $_POST["statut"] : 0;

	$sql= "INSERT INTO  `blog`.`articles` (`titre` ,`texte` ,`date`)VALUES ('". $titre ."',  '". $texte ."', UNIX_TIMESTAMP());";
	$req=mysql_query($sql);

	 



} else {
}



?>