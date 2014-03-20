<?php /* Smarty version Smarty-3.1.8, created on 2012-12-14 01:23:55
         compiled from "D:\webs\mvc20\modules\usuarios\views\login\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2802850ca719b912974-72714651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7cd021fa205f252ac6d9060d5c614d9f0495ae0' => 
    array (
      0 => 'D:\\webs\\mvc20\\modules\\usuarios\\views\\login\\index.tpl',
      1 => 1352211066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2802850ca719b912974-72714651',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50ca719b994de8_24862548',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ca719b994de8_24862548')) {function content_50ca719b994de8_24862548($_smarty_tpl) {?><style type="text/css">
    table.table td { vertical-align: middle; }
    table.table td input { margin: 0; }
</style>

<h2>Iniciar Sesi&oacute;n</h2>

<form name="form1" method="post" action="">
    <input type="hidden" value="1" name="enviar" />
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Usuario: </td>
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