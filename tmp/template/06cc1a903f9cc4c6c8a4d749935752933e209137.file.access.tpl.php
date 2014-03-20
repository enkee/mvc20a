<?php /* Smarty version Smarty-3.1.8, created on 2014-03-03 09:35:21
         compiled from "D:\webs\mvc20a\views\error\access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3124250f3b43969d397-37796619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06cc1a903f9cc4c6c8a4d749935752933e209137' => 
    array (
      0 => 'D:\\webs\\mvc20a\\views\\error\\access.tpl',
      1 => 1390793011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3124250f3b43969d397-37796619',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50f3b439c51941_16902580',
  'variables' => 
  array (
    'mensaje' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f3b439c51941_16902580')) {function content_50f3b439c51941_16902580($_smarty_tpl) {?><h2><?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)){?> <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
<?php }?></h2>

<p>&nbsp;</p>

<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Ir al Inicio</a> | 
<a href="javascript:history.back(1)">Volver a la p&aacute;gina anterior</a>

<?php if ((!Session::get('autenticado'))){?>

| <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuario/login">Iniciar Sesi&oacute;n</a>

<?php }?><?php }} ?>