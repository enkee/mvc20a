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
            <link rel="stylesheet" type="text/css" href="{$_layoutParams.ruta_css}jquery-ui/jquery-ui-1.10.4.custom.css">
            <link rel="stylesheet" type="text/css" href="{$_layoutParams.ruta_css}dcaccordion/dcaccordion.css">
            <link rel="stylesheet" type="text/css" href="{$_layoutParams.ruta_css}estilos.css">
            <!-- JS Plugins -->
            <script type="text/javascript" src="{$_layoutParams.root}public/js/jquery-1.7.2.min.js"></script>
            <!--<script type="text/javascript" src="{$_layoutParams.ruta_js}jquery_ui/jquery.ui.core.min.js"></script>
            <script type="text/javascript" src="{$_layoutParams.ruta_js}jquery_ui/jquery.ui.widget.min.js"></script>
            <script type="text/javascript" src="{$_layoutParams.ruta_js}jquery_ui/jquery.ui.accordion.min.js"></script>-->
            <script type="text/javascript" src="{$_layoutParams.ruta_js}bootstrap.min.js"></script>
            <script type="text/javascript" src="{$_layoutParams.ruta_js}jquery-ui-1.10.4.custom.js"></script>
            <!--<script type="text/javascript" src="{$_layoutParams.ruta_js}jquery.bpopup.min.js"></script>-->
            <!--<script type="text/javascript" src="{$_layoutParams.ruta_js}jquery.cookie.js"></script>-->
            <script type="text/javascript" src="{$_layoutParams.ruta_js}jquery.dcjqaccordion.2.7.js"></script>
            <script type="text/javascript" src="{$_layoutParams.ruta_js}jquery.cookieManager.js"></script>
            <!-- Prefixfree -->
            <script type="text/javascript" src="{$_layoutParams.ruta_js}prefix_free/prefixfree.min.js"></script>
            <script type="text/javascript" src="{$_layoutParams.ruta_js}prefix_free/prefixfree.jquery.js"></script>
            <script type="text/javascript" src="{$_layoutParams.ruta_js}prefix_free/prefixfree.dynamic-dom.min.js"></script>
            <!-- Mis JavaScripts -->
            <script type="text/javascript" src="{$_layoutParams.ruta_js}utilitarios.js"></script>
            <script type="text/javascript" src="{$_layoutParams.ruta_js}scripts_jquery.js"></script> 
            <script type="text/javascript" src="{$_layoutParams.ruta_js}less-1.3.3.min.js"></script>
            <script type="text/javascript" src="{$_layoutParams.ruta_js}SessionChecking_2.js"></script>
            <script type="text/javascript" src="{$_layoutParams.ruta_js}crollMenu.js"></script>
            <script type="text/javascript" src="{$_layoutParams.ruta_js}jquery.layout.js"></script>
            <script type="text/javascript">
                //$.cookie("user",'{$_layoutParams.user}');
                var _root_ = '{$_layoutParams.root}';
                var _user_ = '{$_layoutParams.user}';
                $(document).ready(function($){
                    //=== Acoordion ===
                    $("#accordion-1").dcAccordion({
                        eventType: 'click',
                        saveState: true,
                        disableLink: true,	//desabilita el link del padre
                        speed: 'slow',
                        showCount: false,
                        autoExpand: false,						
                        //hoverDelay	 : 300,
                        autoClose: true,	//abre-cierra sub-menus
                        cookie	: 'dcjq-accordion-1',
                        classExpand	 : 'dcjq-current-parent',
                        classParent	 : 'dcjq-parent',
                        classActive	 : 'active',
                        classArrow	 : 'dcjq-icon',
                        classCount	 : 'dcjq-count',
                        //menuClose    : true,
                    });
                    
                    // === LAYOUT ===
                    myLayout = $('body').layout({
                        defaults: {
                            fxName:               "slide",
                            fxSpeed:               "slow",
                            spacing_closed:        12,
                            //initClosed:          true,
                            hideTogglerOnSlide:    true,
                        },

                        north: {
                            size: 300,
                            resizable: false,
                            slidable: false,
                            showOverflowOnHover: true
                        },

                        west: {
                            size: 200,
                            minSize: 150,
                            maxSize: 300,
                            //togglerAlign_closed: 100,
                            spacing_open: 6,
                            spacing_closed: 6,
                            togglerLength_open: 0,
                            togglerLength_closed: 0,
                            /*closable:	false,
                            onresize_start: function () { 
                              alert("Si esta funcionando");
                            },*/
                        },

                        east: {
                            fxName: "appire",
                            resizable: false,
                            slidable: false,
                            size: 150,
                            //noRoom: true,
                        },

                        center: {

                        },
                                
                        south: {
                            visble: false,
                        }
                    });

                    //=== Ocultar panel derecho ===
                    $(window).bind('resize', function(){
                            if ($(window).width() < 500) {
                                    myLayout.hide("east");
                            }else{
                                    myLayout.show("east");
                            }
                    });
                    

                });
            </script>
            <!-- Maneja el css del menu acordion -->
            <link rel="stylesheet" type="text/css" href="{$_layoutParams.ruta_css}dcaccordion/skins/graphite.css">
            <!-- el css para el LAYOUT -->
            <link rel="stylesheet" type="text/css" href="{$_layoutParams.ruta_css}basic_layout_theme.css">
            <link rel="stylesheet" type="text/css" href="{$_layoutParams.ruta_css}cosmetic_layout_theme.css">
            <!--<?php
            include ('scripts/browser_class_inc.php');
                $br=new browser();
                include 'css/estilos.php'; 
            ?>-->
    </head>

    <body>
        <div id="login" >
            <div id="mensaje">La Session a Expirado</div>
            Password:<input type="password" name="pass" id="pass" />
        </div>
       
        <!-- ENCABEZADO -->
        <div class="ui-layout-north" onmouseover="myLayout.allowOverflow(this)" onmouseout="myLayout.resetOverflow(this)">
            {if isset($widgets.top)}
                {foreach from=$widgets.top item=tp}
                    {$tp}
                {/foreach}
            {/if}
        </div>
        <!-- MENU LATERAL -->
        <div class="ui-layout-west">
            <div class="graphite" id="menu"><!--class="graphite"-->
                {if isset($widgets.sidebar)}
                    {foreach from=$widgets.sidebar item=wd}
                        {$wd}
                    {/foreach}
                {/if}
            </div>
        </div>
        <!-- PRINCIPAL -->
        <div class="ui-layout-center">
            
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
            <!-- Incrustacion de Archivo -->
            <div class="hoja">
                {include file=$_contenido}
            </div>
        </div>
        <!-- PANEL DERCHO -->                
        <div class="ui-layout-east">
            <p>Hola</p>
            <p>Hola</p>
            <p>Hola</p>
            <p>Hola</p>
        </div>
        <!-- PIE -->
        <div class="ui-layout-south">
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
    </body>
</html>