<?php
while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
    $output .= '
    <a href="chat.php?user_id='.$row->unique_id.'">
        <div class="content">
            <img src="php/images/'.$row ->img.'" alt="">
            <div class="details">
                <span>'.$row ->fname .' '. $row ->lname.'</span>
                <p>This is test message</p>
            </div>
        </div>
        <div class="status-dot"><i class="bi bi-circle-fill"></i></div>
    </a>
';
}