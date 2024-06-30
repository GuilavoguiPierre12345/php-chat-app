<?php include_once './header.php'; ?>
     <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <!-- register to chat -->
            <form action="#">
                <div class="error-txt"></div>
                <div class="field input">
                    <label for="">adresse email</label>
                    <input type="email" name="email" placeholder="votre email">
                </div>
                <div class="field input">
                    <label for="">password</label>
                    <input type="password" name="password" placeholder="votre password" autocomplete="off">
                    <i class="bi bi-eye-slash"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continuer a chater">
                </div>
            </form>

            <!-- login to chat -->
            <div class="link">Pas de compte ? <a href="index.php">S'inscrire</a></div>
        </section>
     </div>   

     <script src="javascript/pass-show-hide.js"></script>
     <script src="javascript/login.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>