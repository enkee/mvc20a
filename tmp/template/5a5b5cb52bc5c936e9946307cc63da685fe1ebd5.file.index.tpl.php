<?php /* Smarty version Smarty-3.1.8, created on 2014-03-15 02:43:21
         compiled from "D:\webs\mvc20a\src\otros\views\ajax\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22091531da086ac2db0-62451623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a5b5cb52bc5c936e9946307cc63da685fe1ebd5' => 
    array (
      0 => 'D:\\webs\\mvc20a\\src\\otros\\views\\ajax\\index.tpl',
      1 => 1394536360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22091531da086ac2db0-62451623',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_531da086b2ae46_98847723',
  'variables' => 
  array (
    'paises' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531da086b2ae46_98847723')) {function content_531da086b2ae46_98847723($_smarty_tpl) {?><style type="text/css">
    table.table td { vertical-align: middle; }
    table.table td input, select { margin: 0; }
</style>

<h2>Ejemplo de AJAX</h2>

<form>
    <table class="table table-bordered" style="width: 400px;">    
        <tr>
            <td style="text-align: right;">Pais:</td>
            <td>
            <select id="pais">
                <option value=""> -seleccione- </option>
                <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['paises']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>

                    <option value="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['pais'];?>
</option>

                <?php } ?>
            </select>
            </td>
        </tr>

        <tr>
            <td style="text-align: right;">Ciudad: </td>
            <td><select id="ciudad"></select></td>
        </tr>

        <tr>
            <td style="text-align: right; vertical-align: middle;">Ciudad a insertar: </td>
            <td><input type="text" id="ins_ciudad" /></td>
        </tr>
    </table>
    
    <p><button id="btn_insertar" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Insertar</button></p>
</form><?php }} ?>