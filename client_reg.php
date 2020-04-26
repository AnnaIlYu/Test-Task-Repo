<form method="POST">
Регистрация нового Клиента<br><br>
Здравствуйте!<br>
Введите, пожалуйста, регистрационные данные в поля ниже:<br><br>
Придумайте логин:        <input name="login" type="text" value="0" required><br>
Придумайте пароль:       <input name="password" type="password" value="0" required><br>
Ваш адрес электронной почты: <input name="email" type="email" required><br><br>
<input name="client_reg" type="submit" value="Зарегистрироваться">
</form>

<?php
//Регистрация нового клиента
// Соединямся с БД
include_once("db.php");


//Если была нажата кнопка "Регистрация"
if(isset($_POST['client_reg']))
{
   //проверка длины логина
   if(strlen($_POST['login']) > 30)
   { 
      print "Логин не может быть длиннее 30 символов";
      $error=1;
   }
 
   //проверка на то, существует ли в базе клиент с таким email
   //если да, то перекидываем клиента на страницу входа
   $sql="SELECT client_id FROM clients WHERE client_email='".mysqli_real_escape_string($conn,$_POST['email'])."'";
   $query=mysqli_query($conn, $sql);
   $result=mysqli_num_rows($query);

   if(mysqli_num_rows($query)>0)
   {
?>
<script>document.location.href="client_login.php"</script>
<?
          exit();
   }
   else
   {
     //если логин корректен, добавляем нового клиента в БД clients
     if($error!=1)
     {

    //занесение нового клиента в БД
	$sql="INSERT INTO clients (client_login, client_password, client_email) VALUES ('{$_POST['login']}', '{$_POST['password']}', '{$_POST['email']}')";
        $query=mysqli_query($conn,$sql); 
    if ($query) 
    {
      //Если внесение клиента в БД прошло успешно, перекидываем его на страницу входа
      ?>
<script>document.location.href="client_login.php"</script>
<?
    } 
    else 
    {
      echo '<p>Произошла ошибка: ' . mysqli_error($conn) . '</p>';
    }


      exit();

}}}

?>

