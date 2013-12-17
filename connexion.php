

<?php
include ('Includes/haut.inc.php');
include ('Includes/connexion.inc.php');

require_once("libs/smarty.class.php"); //on inclut la classe Smarty
$smarty = new Smarty();
?>

<?php
//on teste si on récupère les variables mail & password
if ( isset($_POST["mail"]) && ($_POST["password"]))
		{
		$mail=$_POST["mail"];
		$password=$_POST["password"];

		$req="select * from utilisateurs where adresse_mail='$mail' AND mdp='$password'";
		$sql=mysql_query($req);

		
//on test si ils correspondent à un utilisateur dans la base
if ( $exe=mysql_fetch_array($sql))

	{
	echo "connexion réussie, vous allez être redirigé d'ici quelques secondes !";
	$sid=md5($exe['adresse_mail'].time());
	$update="UPDATE utilisateurs SET sid ='$sid' WHERE adresse_mail='$mail';";
	mysql_query($update);
	setcookie('sid', $sid, time() + 24 * 60 * 60); //5minutes
	header('Refresh: 3; url=index.php');
	}

			else
			{
			echo "connexion échouée, vous allez être redirigé vers la page de connexion";
			header('Refresh: 3; url=connexion.php');
			}	
		}
		
//Si l'on a pas récupéré les variables mail & password, on affiche le formulaire de connexion
else {
//affichage du formulaire
$smarty->display("template/connexion.tpl");
}


include ('Includes/bas.inc.php');
?>