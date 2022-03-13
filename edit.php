<?php include_once "header.php";
include_once "php/recettes.php";
if (!isset($_SESSION['IS_ADMIN']) || $_SESSION['IS_ADMIN'] != "Admin") {
    header("Location: /index.php");
} ?>
<div class="addRecipe">
    <h1>Modifier cette recette</h1>
</div>
<div class="field button">
    <a href="admin.php">
        <input type="submit" value="retour">
    </a>
</div>
<form method="POST" action="php/recettes.php" enctype='multipart/form-data'>
    <div class="contact-input">
        <?php foreach ($stmt3 as $i) : ?>
            <div class="add-titre">
                <input hidden name="id" value="<?php echo $i['id_recette'] ?>">
                <label for="titre">Titre</label>
                <input name="titre" id="titre" value="<?php echo $i['titre']; ?>" require>
            </div>
            <div class="add-contenu">
                <label for="contenu">Contenu</label>
                <textarea name="contenu" id="contenu" rows="10" require><?php echo $i['content']; ?></textarea>
            </div>
            <div class="field button">
                <input name="editRecipe" type="submit" value="Modifier">
            </div>
        <?php endforeach; ?>
    </div>
</form>


<?php include_once "footer.php"; ?>