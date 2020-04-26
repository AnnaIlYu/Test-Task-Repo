<form method="POST">
Личный кабинет Менеджера<br><br>
<input name="orderList" type="submit" value="Открыть все заявки"><br><br>
<input name="orderAccepted" type="submit" value="Список принятых заявок"><br><br>
<input name="orderNotAccepted" type="submit" value="Список не принятых заявок"><br><br>
<input name="orderFinished" type="submit" value="Список закрытых заявок"><br><br>
<input name="orderNotFinished" type="submit" value="Список незакрытых заявок"><br><br>
<input name="orderReplied" type="submit" value="Список отвеченных заявок"><br><br>
<input name="orderNotReplied" type="submit" value="Список неотвеченных заявок"><br>
</form>

<?php

include_once("db.php");

switch(true)
{
    case isset($_POST['orderList']):
	echo "Список всех заявок <br><br>";
        $sql="SELECT * FROM orders ORDER BY order_id ASC";
        $query=mysqli_query($conn,$sql);
  
        //Создаем цикл на вывод запрошенных заявок на экран
        while($row=mysqli_fetch_array($query))
        {
	   $id=$row['order_id'];
	   echo "<hr>";
	   echo "Номер заявки:  {$row['order_id']}<br>";
	   echo "Тема заявки:  {$row['order_topic']} <br>";
     	   echo "Содержание заявки: {$row['order_body']} <br>";
     	   echo "Статус1 заявки (0-не просмотрена/1 - просмотрена): {$row['order_accepted']} <br>";
     	   echo "Статус2 заявки (0-не закрыта/1 - закрыта): {$row['order_finished']} <br>";
	   echo "Ответ менеджера:  {$row['order_manager_reply']} <br>";
	   echo '<a href=\'manager_acceptOrder.php?id=<?php echo $id ?>\'>Принять на выполнение/ответить клиенту</a>';
        }  
        break;  
    case isset($_POST['orderAccepted']):
	echo "Список просмотренных заявок <br><br>";
        $sql="SELECT * FROM orders WHERE order_accepted='1' ORDER BY order_id ASC";
        $query=mysqli_query($conn,$sql);
  
        while($row=mysqli_fetch_array($query))
        {
	   $id=$row['order_id'];
	   echo "<hr>";
	   echo "Номер заявки:  {$row['order_id']}<br>";
	   echo "Тема заявки:  {$row['order_topic']} <br>";
     	   echo "Содержание заявки: {$row['order_body']} <br>";
     	   echo "Статус1 заявки (0-не просмотрена/1 - просмотрена): {$row['order_accepted']} <br>";
     	   echo "Статус2 заявки (0-не закрыта/1 - закрыта): {$row['order_finished']} <br>";
	   echo "Ответ менеджера:  {$row['order_manager_reply']} <br>";
	   echo '<a href=\'manager_acceptOrder.php?id=<?php echo $id ?>\'>Принять на выполнение/ответить клиенту</a>';
        }  
	break;
    case isset($_POST['orderNotAccepted']):
	echo "Список непросмотренных заявок <br><br>";
        $sql="SELECT * FROM orders WHERE order_accepted='0' ORDER BY order_id ASC";
        $query=mysqli_query($conn,$sql);
  
        while($row=mysqli_fetch_array($query))
        {
	   $id=$row['order_id'];
	   echo "<hr>";
	   echo "Номер заявки:  {$row['order_id']}<br>";
	   echo "Тема заявки:  {$row['order_topic']} <br>";
     	   echo "Содержание заявки: {$row['order_body']} <br>";
     	   echo "Статус1 заявки (0-не просмотрена/1 - просмотрена): {$row['order_accepted']} <br>";
     	   echo "Статус2 заявки (0-не закрыта/1 - закрыта): {$row['order_finished']} <br>";
	   echo "Ответ менеджера:  {$row['order_manager_reply']} <br>";
	   echo '<a href=\'manager_acceptOrder.php?id=<?php echo $id ?>\'>Принять на выполнение/ответить клиенту</a>';
        } 
	break;
    case isset($_POST['orderFinished']):
	echo "Список закрытых заявок<br><br>";
	$sql="SELECT * FROM orders WHERE  order_finished='1' ORDER BY order_id ASC";
        $query=mysqli_query($conn,$sql);
  
        while($row=mysqli_fetch_array($query))
        {
	   echo "<hr>";
	   echo "Номер заявки:  {$row['order_id']}<br>";
	   echo "Тема заявки:  {$row['order_topic']} <br>";
     	   echo "Содержание заявки: {$row['order_body']} <br>";
     	   echo "Статус2 заявки (0-не закрыта/1 - закрыта): {$row['order_finished']} <br>";
        } 
	break;
    case isset($_POST['orderNotFinished']):
	echo "Список незакрытых заявок<br><br>";
	$sql="SELECT * FROM orders WHERE  order_finished='0' ORDER BY order_id ASC";
        $query=mysqli_query($conn,$sql);
  
        while($row=mysqli_fetch_array($query))
        {
	   $id=$row['order_id'];
	   echo "<hr>";
	   echo "Номер заявки:  {$row['order_id']}<br>";
	   echo "Тема заявки:  {$row['order_topic']} <br>";
     	   echo "Содержание заявки: {$row['order_body']} <br>";
     	   echo "Статус1 заявки (0-не просмотрена/1 - просмотрена): {$row['order_accepted']} <br>";
     	   echo "Статус2 заявки (0-не закрыта/1 - закрыта): {$row['order_finished']} <br>";
	   echo "Ответ менеджера:  {$row['order_manager_reply']} <br>";
	   echo '<a href=\'manager_acceptOrder.php?id=<?php echo $id ?>\'>Принять на выполнение/ответить клиенту</a>';
        } 
	break;
    case isset($_POST['orderReplied']):
	echo "Список отвеченных заявок<br><br>";
	$sql="SELECT * FROM orders WHERE order_manager_reply!='0' ORDER BY order_id ASC";
        $query=mysqli_query($conn,$sql);
  
        while($row=mysqli_fetch_array($query))
        {
	   $id=$row['order_id'];
	   echo "<hr>";
	   echo "Номер заявки:  {$row['order_id']}<br>";
	   echo "Тема заявки:  {$row['order_topic']} <br>";
     	   echo "Содержание заявки: {$row['order_body']} <br>";
     	   echo "Статус2 заявки (0-не закрыта/1 - закрыта): {$row['order_finished']} <br>";
	   echo "Ответ менеджера:  {$row['order_manager_reply']} <br>";
	   echo '<a href=\'manager_acceptOrder.php?id=<?php echo $id ?>\'>Принять на выполнение/ответить клиенту</a>';
        } 
	break;
    case isset($_POST['orderNotReplied']):
	echo "Список неотвеченных заявок<br><br>";
	$sql="SELECT * FROM orders WHERE order_manager_reply='0' ORDER BY order_id ASC";
        $query=mysqli_query($conn,$sql);
  
        while($row=mysqli_fetch_array($query))
        {
	   $id=$row['order_id'];
	   echo "<hr>";
	   echo "Номер заявки:  {$row['order_id']}<br>";
	   echo "Тема заявки:  {$row['order_topic']} <br>";
     	   echo "Содержание заявки: {$row['order_body']} <br>";
     	   echo "Статус1 заявки (0-не просмотрена/1 - просмотрена): {$row['order_accepted']} <br>";
     	   echo "Статус2 заявки (0-не закрыта/1 - закрыта): {$row['order_finished']} <br>";
	   echo "Ответ менеджера:  {$row['order_manager_reply']} <br>";
	   echo '<a href=\'manager_acceptOrder.php?id=<?php echo $id ?>\'>Принять на выполнение/ответить клиенту</a>';
        } 
	break;
}

?>