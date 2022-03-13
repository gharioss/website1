<?php include_once "header.php"; ?>
<?php include_once "php/messages.php"; ?>
<?php
if (!isset($_SESSION['IS_ADMIN']) || $_SESSION['IS_ADMIN'] != "Admin") {
    header("Location: /index.php");
} ?>
<div class="table">
    <h1>Listes de messages reçus.</h1>
    <div class="field button">
        <a href="admin.php">
            <input type="submit" value="retour">
        </a>
    </div>
    <table>
        <tr>
            <th>id</th>
            <th>email</th>
            <th>message</th>
        </tr>
        <?php foreach ($stmt3 as $i) : ?>
            <tr>
                <td><?php echo $i['id_messages'] ?></td>
                <td><?php echo $i['email'] ?></td>
                <td><?php echo $i['message'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include_once "footer.php"; ?>