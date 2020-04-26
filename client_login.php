<?php
//Авторизация зарегистрированного клиента
// Соединямся с БД
include_once("db.php");

if(isset($_POST['client_login']))
{
   
   $p=$_POST['password'];
//на основании введенного пароля ищем запись в БД, у которой пароль совпал с введенным
   $sql="SELECT * FROM clients WHERE client_password='{$_POST['password']}'";
   $query=mysqli_query($conn, $sql);
    
   $result=mysqli_fetch_array($query);
   $p1="{$result['client_password']}";

   $client_email="{$result['client_email']}"; 

  if($p1==$p)
  {
?>
	<script>document.location.href="client_page.php"</script>
<?
       exit();
   }
   else
  {
    print "Введен неверный логин/пароль";
  }

}

?>

<form method="POST">
Здравствуйте, уважаемый Клиент!<br>
Введите ваши данные:<br><br>
Логин:  <input name="login" type="text" required><br>
Пароль: <input name="password" type="password" required><br>
<input name="client_login" type="submit" value="Войти">
</form>