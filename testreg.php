<?php
    session_start();//  ��� ��������� �������� �� �������. ������ � ��� �������� ������  ������������, ���� �� ��������� �� �����. ����� ����� ��������� �� �  ����� ������ ���������!!!
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //������� ��������� ������������� ����� � ���������� $login, ���� �� ������, �� ���������� ����������
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //������� ��������� ������������� ������ � ���������� $password, ���� �� ������, �� ���������� ����������
if (empty($login) or empty($password)) //���� ������������ �� ���� ����� ��� ������, �� ������ ������ � ������������� ������
    {
    exit ("You have not entered all the information, go back and fill in all the fields!");
    }
    //���� ����� � ������ �������,�� ������������ ��, ����� ���� � ������� �� ��������, ���� �� ��� ���� ����� ������
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
$password = stripslashes($password);
    $password = htmlspecialchars($password);
//������� ������ �������
    $login = trim($login);
    $password = trim($password);
// ������������ � ����
    include ("bd.php");// ���� bd.php ������ ���� � ��� �� �����, ��� � ��� ���������, ���� ��� �� ���, �� ������ �������� ���� 
 
$result =  mysqli_query($db,"SELECT * FROM users WHERE login='$login'"); //��������� �� ���� ��� ������ � ������������ � ��������� �������
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password']))
    {
    //���� ������������ � ��������� ������� �� ����������
    exit ("Sorry, the login or password you entered is incorrect.");
    }
    else {
    //���� ����������, �� ������� ������
    if ($myrow['password']==$password) {
    //���� ������ ���������, �� ��������� ������������ ������! ������ ��� ����������, �� �����!
    $_SESSION['login']=$myrow['login']; 
    $_SESSION['id']=$myrow['id'];//��� ������ ����� ����� ������������, ��� �� � ����� "������ � �����" �������� ������������
    echo "Hi there will be your friends here ";
    $link = mysqli_connect("localhost","root","", "reg2018") or die("Mistake " . mysqli_error($link)); 
    $query ="SELECT login FROM users";
    $result = mysqli_query($link, $query) or die("������ " . mysqli_error($link)); 
    if($result)
   	{
 	   $rows = mysqli_num_rows($result); // ���������� ���������� ����� 
 	   echo "<table><tr><th>Id";
 	   for ($i = 0 ; $i < $rows ; ++$i)
  	  {
   	     $row = mysqli_fetch_row($result);
    	    echo "<tr>";
  	        for ($j = 0 ; $j < 1 ; ++$j) echo "<td>$row[$j]</td>";
    	    echo "</tr>";
	    }
 	   echo "</table>";
     		 mysqli_free_result($result);
		}

   		 }
 else {
    //���� ������ �� �������

    exit ("Sorry, the login or password you entered is incorrect.");
    }
    }
    ?>