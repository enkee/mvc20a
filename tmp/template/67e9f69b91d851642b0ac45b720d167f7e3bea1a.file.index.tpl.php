<?php /* Smarty version Smarty-3.1.8, created on 2013-01-04 00:18:53
         compiled from "D:\webs\mvc20a\modules\usuarios\views\login\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:452350e611dd909640-83613231%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67e9f69b91d851642b0ac45b720d167f7e3bea1a' => 
    array (
      0 => 'D:\\webs\\mvc20a\\modules\\usuarios\\views\\login\\index.tpl',
      1 => 1355800043,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '452350e611dd909640-83613231',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e611dd9b0864_98359126',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e611dd9b0864_98359126')) {function content_50e611dd9b0864_98359126($_smarty_tpl) {?><style type="text/css">
    table.table td { vertical-align: middle; }
    table.table td input { margin: 0; }
</style>

<h2>Iniciar Sesi&oacute;n</h2>

<form name="form1" method="post" action="">
    <input type="hidden" value="1" name="enviar" />
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Usuario: </td>
            <!-- Muestra los datos de usuario -->
            <td><input type="text" name="usuario" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['usuario'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>

        <tr>
            <td style="text-align: right;">Password: </td>
            <td><input type="password" name="pass" /></td>
        </tr>
    </table>
        
    <p><button type="submit" class="btn btn-primary"><li class="icon-ok icon-white"> </li> Entrar</button></p>
</form><?php }} ?>