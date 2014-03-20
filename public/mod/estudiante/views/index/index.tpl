<h2>Estudiantes</h2>

{if isset($estudiantes) && count($estudiantes)}
    <table class="table table-bordered table-striped table-condensed">
        <tr>
            <th>ID</th>
            <th>Estudiante</th>
            <!--<th>Role</th>
            <th></th>-->
        </tr>
        
        {foreach from=$estudiantes item=es}
        <tr>
            <td>{$es.id}</td>
            <td>{$es.usuario}</td>
            <!--
            <td>{$es.role}</td>
            <td>
                <a href="{$_layoutParams.root}usuarios/index/permisos/{$es.id}">
                   Permisos
                </a>
            </td>
            -->
        </tr>
            
        {/foreach}
    </table>
{/if}