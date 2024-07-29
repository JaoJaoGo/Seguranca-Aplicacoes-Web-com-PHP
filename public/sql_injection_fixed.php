<?php

require_once __DIR__ . '/conn.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";

    $query = $conn->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo "Login successful";
    } else {
        echo "Login failed";
    }
}