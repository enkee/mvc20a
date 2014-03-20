<?php /* Smarty version Smarty-3.1.8, created on 2013-02-08 16:10:21
         compiled from "D:\webs\mvc20a\modules\cetpros\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13114510142054b1f06-19515916%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed7432e4f4a921af7e53351296575c2de2bb16f0' => 
    array (
      0 => 'D:\\webs\\mvc20a\\modules\\cetpros\\views\\index\\index.tpl',
      1 => 1360335878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13114510142054b1f06-19515916',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5101420595dbb0_58642257',
  'variables' => 
  array (
    'cetpros' => 0,
    'ce' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5101420595dbb0_58642257')) {function content_5101420595dbb0_58642257($_smarty_tpl) {?><h2>CETPRO's</h2>

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