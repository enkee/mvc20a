<?php /* Smarty version Smarty-3.1.8, created on 2014-01-12 02:57:53
         compiled from "D:\webs\mvc20a\views\acl\nuevo_permiso.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1321750e61477d4f9b4-16948978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c7dcb31bd79f6e4fbbbc73de5ee2d8496616e9c' => 
    array (
      0 => 'D:\\webs\\mvc20a\\views\\acl\\nuevo_permiso.tpl',
      1 => 1389488410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1321750e61477d4f9b4-16948978',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e61477e45dd4_47707607',
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e61477e45dd4_47707607')) {function content_50e61477e45dd4_47707607($_smarty_tpl) {?><style type="text/css">
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