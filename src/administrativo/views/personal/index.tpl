<h2>Personal </h2>

{if isset($personal) && count($personal)}
    <table class="table table-bordered table-striped table-condensed">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Role</th>
            <th></th>
        </tr>
        
        {foreach from=$personal item=pr}
        <tr>
            <td>{$pr.id}</td>
            <td>{$pr.usuario}</td>
            <td>{$pr.role}</td>
            <td>
                <a href="{$_layoutParams.root}personal/permisos/{$pr.id}">
                   Permisos
                </a>
            </td>
        </tr>
        {/foreach}
    </table>
    <p><a href="{$_layoutParams.root}personal/registro">Nuevo Personal</a></p>
{/if}