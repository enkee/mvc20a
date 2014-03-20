<?php /* Smarty version Smarty-3.1.8, created on 2014-03-03 12:42:33
         compiled from "D:\webs\mvc20a\modules\administrativo\views\cetpro\registro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1462853146aa9a32865-58220038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2deeb190afb738bfef3b16d27e79898023141ab7' => 
    array (
      0 => 'D:\\webs\\mvc20a\\modules\\administrativo\\views\\cetpro\\registro.tpl',
      1 => 1393842787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1462853146aa9a32865-58220038',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53146aa9b48092_13645216',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53146aa9b48092_13645216')) {function content_53146aa9b48092_13645216($_smarty_tpl) {?><h2>Registrar CETPRO</h2>

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