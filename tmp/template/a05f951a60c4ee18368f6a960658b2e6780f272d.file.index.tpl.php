<?php /* Smarty version Smarty-3.1.8, created on 2013-02-08 16:10:28
         compiled from "D:\webs\mvc20a\modules\estudiantes\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1666050fb1867f097d3-61896390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a05f951a60c4ee18368f6a960658b2e6780f272d' => 
    array (
      0 => 'D:\\webs\\mvc20a\\modules\\estudiantes\\views\\index\\index.tpl',
      1 => 1360335855,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1666050fb1867f097d3-61896390',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50fb186821a957_92136211',
  'variables' => 
  array (
    'estudiantes' => 0,
    'es' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fb186821a957_92136211')) {function content_50fb186821a957_92136211($_smarty_tpl) {?><h2>Estudiantes</h2>

<?php if (isset($_smarty_tpl->tpl_vars['estudiantes']->value)&&count($_smarty_tpl->tpl_vars['estudiantes']->value)){?>
    <table class="table table-bordered table-striped table-condensed">
        <tr>
            <th>ID</th>
            <th>Estudiante</th>
            <!--<th>Role</th>
            <th></th>-->
        </tr>
        
        <?php  $_smarty_tpl->tpl_vars['es'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['es']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estudiantes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['es']->key => $_smarty_tpl->tpl_vars['es']->value){
$_smarty_tpl->tpl_vars['es']->_loop = true;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['es']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['es']->value['usuario'];?>
</td>
            <!--
            <td><?php echo $_smarty_tpl->tpl_vars['es']->value['role'];?>
</td>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/index/permisos/<?php echo $_smarty_tpl->tpl_vars['es']->value['id'];?>
">
                   Permisos
                </a>
            </td>
            -->
        </tr>
            
        <?php } ?>
    </table>
<?php }?><?php }} ?>