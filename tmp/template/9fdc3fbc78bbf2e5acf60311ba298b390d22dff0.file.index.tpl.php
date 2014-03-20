<?php /* Smarty version Smarty-3.1.8, created on 2012-12-14 01:21:01
         compiled from "D:\webs\mvc20\views\acl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2049250ca70ed7194c4-82034150%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fdc3fbc78bbf2e5acf60311ba298b390d22dff0' => 
    array (
      0 => 'D:\\webs\\mvc20\\views\\acl\\index.tpl',
      1 => 1352154970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2049250ca70ed7194c4-82034150',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50ca70ed78f7c6_41247659',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ca70ed78f7c6_41247659')) {function content_50ca70ed78f7c6_41247659($_smarty_tpl) {?><h2>Listas de control de acceso</h2>

<ul>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/roles">Roles</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/permisos">Permisos</a></li>
</ul><?php }} ?>