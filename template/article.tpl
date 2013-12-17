
{if isset($idGET)}


<h2> Modifier un article </h2>

		<form action="article.php" method="POST" enctype="multipart/form-data">

			<div class="clearfix">
				<label for="titre">Titre</label>
				<div class="impact"><input type="text" name="titre" id="titre" value="{$dataForm['titre']}" /></div>
			</div>
			
			<div class="clearfix">
				<label for="text">Texte</label>
				<div class="impact"><textarea name="texte" id="texte">{$dataForm['texte']}</textarea></div>
			</div>
			
			<label for="checkbox"> Publication : </label>
			<input type="checkbox" name="option" value="1"> Oui<br />
			
				<label for="text"> Fichier :</label><br />
			<input type="file" id="datafile" name="datafile" size="40">
			<br />
			<br />
			
			<input type="hidden" name="id" id="id" value="{$idGET}" ></textarea>

			
			<div class="form-action">
				<input type="submit" value="modifier" class="btn btn-large btn-primary" />
			</div>

		</form>
		
		{else}
		
		
		<h2> Rédiger un article </h2>

 <form method="POST" action="article.php"enctype="multipart/form-data" onsubmit="return verifier();">

<div class="clearfix">
		<label for="titre">Titre</label>
		<div class="impact"><input type="text" name="titre" id="titre" /></div>
	</div>
	
	<div class="clearfix">
		<label for="text">Texte</label>
		<div class="impact"><textarea name="texte" id="texte"></textarea></div><br>
	</div>
	
	<label for="checkbox"> Publication : </label>
	<input type="checkbox" name="option" value="1"> Oui<br /><br /><br />
	

	<label for="text"> Fichier :</label>
	<input type="file" id="datafile" name="datafile" size="40">
    <br />
	<br />
	<br />

			<input type="text" name="mess" disabled="disabled" value="" size="50" /><br />

	
	<div class="form-action">
	
		<input type="submit" name ="Ajouter" value="Ajouter" class="btn btn-large btn-primary" />
	</div>
	
	
</form>

{/if}