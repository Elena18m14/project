<?php
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //������� ��������� ������������� ����� � ���������� $login, ���� �� ������, �� ���������� ����������
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //������� ��������� ������������� ������ � ���������� $password, ���� �� ������, �� ���������� ����������
 if (empty($login) or empty($password)) //���� ������������ �� ���� ����� ��� ������, �� ������ ������ � ������������� ������
    {
    exit ("You have not entered all the information, go back and fill in all the fields!");
    }
    //���� ����� � ������ �������, �� ������������ ��, ����� ���� � ������� �� ��������, ���� �� ��� ���� ����� ������
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
 $password = stripslashes($password);
    $password = htmlspecialchars($password);
 //������� ������ �������
    $login = trim($login);
    $password = trim($password);
 // ������������ � ����
    include ("bd.php");// ���� bd.php ������ ���� � ��� �� �����, ��� � ��� ���������, ���� ��� �� ���, �� ������ �������� ���� 
 // �������� �� ������������� ������������ � ����� �� �������
    $result = mysqli_query($db,"SELECT id FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Sorry, the login you entered is already registered. Enter another login.");
    }
 // ���� ������ ���, �� ��������� ������
    $result2 = mysqli_query ($db,"INSERT INTO users (login,password) VALUES('$login','$password')");
    // ���������, ���� �� ������
    if ($result2=='TRUE')
    {
    echo "You have successfully registered! Now you can go to the site. <a href='index.php'>Home page</a>";
    }
 else {
    echo "Mistake! You are not registred.
";
    }
    ?>