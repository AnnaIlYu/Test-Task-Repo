<form method="POST">
Изменить тему: <input name="new_topic" type="text" value="0"><br>
Изменить содержание: <input name="new_message" type="text" value="0"><br>
Закрыть (поставьте 1): <input name="order_finished" type="number" value="0"><br>
<input name="updateOrder" type="submit" value="Внести изменения">
</form>

<?php

include_once("db.php");

$new_topic=$_POST['new_topic'];
$new_message=$_POST['new_message'];
$new_order_finished=$_POST['new_message'];

if(isset($_POST['updateOrder']))
{
    if($new_order_finished==0 && ($new_topic!="0" || $new_message!="0"))
       if($new_topic!="0")
       {
   
         $sql = "UPDATE orders SET order_topic='$new_topic' WHERE order_id={$_GET['id']}";
	 $query=mysqli_query($conn,$sql);
	 if($query) echo "ok";
       }
       else if($new_message!="0")
       {
          $sql = "UPDATE Orders SET order_message='$new_message' WHERE order_id={$_GET['id']}";
 	 $query=mysqli_query($conn,$sql);
       }
    else if($new_order_finished!="0")
    {
          $sql = "UPDATE Orders SET order_finished='$new_order_finished' WHERE order_id={$_GET['id']}";
 	 $query=mysqli_query($conn,$sql);
         //Отправляем уведомление на емейл менеджеру
          $to=$manager_email;
          $subject="Изменения в заявке №".$id;
          $message="Заявка №".$id." отменена";
          mail($to,$subject,$message);
    }
}

?>