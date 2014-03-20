<?php /* Smarty version Smarty-3.1.8, created on 2013-02-08 16:10:19
         compiled from "D:\webs\mvc20a\modules\cetpros\views\registro\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31885105d16da31818-44095603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86691c079a157b67e8d8811f5543933190b933b8' => 
    array (
      0 => 'D:\\webs\\mvc20a\\modules\\cetpros\\views\\registro\\index.tpl',
      1 => 1360335867,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31885105d16da31818-44095603',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5105d16e0c9ce4_74428947',
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5105d16e0c9ce4_74428947')) {function content_5105d16e0c9ce4_74428947($_smarty_tpl) {?><h2>Registrar CETPRO</h2>

<div class="well span5">
    <form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="enviar" />

        <p>
            <label>Nombre: </label>
            <input type="text" name="nombre" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['nombre'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </p>

        <p>
            <label>Tipo: </label>
            <input type="text" name="tipo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['tipo'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </p>

        <p>
            <label>Clave: </label>
            <input type="text" name="clave" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['clave'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </p>
        
        <p>
            <button type="submit" class="btn btn-primary" id="hola">Enviar</button>
        </p>
    </form>
</div><?php }} ?>