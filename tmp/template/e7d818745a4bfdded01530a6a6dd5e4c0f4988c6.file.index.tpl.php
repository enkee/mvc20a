<?php /* Smarty version Smarty-3.1.8, created on 2013-02-08 16:10:12
         compiled from "D:\webs\mvc20a\modules\estudiantes\views\registro\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1979650fac448dc28b5-77950456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7d818745a4bfdded01530a6a6dd5e4c0f4988c6' => 
    array (
      0 => 'D:\\webs\\mvc20a\\modules\\estudiantes\\views\\registro\\index.tpl',
      1 => 1360336211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1979650fac448dc28b5-77950456',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50fac44950b727_64380449',
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fac44950b727_64380449')) {function content_50fac44950b727_64380449($_smarty_tpl) {?><h2>Registro de Estudiantes</h2>

<div class="well span5" style="border: 0px; margin: 0px">
    <form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="enviar" />

        <p>
            <label>Nombre: </label>
            <input type="text" name="nombre" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['nombre'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </p>

        <p>
            <label>Usuario: </label>
            <input type="text" name="usuario" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['usuario'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </p>

        <p>
            <label>Email: </label>
            <input type="text" name="email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['email'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </p>

        <p>
            <label>Password: </label>
            <input type="password" name="pass" />
        </p>

        <p>
            <label>Confirmar: </label>
            <input type="password" name="confirmar" />
        </p>    

        <p>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </p>
    </form>
</div><?php }} ?>