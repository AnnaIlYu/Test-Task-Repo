<form method="POST">
������ ������� ���������<br><br>
<input name="orderList" type="submit" value="������� ��� ������"><br><br>
<input name="orderAccepted" type="submit" value="������ �������� ������"><br><br>
<input name="orderNotAccepted" type="submit" value="������ �� �������� ������"><br><br>
<input name="orderFinished" type="submit" value="������ �������� ������"><br><br>
<input name="orderNotFinished" type="submit" value="������ ���������� ������"><br><br>
<input name="orderReplied" type="submit" value="������ ���������� ������"><br><br>
<input name="orderNotReplied" type="submit" value="������ ������������ ������"><br>
</form>

<?php

include_once("db.php");

switch(true)
{
    case isset($_POST['orderList']):
	echo "������ ���� ������ <br><br>";
        $sql="SELECT * FROM orders ORDER BY order_id ASC";
        $query=mysqli_query($conn,$sql);
  
        //������� ���� �� ����� ����������� ������ �� �����
        while($row=mysqli_fetch_array($query))
        {
	   $id=$row['order_id'];
	   echo "<hr>";
	   echo "����� ������:  {$row['order_id']}<br>";
	   echo "���� ������:  {$row['order_topic']} <br>";
     	   echo "���������� ������: {$row['order_body']} <br>";
     	   echo "������1 ������ (0-�� �����������/1 - �����������): {$row['order_accepted']} <br>";
     	   echo "������2 ������ (0-�� �������/1 - �������): {$row['order_finished']} <br>";
	   echo "����� ���������:  {$row['order_manager_reply']} <br>";
	   echo '<a href=\'manager_acceptOrder.php?id=<?php echo $id ?>\'>������� �� ����������/�������� �������</a>';
        }  
        break;  
    case isset($_POST['orderAccepted']):
	echo "������ ������������� ������ <br><br>";
        $sql="SELECT * FROM orders WHERE order_accepted='1' ORDER BY order_id ASC";
        $query=mysqli_query($conn,$sql);
  
        while($row=mysqli_fetch_array($query))
        {
	   $id=$row['order_id'];
	   echo "<hr>";
	   echo "����� ������:  {$row['order_id']}<br>";
	   echo "���� ������:  {$row['order_topic']} <br>";
     	   echo "���������� ������: {$row['order_body']} <br>";
     	   echo "������1 ������ (0-�� �����������/1 - �����������): {$row['order_accepted']} <br>";
     	   echo "������2 ������ (0-�� �������/1 - �������): {$row['order_finished']} <br>";
	   echo "����� ���������:  {$row['order_manager_reply']} <br>";
	   echo '<a href=\'manager_acceptOrder.php?id=<?php echo $id ?>\'>������� �� ����������/�������� �������</a>';
        }  
	break;
    case isset($_POST['orderNotAccepted']):
	echo "������ ��������������� ������ <br><br>";
        $sql="SELECT * FROM orders WHERE order_accepted='0' ORDER BY order_id ASC";
        $query=mysqli_query($conn,$sql);
  
        while($row=mysqli_fetch_array($query))
        {
	   $id=$row['order_id'];
	   echo "<hr>";
	   echo "����� ������:  {$row['order_id']}<br>";
	   echo "���� ������:  {$row['order_topic']} <br>";
     	   echo "���������� ������: {$row['order_body']} <br>";
     	   echo "������1 ������ (0-�� �����������/1 - �����������): {$row['order_accepted']} <br>";
     	   echo "������2 ������ (0-�� �������/1 - �������): {$row['order_finished']} <br>";
	   echo "����� ���������:  {$row['order_manager_reply']} <br>";
	   echo '<a href=\'manager_acceptOrder.php?id=<?php echo $id ?>\'>������� �� ����������/�������� �������</a>';
        } 
	break;
    case isset($_POST['orderFinished']):
	echo "������ �������� ������<br><br>";
	$sql="SELECT * FROM orders WHERE  order_finished='1' ORDER BY order_id ASC";
        $query=mysqli_query($conn,$sql);
  
        while($row=mysqli_fetch_array($query))
        {
	   echo "<hr>";
	   echo "����� ������:  {$row['order_id']}<br>";
	   echo "���� ������:  {$row['order_topic']} <br>";
     	   echo "���������� ������: {$row['order_body']} <br>";
     	   echo "������2 ������ (0-�� �������/1 - �������): {$row['order_finished']} <br>";
        } 
	break;
    case isset($_POST['orderNotFinished']):
	echo "������ ���������� ������<br><br>";
	$sql="SELECT * FROM orders WHERE  order_finished='0' ORDER BY order_id ASC";
        $query=mysqli_query($conn,$sql);
  
        while($row=mysqli_fetch_array($query))
        {
	   $id=$row['order_id'];
	   echo "<hr>";
	   echo "����� ������:  {$row['order_id']}<br>";
	   echo "���� ������:  {$row['order_topic']} <br>";
     	   echo "���������� ������: {$row['order_body']} <br>";
     	   echo "������1 ������ (0-�� �����������/1 - �����������): {$row['order_accepted']} <br>";
     	   echo "������2 ������ (0-�� �������/1 - �������): {$row['order_finished']} <br>";
	   echo "����� ���������:  {$row['order_manager_reply']} <br>";
	   echo '<a href=\'manager_acceptOrder.php?id=<?php echo $id ?>\'>������� �� ����������/�������� �������</a>';
        } 
	break;
    case isset($_POST['orderReplied']):
	echo "������ ���������� ������<br><br>";
	$sql="SELECT * FROM orders WHERE order_manager_reply!='0' ORDER BY order_id ASC";
        $query=mysqli_query($conn,$sql);
  
        while($row=mysqli_fetch_array($query))
        {
	   $id=$row['order_id'];
	   echo "<hr>";
	   echo "����� ������:  {$row['order_id']}<br>";
	   echo "���� ������:  {$row['order_topic']} <br>";
     	   echo "���������� ������: {$row['order_body']} <br>";
     	   echo "������2 ������ (0-�� �������/1 - �������): {$row['order_finished']} <br>";
	   echo "����� ���������:  {$row['order_manager_reply']} <br>";
	   echo '<a href=\'manager_acceptOrder.php?id=<?php echo $id ?>\'>������� �� ����������/�������� �������</a>';
        } 
	break;
    case isset($_POST['orderNotReplied']):
	echo "������ ������������ ������<br><br>";
	$sql="SELECT * FROM orders WHERE order_manager_reply='0' ORDER BY order_id ASC";
        $query=mysqli_query($conn,$sql);
  
        while($row=mysqli_fetch_array($query))
        {
	   $id=$row['order_id'];
	   echo "<hr>";
	   echo "����� ������:  {$row['order_id']}<br>";
	   echo "���� ������:  {$row['order_topic']} <br>";
     	   echo "���������� ������: {$row['order_body']} <br>";
     	   echo "������1 ������ (0-�� �����������/1 - �����������): {$row['order_accepted']} <br>";
     	   echo "������2 ������ (0-�� �������/1 - �������): {$row['order_finished']} <br>";
	   echo "����� ���������:  {$row['order_manager_reply']} <br>";
	   echo '<a href=\'manager_acceptOrder.php?id=<?php echo $id ?>\'>������� �� ����������/�������� �������</a>';
        } 
	break;
}

?>