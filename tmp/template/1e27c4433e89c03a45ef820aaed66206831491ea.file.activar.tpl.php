<?php /* Smarty version Smarty-3.1.8, created on 2014-03-03 10:25:02
         compiled from "D:\webs\mvc20a\modules\usuario\views\registro\activar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:843853144a6ed94ae1-23162599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e27c4433e89c03a45ef820aaed66206831491ea' => 
    array (
      0 => 'D:\\webs\\mvc20a\\modules\\usuario\\views\\registro\\activar.tpl',
      1 => 1350436530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '843853144a6ed94ae1-23162599',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53144a6edcd925_60004073',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53144a6edcd925_60004073')) {function content_53144a6edcd925_60004073($_smarty_tpl) {?><h2>Activaci&oacute;n de Cuenta</h2>

<p> </p>

<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Ir al Inicio</a>

<?php if (!Session::get('autenticado')){?>
	
	| <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
login">Iniciar Sesi&oacute;n</a>

<?php }?><?php }} ?>