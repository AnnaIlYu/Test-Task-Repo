<form method="POST">
�������� ������������� (��������� 1): <input name="new_order_accepted" type="text" value="0"><br>
�������� ����������� (��������� 1): <input name="new_order_finished" type="text" value="0" ><br>
�������� �������: <input name="new_order_manager_reply" type="text" value="0" ><br>
<input name="updateOrder" type="submit" value="������ ���������">
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

   //����������� �� �� ����� �������, ����������� ������ ������
         $client_email="SELECT order_client_email FROM Orders WHERE order_id='$id'";
         //���������� ����������� �� ����� �������
         $to=$client_email;
         $subject="����� ��������� �� ���� ������ �".$id;
         $message=$new_order_manager_reply;
         mail($to,$subject,$message);
   }
}

?>