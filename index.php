
<?php
//On inclut la page de connexion et le header
include ('Includes/connexion.inc.php');
include ('Includes/haut.inc.php');

//on inclut la classe Smarty
require_once("libs/smarty.class.php"); 
$smarty = new Smarty();




$req = mysql_query("SELECT * FROM articles WHERE statut=1 ORDER BY date DESC");
?>

<?php 

//Affichage du résultat de la recherche 
if (isset($_GET['recherche'])) {
$recherche = $_GET["recherche"];


//affichage du nombre de résultats
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$nbarticleParPage = 2;

//traitement du count
$count = ("SELECT COUNT(*) AS nbarticle FROM articles WHERE titre LIKE '%$recherche%' OR texte LIKE '%$recherche%'");
$reqcount = mysql_query($count);
$resultat=mysql_fetch_array($reqcount);
$totalarticle=$resultat["nbarticle"];

//calcul du nb de pages selon les articles
$nbTotalDePage = ceil($totalarticle / $nbarticleParPage);
$debut=($page - 1) * $nbarticleParPage;

$smarty->assign('totalarticle',$totalarticle);

$sql="SELECT id, titre, texte, DATE_FORMAT(date, '%d/%m/%Y') as date_fr, statut FROM articles where articles.titre LIKE '%$recherche%' OR articles.texte LIKE '%$recherche%' ORDER BY date DESC LIMIT $debut, $nbarticleParPage";
}
else
{

$sql2="SELECT id, titre, texte, DATE_FORMAT(date, '%d/%m/%Y') as date_fr, statut FROM articles WHERE statut=1 ORDER BY date DESC";

echo "<h2>Derniers Articles :</h2><hr>";

//traitement d'une nombre de pages
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;

$nbarticleParPage = 2;
$count = ("SELECT COUNT(*) AS nbarticle FROM articles WHERE statut=1");
$reqcount = mysql_query($count);
$resultat=mysql_fetch_array($reqcount);
$totalarticle2=$resultat["nbarticle"];
$nbTotalDePage = ceil($totalarticle2 / $nbarticleParPage);
$debut=($page - 1) * $nbarticleParPage;

$sql=("SELECT id, titre, texte, DATE_FORMAT(date, '%d/%m/%Y') as date_fr, statut FROM articles WHERE statut=1 ORDER BY date DESC LIMIT $debut, $nbarticleParPage");
$req = mysql_query($sql2);
}
$req = mysql_query($sql);

//execution de la requête pour récupérer les résultats
$data_tab = array();
while ($res = mysql_fetch_array($req))
{
	$data_tab[] = $res;	
}


$identification=identification();
$smarty->assign('identification',$identification);
$smarty->assign('data_tab',$data_tab);

//Test qui permet de gérer l'affichage du nombre de pages
//Si la variable Recherche existe, on récupère la variable recherche sur la page index.tpl qui affiche l'url correspondant à une recherche
if (isset($_GET['recherche']))
{
$recherche = $_GET['recherche'];
$smarty->assign('recherche',$recherche);
}
//Dans le cas où la variable recherche n'existe pas, on crée une variable page qui permet d'afficher l'url 
else
{
$page = 0;
$smarty->assign('page',$page);
}




$smarty->assign('nbTotalDePage',$nbTotalDePage);

//affichage de la page index.tpl qui se charge de la mise en page de notre page index
$smarty->display("template/index.tpl");

//On inclut le footer
include ('Includes/bas.inc.php');
?>