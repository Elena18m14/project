<html>
    <head>
    <title>Registration</title>
    </head>
    <body>
    <h2>Registration</h2>
    <form action="save_user.php" method="post">
    <!--**** save_user.php - ��� ����� �����������.  �� ����, ����� ������� �� ������ "������������������", ������ �� �����  ���������� �� ��������� save_user.php ������� "post" ***** -->
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
    <input type="submit" name="submit" value="Register">
<!--**** �������� (type="submit") ���������� ������ �� ��������� save_user.php ***** --> 
</p></form>
    </body>
    </html>