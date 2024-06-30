<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location:login.php");
}
require_once('config.php');
$conn = getConnextion();
$output = '';
$sql = "SELECT * FROM users WHERE unique_id <> :unique_id";
$stm = $conn->prepare($sql);
$stm->execute([':unique_id' => $_SESSION['unique_id']]);
if ($stm->rowCount() === 0) { // il est la seule personne en ligne
    $output .= 'No users are available to chat';
} else if ($stm->rowCount() > 0) {
    include 'data.php';
}
echo $output;
