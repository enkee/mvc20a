<?php /* Smarty version Smarty-3.1.8, created on 2014-01-27 05:10:00
         compiled from "D:\webs\mvc20a\views\acl\editar_permiso.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2055052d2407142ffc9-99895416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e9d848fff6807f5058ad9dfcea5e6591376b258' => 
    array (
      0 => 'D:\\webs\\mvc20a\\views\\acl\\editar_permiso.tpl',
      1 => 1390795794,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2055052d2407142ffc9-99895416',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52d240716eb334_41986565',
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d240716eb334_41986565')) {function content_52d240716eb334_41986565($_smarty_tpl) {?><style type="text/css">
    table.table td { vertical-align: middle; }
    table.table td input { margin: 0; }
</style>

<h2>Editar Permiso</h2>

<form name="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1">
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Permiso: </td>
            <td><input type="text" name="permiso" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['permiso'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
        </tr>
        <tr>
            <td style="text-align: right;">Key: </td>
            <td><input type="text" name="key" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['key_permiso'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
        </tr>
    </table>
        
    <p><button type="submit" class="btn btn-primary"><li class="icon-ok icon-white"> </li> Guardar</button></p>
</form><?php }} ?>