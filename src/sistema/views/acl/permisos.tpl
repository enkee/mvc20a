<h2>Administración de permisos</h2>

{if isset($permisos) && count($permisos)}
<table class="table table-bordered table-condensed table-striped" style="width:500px;">
    <tr>
        <th>ID</th>
        <th>Permiso</th>
        <th>Llave</th>
        {if $_acl->permiso('admin_access')}<th></th>{/if}
    </tr>
    
    {foreach item=rl from=$permisos}
    <tr>
        <td>{$rl.id_permiso}</td>
        <td>{$rl.permiso}</td>
        <td>{$rl.key_permiso}</td>
        {if $_acl->permiso('admin_access')}
            <td style="text-align: center; vertical-align: middle;"><a href="{$_layoutParams.root}acl/editar_permiso/{$rl.id_permiso}">Editar</a></td>
        {/if}
    </tr>
    {/foreach}
    
</table>
{/if}

<p><a href="{$_layoutParams.root}acl/nuevo_permiso" class="btn btn-primary"><i class="icon-plus-sign icon-white"> </i> Agregar Permiso</a></p>