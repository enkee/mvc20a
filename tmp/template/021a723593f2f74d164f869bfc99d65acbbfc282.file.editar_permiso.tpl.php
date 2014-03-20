<?php /* Smarty version Smarty-3.1.8, created on 2014-03-16 02:46:27
         compiled from "D:\webs\mvc20a\src\sistema\views\acl\editar_permiso.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6423532502735a72a7-01697993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '021a723593f2f74d164f869bfc99d65acbbfc282' => 
    array (
      0 => 'D:\\webs\\mvc20a\\src\\sistema\\views\\acl\\editar_permiso.tpl',
      1 => 1394440269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6423532502735a72a7-01697993',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53250273601861_47287363',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53250273601861_47287363')) {function content_53250273601861_47287363($_smarty_tpl) {?><style type="text/css">
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