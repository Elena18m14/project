﻿    <html>
    <head>
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv = "content-type" content = "text/html; charset = windows-1251"> 
    </head>
<?php
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("You have not entered all the information, go back and fill in all the fields!");
    }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
$password = stripslashes($password);
    $password = htmlspecialchars($password);
//удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
// подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 
$result =  mysqli_query($db,"SELECT * FROM users WHERE login='$login'"); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password']))
    {
    //если пользователя с введенным логином не существует
    exit ("Sorry, the login or password you entered is incorrect.");
    }
    else {
    //если существует, то сверяем пароли
    if ($myrow['password']==$password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['login']=$myrow['login']; 
    $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
    echo  
	
    	"Hi there will be your friends here";
    	
    $link = mysqli_connect("localhost","root","", "reg2018") or die("Mistake " . mysqli_error($link)); 
    $query ="SELECT login FROM users";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
   	{
 	   $rows = mysqli_num_rows($result); // количество полученных строк 
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
    //если пароли не сошлись

    exit ("Sorry, the login or password you entered is incorrect.");
    }
    }
 ?>
  </html>