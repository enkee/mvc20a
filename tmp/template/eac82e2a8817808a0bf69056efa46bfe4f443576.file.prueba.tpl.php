<?php /* Smarty version Smarty-3.1.8, created on 2014-03-13 05:34:00
         compiled from "D:\webs\mvc20a\src\otros\views\post\ajax\prueba.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9395532135383c3985-48425360%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eac82e2a8817808a0bf69056efa46bfe4f443576' => 
    array (
      0 => 'D:\\webs\\mvc20a\\src\\otros\\views\\post\\ajax\\prueba.tpl',
      1 => 1394536361,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9395532135383c3985-48425360',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'posts' => 0,
    'datos' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53213538418e23_89944105',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53213538418e23_89944105')) {function content_53213538418e23_89944105($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['posts']->value)&&count($_smarty_tpl->tpl_vars['posts']->value)){?>
    <table class="table table-bordered table-condensed table-striped">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Pais</th>
            <th>Ciudad</th>
        </tr>

        <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['nombre'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['pais'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['ciudad'];?>
</td>
            </tr>
        <?php } ?>
    </table>
<?php }else{ ?>

    <p><strong>No hay posts!</strong></p>

<?php }?>

<?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>
<?php }} ?>