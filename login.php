<?php
require "core.php";

if (isset($_POST["submit"], $_POST["email"], $_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email === "" || $password === "") {
        echo "ایمیل یا پسورد را وارد نکرده اید";
    } else {
        $user = getUser($email, $password);
        if ($user !== null) {
            $_SESSION["user"] = $user;
            header("Location: a.php");
            exit();
        } else {
            echo "نام کاربری یا رمز عبور اشتباه است";
        }
    }
}
?>
<form action="" method="post">
    email:<input type="email" name="email"><br>
    password:<input type="password" name="password"><br>
    <input type="submit" name="submit" value="روود">
    <button name="register"><a href="register.php">ثبت نام</a></button>
</form>

