{if Session::get('autenticado')}
{else}
    {php}
        header("location:". BASE_URL ."usuarios/login");
        exit();
    {/php}
{/if}
<!DOCTYPE HTML>
<html lang="es">
	<head>
		<META charset="utf-8">
                <META http-equiv="Expires" content="Mon, 06 Jan 1990 00:00:01 GMT">
                <META http-equiv="Cache-Control" content="no-cache, must-revalidate">
                <META http-equiv="Pragma" content="no-cache">
        <title>{$titulo|default:"Sin t&iacute;tulo"}</title>
                <!-- Mis Estilos -->
                <!--<link rel="stylesheet" type="text/css" href="{$_layoutParams.ruta_css}bootstrap.min.css">-->
                <link rel="stylesheet" type="text/css" href="{$_layoutParams.ruta_css}estilos.css">
                <link rel="stylesheet" type="text/css" href="{$_layoutParams.ruta_css}jquery-ui-1.10.0.css">
                <!-- JS Plugins -->
                <script type="text/javascript" src="{$_layoutParams.root}public/js/jquery-1.9.1.min.js"></script>
                <script type="text/javascript" src="{$_layoutParams.ruta_js}jquery_ui-10.0.custom.min.js"></script>
                <script type="text/javascript" src="{$_layoutParams.ruta_js}bootstrap.min.js"></script>
                <!-- Prefixfree -->
                <script type="text/javascript" src="{$_layoutParams.ruta_js}prefix_free/prefixfree.min.js"></script>
                <script type="text/javascript" src="{$_layoutParams.ruta_js}prefix_free/prefixfree.jquery.js"></script>
                <script type="text/javascript" src="{$_layoutParams.ruta_js}prefix_free/prefixfree.dynamic-dom.min.js"></script>
                <!-- Mis JavaScripts -->
                <script type="text/javascript" src="{$_layoutParams.ruta_js}utilitarios.js"></script>
                <script type="text/javascript" src="{$_layoutParams.ruta_js}scripts_jquery.js"></script> 
                <script type="text/javascript" src="{$_layoutParams.ruta_js}less-1.3.3.min.js"></script>
                <script type="text/javascript">
                    var _root_ = '{$_layoutParams.root}';
                </script>
		<!--<?php
                include ('scripts/browser_class_inc.php');
                    $br=new browser();
                    include 'css/estilos.php'; 
		?>-->
	</head>

    <body>
            <!-- Cuerpo de la apliación -->
       <div id="cuerpo">
            {if isset($widgets.top)}
                {foreach from=$widgets.top item=tp}
                    {$tp}
                {/foreach}
            {/if}
            <div id="contenido">
            	<div id="contenedor">
                    <!-- Menu Lateral -->
                    <div id="menu">
                        {if isset($widgets.sidebar)}
                            {foreach from=$widgets.sidebar item=wd}
                                {$wd}
                            {/foreach}
                        {/if}
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
                    
                        {if isset($_error)}
                            <div id="_errl" class="alert alert-error">
                                <a class="close" data-dismiss="alert">x</a>
                                {$_error}
                            </div>
                        {/if}

                        {if isset($_mensaje)}
                            <div id="_msgl" class="alert alert-success">
                                <a class="close" data-dismiss="alert">x</a>
                                {$_mensaje}
                            </div>
                        {/if}
                        <!-- Incrustación de Archivo -->
                        <div class="hoja">
                        {include file=$_contenido}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pie de Página -->
            <div id="pie">
                Macrosoft
            </div>
            <!-- Javascript -->
            {if isset($_layoutParams.js_plugin) && count($_layoutParams.js_plugin)}
                {foreach item=plg from=$_layoutParams.js_plugin}
                    <script src="{$plg}" type="text/javascript"></script>
                {/foreach}
            {/if}

            {if isset($_layoutParams.js) && count($_layoutParams.js)}
                {foreach item=js from=$_layoutParams.js}
                    <script src="{$js}" type="text/javascript"></script>
                {/foreach}
            {/if}
        </div>
    </body>
</html>