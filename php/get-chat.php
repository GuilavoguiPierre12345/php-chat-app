<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location:../login.php");
}else {
    include 'config.php';
    $conn = getConnextion();
    $incoming_id = htmlspecialchars($_POST['incoming_id']);
    $outgoing_id = htmlspecialchars($_POST['outgoing_id']);
    $output = '';
    $sql = "SELECT * FROM messages WHERE (outgoing_msg_id = :outgoing_id AND incoming_msg_id = :incoming_id)
        OR (outgoing_msg_id = :incoming_id AND incoming_msg_id = :outgoing_id)
        ORDER BY msg_id ASC";
    $stm = $conn->prepare($sql);
    $stm->execute([
        ':incoming_id' => $incoming_id,
        ':outgoing_id' => $outgoing_id,
        ':incoming_id' => $outgoing_id,
        ':outgoing_id' => $incoming_id
    ]);
    if ($stm->rowCount() > 0) {
        while($row = $stm->fetch(\PDO::FETCH_OBJ)) {
            if ($row ->outgoing_msg_id == $outgoing_id) {
                $output .= '
                <div class="chat outgoing">
                    <div class="details">
                        <p>'.$row -> msg.'</p>
                    </div>
                </div>
                ';
            } else {
                $output .= '
                    <div class="chat incoming">
                        <img src="img.png" alt="">
                        <div class="details">
                            <p>'.$row -> msg.'</p>
                        </div>
                    </div>
                ';
            }
        }
        echo $output;
    }
}