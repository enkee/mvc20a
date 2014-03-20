<?php /* Smarty version Smarty-3.1.8, created on 2014-03-11 10:01:05
         compiled from "D:\webs\mvc20a\src\otros\views\post\nuevo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11382531ed0d167f038-02188997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c074af7f6689a43086fe4ab2aaf4ab971ac5c60' => 
    array (
      0 => 'D:\\webs\\mvc20a\\src\\otros\\views\\post\\nuevo.tpl',
      1 => 1394449465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11382531ed0d167f038-02188997',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_531ed0d16c4057_91623979',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ed0d16c4057_91623979')) {function content_531ed0d16c4057_91623979($_smarty_tpl) {?><!-- Se llama asi mismo con tipo de encriptacion-->
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