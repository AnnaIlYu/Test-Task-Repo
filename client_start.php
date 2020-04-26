<?php
if(isset($_POST['client_login']))
{
?>
<script>document.location.href="client_login.php"</script>
<?
   exit();
}
else if(isset($_POST['client_reg']))
{
?>
<script>document.location.href="client_reg.php"</script>
<?
}

?>


<form method="POST">
Здравствуйте, уважаемый Клиент!<br>
Выберите дальнейшее действие:<br><br>
<input name="client_login" type="submit" value="Вход">
<input name="client_reg" type="submit" value="Регистрация">
</form>
