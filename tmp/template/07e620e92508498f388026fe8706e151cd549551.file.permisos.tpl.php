<?php /* Smarty version Smarty-3.1.8, created on 2014-01-27 05:08:40
         compiled from "D:\webs\mvc20a\views\acl\permisos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2048850e6145ad3da50-93483004%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07e620e92508498f388026fe8706e151cd549551' => 
    array (
      0 => 'D:\\webs\\mvc20a\\views\\acl\\permisos.tpl',
      1 => 1390795719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2048850e6145ad3da50-93483004',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e6145adfc679_45995828',
  'variables' => 
  array (
    'permisos' => 0,
    '_acl' => 0,
    'rl' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e6145adfc679_45995828')) {function content_50e6145adfc679_45995828($_smarty_tpl) {?><h2>Administración de permisos</h2>

<?php if (isset($_smarty_tpl->tpl_vars['permisos']->value)&&count($_smarty_tpl->tpl_vars['permisos']->value)){?>
<table class="table table-bordered table-condensed table-striped" style="width:500px;">
    <tr>
        <th>ID</th>
        <th>Permiso</th>
        <th>Llave</th>
        <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('admin_access')){?><th></th><?php }?>
    </tr>
    
    <?php  $_smarty_tpl->tpl_vars['rl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permisos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rl']->key => $_smarty_tpl->tpl_vars['rl']->value){
$_smarty_tpl->tpl_vars['rl']->_loop = true;
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['id_permiso'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['permiso'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['key_permiso'];?>
</td>
        <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('admin_access')){?>
            <td style="text-align: center; vertical-align: middle;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/editar_permiso/<?php echo $_smarty_tpl->tpl_vars['rl']->value['id_permiso'];?>
">Editar</a></td>
        <?php }?>
    </tr>
    <?php } ?>
    
</table>
<?php }?>

<p><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/nuevo_permiso" class="btn btn-primary"><i class="icon-plus-sign icon-white"> </i> Agregar Permiso</a></p><?php }} ?>