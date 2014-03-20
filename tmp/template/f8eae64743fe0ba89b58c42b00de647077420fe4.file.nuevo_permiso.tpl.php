<?php /* Smarty version Smarty-3.1.8, created on 2014-03-16 02:46:39
         compiled from "D:\webs\mvc20a\src\sistema\views\acl\nuevo_permiso.tpl" */ ?>
<?php /*%%SmartyHeaderCode:248365325027fb60bd7-11139642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8eae64743fe0ba89b58c42b00de647077420fe4' => 
    array (
      0 => 'D:\\webs\\mvc20a\\src\\sistema\\views\\acl\\nuevo_permiso.tpl',
      1 => 1394440269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '248365325027fb60bd7-11139642',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5325027fb9cb95_16664568',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5325027fb9cb95_16664568')) {function content_5325027fb9cb95_16664568($_smarty_tpl) {?><style type="text/css">
    table.table td { vertical-align: middle; }
    table.table td input { margin: 0; }
</style>

<h2>Nuevo Permiso</h2>

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
            <td><input type="text" name="key" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['key'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
        </tr>
    </table>
        
    <p><button type="submit" class="btn btn-primary"><li class="icon-ok icon-white"> </li> Guardar</button></p>
</form><?php }} ?>