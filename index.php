<?php
    //  ��� ��������� �������� �� �������. ������ � ��� �������� ������  ������������, ���� �� ��������� �� �����. ����� ����� ��������� �� �  ����� ������ ���������!!!
    session_start();
    ?>
    <html>
    <head>
    <title>Home page</title>
    </head>
    <body>
    <h2>Home page</h2>
    <form action="testreg.php" method="post">

    <!--****  testreg.php - ��� ����� �����������. �� ����, ����� ������� �� ������  "Login", ������ �� ����� ���������� �� ��������� testreg.php �������  "post" ***** -->
 <p>
    <label>Your login:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>


    <!--**** � ��������� ���� (name="login" type="text") ������������ ������ ���� ����� ***** -->
 
    <p>

    <label>Your password:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>

    <!--**** � ���� ��� ������� (name="password" type="password") ������������ ������ ���� ������ ***** --> 

    <p>
    <input type="submit" name="submit" value="Login">

    <!--**** �������� (type="submit") ���������� ������ �� ��������� testreg.php ***** --> 
<br>
 <!--**** ������ �� �����������, ���� ���-�� �� ������ ����� ���� �������� ***** --> 
<a href="reg.php">Registration</a> 
    </p></form>
    <br>
    <?php
    // ���������, ����� �� ���������� ������ � id ������������
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    // ���� �����, �� �� �� ������� ������
    echo "You are logged in as a guest.<br><a href='#'>This link is only available to registered users.</a>";
    }
    else
    {

    // ���� �� �����, �� �� ������� ������
    echo "You are logged in as ".$_SESSION['login']."<br><a  href='http://tvpavlovsk.sk6.ru/'>This link is only available to registered users.</a>";
    }
    ?>
    </body>
    </html>