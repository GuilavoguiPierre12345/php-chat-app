<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location:login.php");
}
?>

<?php include_once './header.php'; ?>
<div class="wrapper">
    <section class="chat-area">
        <header>
            <?php
            require_once('./php/config.php');
            $conn = getConnextion();
            $user_id = htmlspecialchars($_GET['user_id']);
            $sql = "SELECT * FROM users WHERE unique_id = :unique_id";
            $stm = $conn->prepare($sql);
            $response = $stm->execute([':unique_id' => $user_id]);
            if ($stm->rowCount() > 0) {
                $user = $stm->fetch(PDO::FETCH_OBJ);
            }
            ?>
            <a href="user.php" class="back-icon"><i class="bi bi-arrow-left"></i></a>
            <img src="php/images/<?= $user -> img ?>" alt="">
            <div class="details">
                <span><?= $user->fname ?></span>
                <p><?= $user->status ?></p>
            </div>
        </header>
        <div class="chat-box">
            
        </div>
        <form action="#" class="typing-area" autocomplete="off">
            <input type="text" name="outgoing_id" value="<?= $_SESSION['unique_id'] ?>" hidden>
            <input type="text" name="incoming_id" value="<?= $user_id ?>" hidden>
            <input type="text" name="message" class="input-field" placeholder="Ecrire votre message ici..." id="">
            <button><i class="bi bi-telegram"></i></button>
        </form>
    </section>
</div>




<script defer src="javascript/chat.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>