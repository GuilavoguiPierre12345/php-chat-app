<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location:../login.php");
}else {
    include 'config.php';
    $conn = getConnextion();
    $incoming_id = htmlspecialchars($_POST['incoming_id']);
    $outgoing_id = htmlspecialchars($_POST['outgoing_id']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($message)) {
        $sql = "INSERT INTO messages(incoming_msg_id,outgoing_msg_id,msg) 
                                    VALUES(:incoming,:outgoind,:msg)";
        $stm = $conn->prepare($sql);
        $response = $stm->execute([
            ':incoming' => $incoming_id,
            ':outgoind' => $outgoing_id,
            ':msg' => $message
        ]);
        
    }
}