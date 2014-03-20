<?php /* Smarty version Smarty-3.1.8, created on 2014-03-11 11:14:07
         compiled from "D:\webs\mvc20a\src\otros\views\post\editar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24345531ee1efb75513-98079860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd94ac35d710695226165f65bdf5b41cebb38035b' => 
    array (
      0 => 'D:\\webs\\mvc20a\\src\\otros\\views\\post\\editar.tpl',
      1 => 1394449465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24345531ee1efb75513-98079860',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_531ee1efbb17a0_44583728',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ee1efbb17a0_44583728')) {function content_531ee1efbb17a0_44583728($_smarty_tpl) {?><form id="form1" method="post" action="">
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