<form method="POST">
������ ������� �������<br><br>
<br>
��� ����������� ������ ������� ��� ����� ����������� �����:<br>
<input name="email" type="text" required><br><br>
�������� ������ ����� ������:<br>
<input name="orderList" type="submit" value="������� ������ ������">
<br><br>
��������� ��� ����� ������:<br>
���� <input name="topic" type="text" ><br>
���������� ������ <input name="message" type="text" ><br>
<input name="sendOrder" type="submit" value="��������� ������">
</form>

<?php
//������ ������� �������
//������������ � �� � �������� ���� � ������������ ������� (����� �������)
include_once("db.php");


//���� ������ ������ "������� ������ ������", ������� ������ �� �����
if(isset($_POST['orderList']))
{

     $sql="SELECT * FROM orders WHERE order_client_email='{$_POST['email']}' ORDER BY order_id ASC";
     $query=mysqli_query($conn,$sql);

     //������� ���� �� ����� ����������� ������ �� �����
     while($row=mysqli_fetch_array($query))
     { 
	$id=$row['order_id'];
	echo "<hr>";
	echo "����� ������:  {$row['order_id']}<br>";
	echo "���� ������:  {$row['order_topic']} <br>";
	echo "���������� ������: {$row['order_body']} <br>";
	echo "������ ������ (0-�� �������/1 - �������):  {$row['order_finished']} <br>";
	echo '<a href=\'client_editOrder.php?id=<?php echo $id ?>\'>�������� ������</a>';
     }

}

//���� ������ ������ "��������� ������", ������ ������ � ��
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
         //���������� ����������� �� ����� ���������
         $to=$manager_email;
         $subject="����� ������";
         $message="��������� ����� ������!";
         mail($to,$subject,$message);
*/
    } 
    else 
    {
       echo "��������� ������ ��������.";
    }
}

?>