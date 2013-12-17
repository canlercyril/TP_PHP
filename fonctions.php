<?php
//on inclut la page de connexion
include ('Includes/connexion.inc.php');



//Fonction permettant l'identification
function identification ()  {

if (isset ($_COOKIE['sid']))
{
	$maVariable=$_COOKIE['sid'];

	$sql=mysql_query("select count(*) as total FROM utilisateurs where sid='$maVariable'");
	$data=mysql_fetch_array($sql);


if ($data['total'])
	{
	return true;
	}
else
	{
	return false;
	}
}

	else 
		{
		return false;
		}
}


?>