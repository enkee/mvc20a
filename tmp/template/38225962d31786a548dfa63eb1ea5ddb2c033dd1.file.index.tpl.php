<?php /* Smarty version Smarty-3.1.8, created on 2014-03-09 12:49:24
         compiled from "D:\webs\mvc20a\src\administrativo\modules\usuarios\views\login\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8884531c5544d04641-57892153%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38225962d31786a548dfa63eb1ea5ddb2c033dd1' => 
    array (
      0 => 'D:\\webs\\mvc20a\\src\\administrativo\\modules\\usuarios\\views\\login\\index.tpl',
      1 => 1394361734,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8884531c5544d04641-57892153',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_531c5544d4de90_66269057',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531c5544d4de90_66269057')) {function content_531c5544d4de90_66269057($_smarty_tpl) {?><style type="text/css">
    table.table td { vertical-align: middle; }
    table.table td input { margin: 0; }
</style>

<h2>Iniciar Sesion</h2>

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