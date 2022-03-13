<?php include_once "header.php"; ?>
<?php include "php/db.php"; ?>
<div class="all">
    <div class="wrapper">
        <section class="form signup">
            <header>INSCRIPTION</header>
            <form method="POST" action="php/users.php">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>Prénom</label>
                        <input type="text" name="fname" placeholder="Prénom" required>
                    </div>
                    <div class="field input">
                        <label>Nom</label>
                        <input type="text" name="lname" placeholder="Nom" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Adresse email</label>
                    <input type="text" name="email" placeholder="Entrer votre email" required>
                </div>
                <div class="field input">
                    <label>Mot de passe</label>
                    <input type="password" name="password" placeholder="Entrer votre mot de passe" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input name="register" type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Déjà inscrit? <a href="login.php">Se connecter</a></div>
        </section>
    </div>
</div>
<?php include_once "footer.php"; ?>