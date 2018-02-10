<form action="{$postUri}" method="post">
    <input type="hidden" name="auth[driver]" value="{$driver}">
    {if $driver === "server"}
        <input type="hidden" name="auth[server]" value="{$dbData.host}:{$dbData.port}">
        <input type="hidden" name="auth[username]" value="{$dbData.username}">
        <input type="hidden" name="auth[password]" value="{$dbData.password|escape}">
        <input type="hidden" name="auth[db]" value="{$dbData.dbname}">
    {else}
        <input type="hidden" name="auth[server]" value="{$esData.client.hosts[0]}">
    {/if}
</form>
<script>
    document.querySelector("form").submit();
</script>
