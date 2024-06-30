<?php 
    session_start();
    if (!isset($_SESSION['unique_id'])) {
        header("location:login.php");
    }
?>

<?php include_once './header.php'; ?>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php 
                    require_once('./php/config.php');
                    $conn = getConnextion();
                    $sql = "SELECT * FROM users WHERE unique_id = :unique_id";
                    $stm = $conn->prepare($sql);
                    $response = $stm->execute([':unique_id' => $_SESSION['unique_id']]);
                    if ($stm -> rowCount() > 0) {
                        $user = $stm->fetch(PDO::FETCH_OBJ); 
                    }
                ?>
                <div class="content">
                    <img src="php/images/<?= $user -> img?>" alt="">
                    <div class="details">
                        <span><?= $user -> fname?></span>
                        <p><?= $user -> status?></p>
                    </div>
                </div>
                <a class="logout" href="#">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" name="" placeholder="Entrer le nom de l'utilisateur...">
                <button><i class="bi bi-search"></i></button>
            </div>
            <div class="users-list">
                <!-- Server Side Render -->

            </div>
        </section>
    </div>   
    
    <script src="javascript/users.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>