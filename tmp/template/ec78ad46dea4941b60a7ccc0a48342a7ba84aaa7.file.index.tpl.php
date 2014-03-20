<?php /* Smarty version Smarty-3.1.8, created on 2013-01-04 00:02:18
         compiled from "D:\webs\mvc20a\views\acl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2089950e60dfaa630a7-71087997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec78ad46dea4941b60a7ccc0a48342a7ba84aaa7' => 
    array (
      0 => 'D:\\webs\\mvc20a\\views\\acl\\index.tpl',
      1 => 1352154970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2089950e60dfaa630a7-71087997',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e60dfaeb9ae2_52745203',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e60dfaeb9ae2_52745203')) {function content_50e60dfaeb9ae2_52745203($_smarty_tpl) {?><h2>Listas de control de acceso</h2>

<ul>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/roles">Roles</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/permisos">Permisos</a></li>
</ul><?php }} ?>