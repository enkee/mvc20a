<?php /* Smarty version Smarty-3.1.8, created on 2014-03-11 09:24:04
         compiled from "D:\webs\mvc20a\src\sistema\views\error\access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:785531ec8244b30c1-33748341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3cc4aaec7b1afdfe2a583c47399147ca6f5b5a4' => 
    array (
      0 => 'D:\\webs\\mvc20a\\src\\sistema\\views\\error\\access.tpl',
      1 => 1394440286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '785531ec8244b30c1-33748341',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mensaje' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_531ec8244f3dd8_55919627',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ec8244f3dd8_55919627')) {function content_531ec8244f3dd8_55919627($_smarty_tpl) {?><h2><?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)){?> <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
<?php }?></h2>

<p>&nbsp;</p>

<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Ir al Inicio</a> | 
<a href="javascript:history.back(1)">Volver a la p&aacute;gina anterior</a>

<?php if ((!Session::get('autenticado'))){?>

| <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuario/login">Iniciar Sesi&oacute;n</a>

<?php }?><?php }} ?>