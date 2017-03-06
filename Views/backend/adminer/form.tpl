<form action="{$postUri}" method="post">
    <input type="hidden" name="auth[driver]" value="server">
    <input type="hidden" name="auth[server]" value="{$dbData.host}:{$dbData.port}">
    <input type="hidden" name="auth[username]" value="{$dbData.username}">
    <input type="hidden" name="auth[password]" value="{$dbData.password}">
    <input type="hidden" name="auth[db]" value="{$dbData.dbname}">
</form>
<script>
    document.querySelector("form").submit();
</script>