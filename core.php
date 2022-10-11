<?php
session_start();

$database = [
    'host'=>'localhost',
    'dbname'=>'loginregister',
    'user'=>'root',
    'pass'=>''
];
try {
    $db = new PDO("mysql:host={$database['host']};dbname={$database['dbname']}", $database['user'], $database['pass']);
} catch (PDOException $e) {
    exit("An error happend, Error: " . $e->getMessage());
}

function getUser($email,$password): ?array
{
    global $db;

    $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":password",$password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user === false) return  null;
    else return $user;
}

function InsertUser($firstname,$lastname,$email,$password) {
    global $db;

    $sql = "INSERT INTO user  SET firstname= :firstname, lastname= :lastname, email= :email, password= :password";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":firstname",$firstname);
    $stmt->bindParam(":lastname",$lastname);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":password",$password);
    $stmt->execute();
}