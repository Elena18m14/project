<?php
    //  вс€ процедура работает на сесси€х. »менно в ней хран€тс€ данные  пользовател€, пока он находитс€ на сайте. ќчень важно запустить их в  самом начале странички!!!
    session_start();
    ?>
    <html>
    <head>
    <title>Home page</title>
    </head>
    <body>
    <h2>Home page</h2>
    <form action="testreg.php" method="post">

    <!--****  testreg.php - это адрес обработчика. “о есть, после нажати€ на кнопку  "Login", данные из полей отправ€тс€ на страничку testreg.php методом  "post" ***** -->
 <p>
    <label>Your login:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>


    <!--**** ¬ текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
 
    <p>

    <label>Your password:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>

    <!--**** ¬ поле дл€ паролей (name="password" type="password") пользователь вводит свой пароль ***** --> 

    <p>
    <input type="submit" name="submit" value="Login">

    <!--****  нопочка (type="submit") отправл€ет данные на страничку testreg.php ***** --> 
<br>
 <!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** --> 
<a href="reg.php">Registration</a> 
    </p></form>
    <br>
    <?php
    // ѕровер€ем, пусты ли переменные логина и id пользовател€
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    // ≈сли пусты, то мы не выводим ссылку
    echo "You are logged in as a guest.<br><a href='#'>This link is only available to registered users.</a>";
    }
    else
    {

    // ≈сли не пусты, то мы выводим ссылку
    echo "You are logged in as ".$_SESSION['login']."<br><a  href='http://tvpavlovsk.sk6.ru/'>This link is only available to registered users.</a>";
    }
    ?>
    </body>
    </html>