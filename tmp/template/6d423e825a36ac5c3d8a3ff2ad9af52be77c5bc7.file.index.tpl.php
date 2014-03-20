<?php /* Smarty version Smarty-3.1.8, created on 2014-02-07 05:57:58
         compiled from "D:\webs\mvc20a\modules\usuario\views\login\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:520152e5d733a1acd9-00749106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d423e825a36ac5c3d8a3ff2ad9af52be77c5bc7' => 
    array (
      0 => 'D:\\webs\\mvc20a\\modules\\usuario\\views\\login\\index.tpl',
      1 => 1391748912,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '520152e5d733a1acd9-00749106',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_52e5d733aa6e32_70113524',
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e5d733aa6e32_70113524')) {function content_52e5d733aa6e32_70113524($_smarty_tpl) {?><style type="text/css">
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