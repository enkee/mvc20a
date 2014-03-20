<?php /* Smarty version Smarty-3.1.8, created on 2014-01-12 09:07:55
         compiled from "D:\webs\mvc20a\views\post\editar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:964850eaec2c7ff198-74403375%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b688fda7ec815f795b738418d0821324966fddf4' => 
    array (
      0 => 'D:\\webs\\mvc20a\\views\\post\\editar.tpl',
      1 => 1389487847,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '964850eaec2c7ff198-74403375',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50eaec2cba66c3_20057587',
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50eaec2cba66c3_20057587')) {function content_50eaec2cba66c3_20057587($_smarty_tpl) {?><form id="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Titulo: </td>
            <td><input type="text" name="titulo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['titulo'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Cuerpo: </td>
            <td><textarea name="cuerpo"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['cuerpo'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></td>
        </tr>
    </table>
        
    <p><button class="btn btn-primary"><i class="icon-ok icon-white"> </i> Guardar</button></p>
</form><?php }} ?>