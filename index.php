<?php include_once './header.php'; ?>
     <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>
            <!-- register to chat -->
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="error-txt">Ceci est un message d'erreur !</div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">prenom</label>
                        <input type="text" name="fname" placeholder="votre prenom" required>
                    </div>
                    <div class="field input">
                        <label for="">nom</label>
                        <input type="text" name="lname" placeholder="votre nom" required>
                    </div>
                </div>
                <div class="field input">
                    <label for="">adresse email</label>
                    <input type="email" name="email" placeholder="votre email" id="">
                </div>
                <div class="field input">
                    <label for="">password</label>
                    <input type="password" name="password" placeholder="votre password" required>
                    <i class="bi bi-eye-slash"></i>
                </div>
                <div class="field image">
                    <label for="">votre avatar</label>
                    <input type="file" name="image" required >
                </div>
                <div class="field button">
                    <input type="submit" value="Continuer a chater">
                </div>
            </form>

            <!-- login to chat -->
            <div class="link">Avez-vous un compte ? <a href="login.php">Login</a></div>
        </section>
     </div>   




     <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
     <script src="javascript/pass-show-hide.js"></script>
     <script src="javascript/signup.js"></script>
</body>
</html>