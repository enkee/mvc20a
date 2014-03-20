<?php /* Smarty version Smarty-3.1.8, created on 2014-03-16 01:24:53
         compiled from "D:\webs\mvc20a\src\sistema\views\acl\roles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183475324ef55466d99-59445771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3b535fe1156927dba1db3122158adae9d2c67f2' => 
    array (
      0 => 'D:\\webs\\mvc20a\\src\\sistema\\views\\acl\\roles.tpl',
      1 => 1394440269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183475324ef55466d99-59445771',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'roles' => 0,
    'rl' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5324ef554b4b55_33508904',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5324ef554b4b55_33508904')) {function content_5324ef554b4b55_33508904($_smarty_tpl) {?><h2>Administraci&oacute;n de roles</h2>

<?php if (isset($_smarty_tpl->tpl_vars['roles']->value)&&count($_smarty_tpl->tpl_vars['roles']->value)){?>
    <table class="table table-bordered table-condensed table-striped">
        <tr>
            <th>ID</th>
            <th>Role</th>
            <th></th>
            <th></th>
        </tr>
        
        <?php  $_smarty_tpl->tpl_vars['rl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rl']->key => $_smarty_tpl->tpl_vars['rl']->value){
$_smarty_tpl->tpl_vars['rl']->_loop = true;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['id_role'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['role'];?>
</td>
                <td>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/permisos_role/<?php echo $_smarty_tpl->tpl_vars['rl']->value['id_role'];?>
">Permisos</a>
                </td>
                <td>Editar</td>
            </tr>
        <?php } ?>
    </table>
<?php }?>

<p><a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/nuevo_role"><i class="icon-plus-sign icon-white"> </i> Agregar Role</a></p><?php }} ?>