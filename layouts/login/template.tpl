<!DOCTYPE html>
<html lang="es">
    <head>
         <!-- javascript -->
        <script type="text/javascript" src="{$_layoutParams.root}public/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="{$_layoutParams.ruta_js}bootstrap.js"></script>
        <script type="text/javascript" src="{$_layoutParams.ruta_js}prueba.js"></script>
        
        <title>{$titulo|default:"Sin t&iacute;tulo"}</title>
        <meta charset="utf-8">
        <link href="{$_layoutParams.ruta_css}bootstrap.css" rel="stylesheet" type="text/css">
        
    </head>
    
    <body >
        
        <!-- Cuerpo -->
        <div class="container" id="contenedor">
            
            <!-- Principal -->
            <div class="span8" id="principal">
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

                {include file=$_contenido}
            </div>
            
        </div>
        
        
    </body>
</html>