<?php /* Smarty version Smarty-3.1.8, created on 2013-01-04 00:02:33
         compiled from "D:\webs\mvc20a\views\acl\nuevo_role.tpl" */ ?>
<?php /*%%SmartyHeaderCode:828150e60e0999dde8-90889721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd36ac0473b340c0703347fcda4926f553dbb2d24' => 
    array (
      0 => 'D:\\webs\\mvc20a\\views\\acl\\nuevo_role.tpl',
      1 => 1352216798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '828150e60e0999dde8-90889721',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e60e09cd9430_24055154',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e60e09cd9430_24055154')) {function content_50e60e09cd9430_24055154($_smarty_tpl) {?><style type="text/css">
    table.table td { vertical-align: middle; }
    table.table td input { margin: 0; }
</style>

<h2>Nuevo Role</h2>

<form name="form1" method="post" action="">
    <input type="hidden" value="1" name="guardar">
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Role: </td>
            <td><input type="text" name="role" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['role'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
        </tr>
    </table>
        
    <p><button type="submit" class="btn btn-primary"><li class="icon-ok icon-white"> </li> Guardar</button></p>
</form><?php }} ?>