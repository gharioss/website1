<?php include_once "header.php"; ?>
<?php include_once "php/comments.php"; ?>
<?php
if (!isset($_SESSION['IS_ADMIN']) || $_SESSION['IS_ADMIN'] != "Admin") {
    header("Location: /index.php");
} ?>
<div class="table">
    <h1>Listes de commentaires non validé.</h1>
    <div class="field button">
        <a href="admin.php">
            <input type="submit" value="retour">
        </a>
    </div>
    <table>
        <tr>
            <th>id</th>
            <th>titre</th>
            <th>email</th>
            <th>comment</th>
            <th>valider ?</th>
        </tr>
        <?php foreach ($sql9 as $i) : ?>
            <tr>
                <td><?php echo $i['id_comments'] ?></td>
                <td><?php echo $i['titre'] ?></td>
                <td><?php echo $i['email'] ?></td>
                <td><?php echo $i['comment'] ?></td>
                <form method="POST" action="php/comments.php">
                    <input hidden name="id" value="<?php echo $i['id_comments'] ?>">
                    <td><input name="btnValid" type="submit" class="btnValid" value="Valider le commentaire"></td>
                </form>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include_once "footer.php"; ?>