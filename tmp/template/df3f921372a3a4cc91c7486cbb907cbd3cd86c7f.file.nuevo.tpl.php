<?php /* Smarty version Smarty-3.1.8, created on 2014-01-13 04:12:26
         compiled from "D:\webs\mvc20a\views\post\nuevo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3103250e762538f4f96-51564196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df3f921372a3a4cc91c7486cbb907cbd3cd86c7f' => 
    array (
      0 => 'D:\\webs\\mvc20a\\views\\post\\nuevo.tpl',
      1 => 1389525855,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3103250e762538f4f96-51564196',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e76253a93eb9_79379324',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e76253a93eb9_79379324')) {function content_50e76253a93eb9_79379324($_smarty_tpl) {?><!-- Se llama asi mismo con tipo de encriptacion-->
<form id="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
post/nuevo" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Titulo: </td>
            <td><input type="texto" name="titulo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['titulo'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>
    
        <tr>
            <td style="text-align: right;">Cuerpo: </td>
            <td><textarea name="cuerpo"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['cuerpo'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></td>
        </tr>

        <tr>
            <td colspan="4">
                Imagen: <input type="file" name="imagen" />
            </td>
        </tr>
    </table>
        
    <p><button class="btn btn-primary"><i class="icon-ok icon-white"> </i> Guardar</button></p>
</form><?php }} ?>