<?php /* Smarty version Smarty-3.1.8, created on 2014-03-09 11:31:40
         compiled from "D:\webs\mvc20a\src\administrativo\views\cetpros\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24290531c430c6d5bf0-92893096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d2923ac1c928754da40959de63ce53b10805a6e' => 
    array (
      0 => 'D:\\webs\\mvc20a\\src\\administrativo\\views\\cetpros\\index.tpl',
      1 => 1394183872,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24290531c430c6d5bf0-92893096',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cetpros' => 0,
    'ce' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_531c430c717c69_22356792',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531c430c717c69_22356792')) {function content_531c430c717c69_22356792($_smarty_tpl) {?><h2>CETPRO's</h2>

<?php if (isset($_smarty_tpl->tpl_vars['cetpros']->value)&&count($_smarty_tpl->tpl_vars['cetpros']->value)){?>
    <table class="table table-bordered table-striped table-condensed">
        <tr>
            <th>ID</th>
            <th>CETPRO</th>
            <th>Clave</th>
            
        </tr>
        
        <?php  $_smarty_tpl->tpl_vars['ce'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ce']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cetpros']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ce']->key => $_smarty_tpl->tpl_vars['ce']->value){
$_smarty_tpl->tpl_vars['ce']->_loop = true;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['ce']->value['id_cetpro'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['ce']->value['nombre_cetpro'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['ce']->value['clave_cetpro'];?>
</td>
            
        </tr>
            
        <?php } ?>
    </table>
<?php }?><?php }} ?>