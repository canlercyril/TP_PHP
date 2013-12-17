<?php
include ('Includes/haut.inc.php');
include ('Includes/connexion.inc.php');

//on inclut la classe Smarty
require_once("libs/smarty.class.php"); 
$smarty = new Smarty();

unset($_COOKIE['sid']);
setcookie('sid', NULL, -1);

$smarty->display("template/deconnexion.tpl");

header('Refresh: 3; url=index.php');

include ('Includes/bas.inc.php');
?>