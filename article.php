<script type="text/javascript">
function verifier ()
{
	erreur = document.getElementsByName("mess")[0];
	test   = document.getElementsByName("titre");
	test2  = document.getElementsByName("texte");

	for (var z=0; z<test.length; z++)
	{
		if (test[z].value == "")
		{
			erreur.value = "Ce champs doit être renseigné !";
			test[z].style.backgroundColor = "red";
			return false;
		}
		else
		{
			test[z].style.backgroundColor = "white";
		}
		
		if (test2[z].value == "")
		{
			erreur.value = "Ce champs doit être renseigné !";
			test2[z].style.backgroundColor = "red";
			return false;
		}
		else
		{
			test2[z].style.backgroundColor = "white";
		}
	}

	erreur.value = "";

	return true;
}
</script>

<?php

include ('Includes/haut.inc.php');
include ('Includes/connexion.inc.php');

require_once("libs/smarty.class.php"); //on inclut la classe Smarty
$smarty = new Smarty();
?>


<?php
//On teste si l'utilisateur est identifié
if (identification()==true)
{

if (isset($_POST['Ajouter'])) {


$titre = $_POST["titre"];
$texte= $_POST["texte"];
$option= $_POST["option"];

$date = date("Y-m-d");

/*$statut= (!empty($_POST["statut"])) ? $_POST["statut"] : 0;*/  

	$sql= "INSERT INTO  `blog`.`articles` (`titre` ,`texte` ,`date`, `statut`)VALUES ('". $titre ."',  '". $texte ."', '". $date ."','". $option ."');";
	$req=mysql_query($sql);
	
	if (!empty($_POST['datafile'])) {
	
	$erreur_image = $_FILES['datafile']['error'];
	
	} else
	
	{ 
    $erreur_image = "";
	}
	
	$id = mysql_insert_id();
	move_uploaded_file($_FILES['datafile']['tmp_name'], dirname(__FILE__) ."../img/$id.jpg");
	header("Location: index.php");
	

	
} else {

if ( isset($_POST["id"]) )
	{
	
	$id = $_POST["id"];
	$titre = $_POST["titre"];
	$texte= $_POST["texte"];
	$option = $_POST["option"];
	
	
		// MODIFICATIONS
		$SQL = "UPDATE `blog`.`articles` SET `titre` = '".$_POST["titre"]."', `texte` = '".$_POST["texte"]."', `statut` = '".$option."' WHERE `articles`.`id` = ".$_POST["id"].";";
		
		print_r($SQL);
		
		if (!empty($_POST['datafile'])) {
	
	$erreur_image = $_FILES['datafile']['error'];
	
	} else
	
	{ 
    $erreur_image = "";
	}
	
	
	move_uploaded_file($_FILES['datafile']['tmp_name'], dirname(__FILE__) ."../img/$id.jpg");
	
			if ( mysql_query($SQL) )
			{
				header("Location: index.php");
				
			} else {
				echo "Problème de modifications why !";
				mysql_error();
			}
			
	}	
	
if ( isset($_GET["id"])) 
	{ 
		$req = mysql_query("SELECT * FROM articles WHERE id=".$_GET["id"]."");
		$res = mysql_fetch_array($req);
		extract($res);
		
		// on récupère la variable id que l'on obtient dans l'url
		//Pour tester dans article.tpl si la valeur idGET existe et donc quel formulaire afficher
		$idGET = $_GET["id"];
		$smarty->assign("idGET", $idGET);
		$option = $res["statut"];
		$smarty->assign("statut", $statut);
		
		//On récupère les valeurs de notre $res pour les utiliser dans article.tpl
		$smarty->assign("dataForm", $res);
		
		
		//On affiche le formulaire de Modification
		$smarty->display("template/article.tpl");

		

} else {

//On affiche le formulaire d'ajout d'un nouvel article
$smarty->display("template/article.tpl");


}
}
}

else
{
echo "Vous n'êtes pas autorisés à accéder à cette page !</br></br>";
echo "Vous allez être redirigés vers la page d'accueil.";
header('Refresh: 3; url=index.php');
}
?>


<?php
include ('Includes/bas.inc.php');
?>

