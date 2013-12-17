<?php /* Smarty version Smarty-3.1.15, created on 2013-12-03 15:57:35
         compiled from "template\article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31955294ac271c9186-05074655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c454322435b1cf253ad3b8caa3596c5fbc42df3a' => 
    array (
      0 => 'template\\article.tpl',
      1 => 1386082638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31955294ac271c9186-05074655',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5294ac2720b815_94522578',
  'variables' => 
  array (
    'idGET' => 0,
    'dataForm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5294ac2720b815_94522578')) {function content_5294ac2720b815_94522578($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['idGET']->value)) {?>


<h2> Modifier un article </h2>

		<form action="article.php" method="POST" enctype="multipart/form-data">

			<div class="clearfix">
				<label for="titre">Titre</label>
				<div class="impact"><input type="text" name="titre" id="titre" value="<?php echo $_smarty_tpl->tpl_vars['dataForm']->value['titre'];?>
" /></div>
			</div>
			
			<div class="clearfix">
				<label for="text">Texte</label>
				<div class="impact"><textarea name="texte" id="texte"><?php echo $_smarty_tpl->tpl_vars['dataForm']->value['texte'];?>
</textarea></div>
			</div>
			
			<label for="checkbox"> Publication : </label>
			<input type="checkbox" name="option" value="1"> Oui<br />
			
				<label for="text"> Fichier :</label><br />
			<input type="file" id="datafile" name="datafile" size="40">
			<br />
			<br />
			
			<input type="hidden" name="id" id="id" value="<?php echo $_smarty_tpl->tpl_vars['idGET']->value;?>
" ></textarea>

			
			<div class="form-action">
				<input type="submit" value="modifier" class="btn btn-large btn-primary" />
			</div>

		</form>
		
		<?php } else { ?>
		
		
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

<?php }?><?php }} ?>
