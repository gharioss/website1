<?php include_once "header.php"; ?>

<div class="all">
    <div class="wrapper">
        <section class="form login">
            <header>CONNEXION</header>
            <form method="POST" action="php/users.php">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Adresse email</label>
                    <input type="text" name="email" placeholder="Entrer votre email">
                </div>
                <div class="field input">
                    <label>Mot de passe</label>
                    <input type="password" name="password" placeholder="Entrer votre mot de passe">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input name="login" type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Pas déjà inscrit? <a href="register.php">S'inscrire</a></div>
        </section>
    </div>
</div>
<?php include_once "footer.php"; ?>