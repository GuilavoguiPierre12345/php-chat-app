<?php
include_once "config.php";
$conn = getConnextion();
$searchTerm = htmlspecialchars($_POST['searchTerm']);

$sql = "SELECT * FROM users WHERE fname LIKE '%". $searchTerm ."%' OR lname LIKE '%". $searchTerm ."%'";
$stm = $conn->prepare($sql);
$stm->execute();
$output = '';
if ($stm->rowCount() > 0) {
    include 'data.php';
} else {
    $output .= 'No user found related to your search term';
}
echo $output;
