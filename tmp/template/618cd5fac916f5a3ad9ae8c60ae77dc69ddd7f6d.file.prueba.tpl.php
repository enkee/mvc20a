<?php /* Smarty version Smarty-3.1.8, created on 2012-11-06 20:46:28
         compiled from "/var/www/mvc/views/post/prueba.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16897821715099a764966620-53165758%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '618cd5fac916f5a3ad9ae8c60ae77dc69ddd7f6d' => 
    array (
      0 => '/var/www/mvc/views/post/prueba.tpl',
      1 => 1352248964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16897821715099a764966620-53165758',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5099a764b63676_48128897',
  'variables' => 
  array (
    'posts' => 0,
    'datos' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5099a764b63676_48128897')) {function content_5099a764b63676_48128897($_smarty_tpl) {?><h2>Prueba</h2>

<!-- div class="well well-small">
    <form id="form1" class="form-inline">
        Nombre: <input type="text" name="nombre" id="nombre">
        <button type="button" id="btnEnviar" class="btn"><i class="icon-search"></i></button>
        
        <br><br>
        
        <select id="pais"><option value=""> - seleccione pais - </option></select>
        <select id="ciudad"><option value=""> - seleccione ciudad - </option></select>
    </form>
</div -->

<div id="lista_registros">
    <?php if (isset($_smarty_tpl->tpl_vars['posts']->value)&&count($_smarty_tpl->tpl_vars['posts']->value)){?>
        <table class="table table-bordered table-condensed table-striped">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>

            <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['nombre'];?>
</td>
                </tr>
            <?php } ?>
        </table>
    <?php }else{ ?>

        <p><strong>No hay posts!</strong></p>

    <?php }?>

    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>

</div><?php }} ?>