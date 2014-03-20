<h2>CETPRO's</h2>

{if isset($cetpros) && count($cetpros)}
    <table class="table table-bordered table-striped table-condensed">
        <tr>
            <th>ID</th>
            <th>CETPRO</th>
            <th>Clave</th>
            
        </tr>
        
        {foreach from=$cetpros item=ce}
        <tr>
            <td>{$ce.id_cetpro}</td>
            <td>{$ce.nombre_cetpro}</td>
            <td>{$ce.clave_cetpro}</td>
            
        </tr>
            
        {/foreach}
    </table>
{/if}