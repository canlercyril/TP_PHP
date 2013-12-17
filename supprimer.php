<?php
include ('Includes/haut.inc.php');
include ('Includes/connexion.inc.php');

require_once("libs/smarty.class.php"); //on inclut la classe Smarty
$smarty = new Smarty();

$id = $_GET['id'];
$SQL = "DELETE FROM articles Where id='$id';";
$req = mysql_query($SQL);

$smarty->display("template/supprimer.tpl");

header('Refresh: 3; url=index.php');

include ('Includes/bas.inc.php');

?>