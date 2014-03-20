<?php /* Smarty version Smarty-3.1.8, created on 2014-03-16 01:14:43
         compiled from "D:\webs\mvc20a\src\sistema\views\acl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20475324ecf32fd238-19122706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5350d510f63ad12efbc7f2226047ab05c22f3e2a' => 
    array (
      0 => 'D:\\webs\\mvc20a\\src\\sistema\\views\\acl\\index.tpl',
      1 => 1394440269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20475324ecf32fd238-19122706',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5324ecf3332796_05063592',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5324ecf3332796_05063592')) {function content_5324ecf3332796_05063592($_smarty_tpl) {?><h2>Listas de control de acceso</h2>

<ul>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/roles">Roles</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/permisos">Permisos</a></li>
</ul><?php }} ?>