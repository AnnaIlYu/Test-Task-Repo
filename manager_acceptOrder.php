<form method="POST">
Пометить просмотренной (поставьте 1): <input name="new_order_accepted" type="text" value="0"><br>
Пометить завершенной (поставьте 1): <input name="new_order_finished" type="text" value="0" ><br>
Ответить клиенту: <input name="new_order_manager_reply" type="text" value="0" ><br>
<input name="updateOrder" type="submit" value="Внести изменения">
</form>

<?php

include_once("db.php");

$new_order_accepted=$_REQUEST['new_order_accepted'];
$new_order_finished=$_REQUEST['new_order_finished'];
$new_order_manager_reply=$_REQUEST['new_order_manager_reply'];

if(isset($_POST['updateOrder']))
{
   if($new_order_accepted=="0")
   {
         $sql = "UPDATE Orders SET order_accepted='$new_order_accepted' WHERE order_id='$id'";
   }
   else if($new_order_finished=="0")
   {
         $sql = "UPDATE Orders SET order_finished='$new_order_finished' WHERE order_id='$id'";
   }
   else if($new_order_manager_reply!="0")
   {
         $sql = "UPDATE Orders SET order_manager_reply='$new_order_manager_reply' WHERE order_id='$id'";

   //Вытаскиваем из БД емейл клиента, оставившего данную заявку
         $client_email="SELECT order_client_email FROM Orders WHERE order_id='$id'";
         //Отправляем уведомление на емейл клиенту
         $to=$client_email;
         $subject="Ответ менеджера на Вашу заявку №".$id;
         $message=$new_order_manager_reply;
         mail($to,$subject,$message);
   }
}

?>