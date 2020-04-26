<form method="POST">
Здравствуйте, уважаемый Менеджер!<br>
Введите Ваши данные: <br><br>
Логин:  <input name="login" type="text" required><br>
Пароль: <input name="password" type="password" required><br>
<input name="manager_login" type="submit" value="Войти">
</form>

<?php
//Авторизация зарегистрированного менеджера
// Соединямся с БД
include_once("db.php");

if(isset($_POST['manager_login']))
{
   $p=$_POST['password'];
   $l=$_POST['login']; 

//на основании введенного пароля ищем запись в БД, у которой пароль совпал с введенным
   $sql="SELECT manager_password FROM manager";
   $query=mysqli_query($conn, $sql);

   $result=mysqli_fetch_array($query);
   $p1="{$result['manager_password']}";

   if($p1==$p)
   {
?>
	<script>document.location.href="manager_page.php"</script>
<?
       exit();
   }
   else
  {
    print "Введен неверный логин/пароль";
  }

}

?>