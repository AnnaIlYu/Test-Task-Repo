<?php 
if(isset($_POST['client']))
{
?>  
<script>document.location.href="client_start.php"</script>
<?
    exit(); 
 }
else if(isset($_POST['manager']))
{ 
?>
<script>document.location.href="manager_start.php"</script>
<?
  exit(); 
  }
?>


<form method="POST">
Здравствуйте! Для продолжения выберите опцию:<br><br>
<input type="submit" name="client" value="Клиент">
<input type="submit" name="manager" value="Менеджер">
</form>

