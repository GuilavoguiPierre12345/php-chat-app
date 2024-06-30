<?php
session_start();
require_once('./config.php');
$conn = getConnextion();
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

if (!empty($email) && !empty($password)) {
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stm = $conn->prepare($sql);
    $response = $stm->execute([':email' => $email, ':password' => $password]);
    if ($stm -> rowCount() > 0) {
        $user = $stm->fetch(PDO::FETCH_OBJ);
        $_SESSION['unique_id'] = $user->unique_id;
        echo 'success';
    } else {
        echo 'User credentials are invalid';
    }


} else {
    echo 'All input field are required!';
}