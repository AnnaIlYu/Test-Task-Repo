<form method="POST">
Личный кабинет Клиента<br><br>
<br>
Для продолжения работы введите Ваш адрес электронной почты:<br>
<input name="email" type="text" required><br><br>
Откройте список Ваших заявок:<br>
<input name="orderList" type="submit" value="Открыть список заявок">
<br><br>
Отправьте нам новую заявку:<br>
Тема <input name="topic" type="text" ><br>
Содержание заявки <input name="message" type="text" ><br>
<input name="sendOrder" type="submit" value="Отправить заявку">
</form>

<?php
//Личный кабинет клиента
//Подключаемся к БД и включаем файл с необходимыми данными (емейл клиента)
include_once("db.php");


//Если нажата кнопка "Открыть список заявок", выводим список на экран
if(isset($_POST['orderList']))
{

     $sql="SELECT * FROM orders WHERE order_client_email='{$_POST['email']}' ORDER BY order_id ASC";
     $query=mysqli_query($conn,$sql);

     //Создаем цикл на вывод запрошенных заявок на экран
     while($row=mysqli_fetch_array($query))
     { 
	$id=$row['order_id'];
	echo "<hr>";
	echo "Номер заявки:  {$row['order_id']}<br>";
	echo "Тема заявки:  {$row['order_topic']} <br>";
	echo "Содержание заявки: {$row['order_body']} <br>";
	echo "Статус заявки (0-не закрыта/1 - закрыта):  {$row['order_finished']} <br>";
	echo '<a href=\'client_editOrder.php?id=<?php echo $id ?>\'>Изменить заявку</a>';
     }

}

//Если нажата кнопка "Отправить заявку", вносим заявку в БД
if(isset($_POST['sendOrder']))
{

    $sql="INSERT INTO orders (order_topic,order_body, order_accepted, order_finished, order_manager_reply, order_client_email) VALUES ('{$_POST['topic']}','{$_POST['message']}','0','0','0','{$_POST['email']}')";
    $query=mysqli_query($conn,$sql); 

    if($query) 
    {

       ?>
	   <script>document.location.href="client_page.php"</script>
       <?

/*
         //Отправляем уведомление на емейл менеджеру
         $to=$manager_email;
         $subject="Новая заявка";
         $message="Поступила новая заявка!";
         mail($to,$subject,$message);
*/
    } 
    else 
    {
       echo "Произошла ошибка отправки.";
    }
}

?>