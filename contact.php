<?php include_once "header.php"; ?>
<?php include "php/messages.php"; ?>
<form method="POST" action="php/messages.php">
    <div class="contact-input">
        <div class="text">
            <h1>Contact</h1>
        </div>
        <div class="contact-email">
            <label for="email">Email</label>
            <?php if (isset($_SESSION['IS_LOGGED'])) : ?>
                <input name="email" id="email" value="<?php echo $email['email'] ?>" require>
            <?php else : ?>
                <input name="email" id="email" require>
            <?php endif; ?>
        </div>
        <div class="contact-message">
            <label for="message">Message</label>
            <textarea name="message" id="message" rows="10" require></textarea>
        </div>
        <div class="field button">
            <input name="sendMsg" type="submit" value="Envoyer">
        </div>
    </div>
</form>
<?php include_once "footer.php"; ?>