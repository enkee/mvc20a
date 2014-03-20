<?php /* Smarty version Smarty-3.1.8, created on 2014-03-09 11:19:22
         compiled from "D:\webs\mvc20a\src\administrativo\views\usuarios\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2989531c402a284235-02989156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89cd5a0d28fe39de5379a785cfcb28d6f12c25db' => 
    array (
      0 => 'D:\\webs\\mvc20a\\src\\administrativo\\views\\usuarios\\login.tpl',
      1 => 1394183872,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2989531c402a284235-02989156',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_531c402a2b9ff8_13808636',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531c402a2b9ff8_13808636')) {function content_531c402a2b9ff8_13808636($_smarty_tpl) {?><style type="text/css">
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