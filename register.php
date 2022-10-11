<?php
require "core.php";

if (isset($_POST["submit"], $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["password"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = getUser($email, $password);

    if ($user !== null) {
        echo "پسورد یا ایمیل تکراری می باشد";
    } else {
        $reg = InsertUser($firstname, $lastname, $email, $password);
        echo "با موفقیت ثبت شد";
    }
}
?>
<form action="" method="POST">
    firstname: <input type="text" name="firstname"><br>
    lastname: <input type="text" name="lastname"><br>
    email:<input type="email" name="email"><br>
    password:<input type="password" name="password"><br>
    <input type="submit" name="submit" value="ثبت نام">
    <a href="login.php"> بازگشت</a>
</form>
