<?php /* Smarty version Smarty-3.1.15, created on 2013-11-26 14:34:17
         compiled from "template\connexion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:312025294a359dc6264-51816597%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8347313a0ac81bc86e30ccdf9d60f6e2871abcc5' => 
    array (
      0 => 'template\\connexion.tpl',
      1 => 1385472263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312025294a359dc6264-51816597',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5294a359df11e0_52369908',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5294a359df11e0_52369908')) {function content_5294a359df11e0_52369908($_smarty_tpl) {?><h2> Se connecter </h2>

 <form method="POST" action="connexion.php"enctype="multipart/form-data">
 

<td class="gensmall">   Adresse Mail : </td>
<td><input class="post" type="text" name="mail" size="10" /></td><br><br>



<td class="gensmall">   Password:</td>
<td><input class="post" type="password" name="password" size="10" maxlength="32" /></td><br><br>

	
<div class="form-action">
<input type="submit" name ="connexion" value="Connexion" class="btn btn-large btn-primary" />
</div>
	
	
</form><?php }} ?>
