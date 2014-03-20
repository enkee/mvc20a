<?php /* Smarty version Smarty-3.1.8, created on 2014-01-27 04:25:16
         compiled from "D:\webs\mvc20a\views\layout\sigace\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2711851111b465d87e7-02337822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ee31723cc9b23c749685091887b6a895cf30da3' => 
    array (
      0 => 'D:\\webs\\mvc20a\\views\\layout\\sigace\\template.tpl',
      1 => 1390792698,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2711851111b465d87e7-02337822',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51111b468c1aa9_25385058',
  'variables' => 
  array (
    'titulo' => 0,
    '_layoutParams' => 0,
    'widgets' => 0,
    'tp' => 0,
    'wd' => 0,
    '_error' => 0,
    '_mensaje' => 0,
    '_contenido' => 0,
    'plg' => 0,
    'js' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51111b468c1aa9_25385058')) {function content_51111b468c1aa9_25385058($_smarty_tpl) {?><?php if (Session::get('autenticado')){?>
<?php }else{ ?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        header("location:". BASE_URL ."usuario/login");
        exit();
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8">
                <META http-equiv="Expires" content="Mon, 06 Jan 1990 00:00:01 GMT">
                <META http-equiv="Cache-Control" content="no-cache, must-revalidate">
                <META http-equiv="Pragma" content="no-cache">
        <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['titulo']->value)===null||$tmp==='' ? "Sin t&iacute;tulo" : $tmp);?>
</title>
                <!-- Mis Estilos -->
                <!--<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
bootstrap.min.css">-->
                <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
estilos.css">
                <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
jquery-ui-1.10.0.css">
                <!-- JS Plugins -->
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/js/jquery-1.9.1.min.js"></script>
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
jquery_ui-10.0.custom.min.js"></script>
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
bootstrap.min.js"></script>
                <!-- Prefixfree -->
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
prefix_free/prefixfree.min.js"></script>
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
prefix_free/prefixfree.jquery.js"></script>
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
prefix_free/prefixfree.dynamic-dom.min.js"></script>
                <!-- Mis JavaScripts -->
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
utilitarios.js"></script>
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
scripts_jquery.js"></script> 
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
less-1.3.3.min.js"></script>
                <script type="text/javascript">
                    var _root_ = '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
';
                </script>
		<!--<<?php ?>?php
                include ('scripts/browser_class_inc.php');
                    $br=new browser();
                    include 'css/estilos.php'; 
		?<?php ?>>-->
	</head>

    <body>
            <!-- Cuerpo de la apliación -->
       <div id="cuerpo">
            <?php if (isset($_smarty_tpl->tpl_vars['widgets']->value['top'])){?>
                <?php  $_smarty_tpl->tpl_vars['tp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tp']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['widgets']->value['top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tp']->key => $_smarty_tpl->tpl_vars['tp']->value){
$_smarty_tpl->tpl_vars['tp']->_loop = true;
?>
                    <?php echo $_smarty_tpl->tpl_vars['tp']->value;?>

                <?php } ?>
            <?php }?>
            <div id="contenido">
            	<div id="contenedor">
                    <!-- Menu Lateral -->
                    <div id="menu">
                        <?php if (isset($_smarty_tpl->tpl_vars['widgets']->value['sidebar'])){?>
                            <?php  $_smarty_tpl->tpl_vars['wd'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['wd']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['widgets']->value['sidebar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['wd']->key => $_smarty_tpl->tpl_vars['wd']->value){
$_smarty_tpl->tpl_vars['wd']->_loop = true;
?>
                                <?php echo $_smarty_tpl->tpl_vars['wd']->value;?>

                            <?php } ?>
                        <?php }?>
                    </div>
                    <!-- PRINCIPAL -->
                    <div id="principal">
                    	<div id="btnMenu">
                            <br>>
                	</div>
                        <div id="btnMenu2">
                            <br><
                        </div>
                        
                        <noscript><p>Para el correcto funcionamiento debe tener el soporte para javascript habilitado</p></noscript>
                    
                        <?php if (isset($_smarty_tpl->tpl_vars['_error']->value)){?>
                            <div id="_errl" class="alert alert-error">
                                <a class="close" data-dismiss="alert">x</a>
                                <?php echo $_smarty_tpl->tpl_vars['_error']->value;?>

                            </div>
                        <?php }?>

                        <?php if (isset($_smarty_tpl->tpl_vars['_mensaje']->value)){?>
                            <div id="_msgl" class="alert alert-success">
                                <a class="close" data-dismiss="alert">x</a>
                                <?php echo $_smarty_tpl->tpl_vars['_mensaje']->value;?>

                            </div>
                        <?php }?>
                        <!-- Incrustación de Archivo -->
                        <div class="hoja">
                        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Pie de Página -->
            <div id="pie">
                Macrosoft
            </div>
            <!-- Javascript -->
            <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin'])){?>
                <?php  $_smarty_tpl->tpl_vars['plg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plg']->key => $_smarty_tpl->tpl_vars['plg']->value){
$_smarty_tpl->tpl_vars['plg']->_loop = true;
?>
                    <script src="<?php echo $_smarty_tpl->tpl_vars['plg']->value;?>
" type="text/javascript"></script>
                <?php } ?>
            <?php }?>

            <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])){?>
                <?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value){
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
                    <script src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
" type="text/javascript"></script>
                <?php } ?>
            <?php }?>
        </div>
    </body>
</html><?php }} ?>