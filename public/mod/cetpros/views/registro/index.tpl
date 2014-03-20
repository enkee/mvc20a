<h2>Registrar CETPRO</h2>

<div class="well span5">
    <form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="enviar" />

        <p>
            <label>Nombre: </label>
            <input type="text" name="nombre" value="{$datos.nombre|default:""}" />
        </p>

        <p>
            <label>Tipo: </label>
            <input type="text" name="tipo" value="{$datos.tipo|default:""}" />
        </p>

        <p>
            <label>Clave: </label>
            <input type="text" name="clave" value="{$datos.clave|default:""}" />
        </p>
        
        <p>
            <button type="submit" class="btn btn-primary" id="hola">Enviar</button>
        </p>
    </form>
</div>