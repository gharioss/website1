<?php include_once "header.php"; ?>
<?php include_once "php/recettes.php"; ?>
<?php
if (!isset($_SESSION['IS_ADMIN']) || $_SESSION['IS_ADMIN'] != "Admin") {
    header("Location: /index.php");
} ?>
<div class="table">
    <h1>Administration</h1>
    <div class="field button">
        <a href="add_recipe.php"><input class="btnAdd" type="submit" value="Ajouter un article"></a>
        <a href="list_msg.php"><input class="listMsg" type="submit" value="Contact"></a>
        <a href="validComment.php"><input class="editCom" type="submit" value="Valider le commentaire"></a>
        <a href="editUsers.php"><input type="submit" value="Utilisateurs"></a>
    </div>
    <table>
        <tr>
            <th>id</th>
            <th>Titre</th>
            <th>Content</th>
            <th>Catégorie</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($stmt1 as $i) : ?>
            <tr>
                <td><?php echo $i['id_recette']; ?></td>
                <td><?php echo $i['titre']; ?></td>
                <td><?php echo $i['content']; ?></td>
                <td><?php echo $i['category']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $i['id_recette'] ?>">
                        <input type="submit" class="btnUpdate" value="Modifier">
                    </a>
                    <form action="php/recettes.php" method="POST">
                        <input hidden name="id" value="<?php echo $i['id_recette'] ?>">
                        <input name="btnDelete" type="submit" class="btnDelete" value="Supprimer">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include_once "footer.php"; ?>