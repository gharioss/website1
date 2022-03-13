<?php include_once "header.php";
if (!isset($_SESSION['IS_ADMIN']) || $_SESSION['IS_ADMIN'] != "Admin") {
    header("Location: /index.php");
} ?>
<div class="addRecipe">
    <h1>Ajouter une recette</h1>
</div>
<div class="field button">
    <a href="admin.php">
        <input type="submit" value="retour">
    </a>
</div>
<form method="POST" action="php/recettes.php" enctype='multipart/form-data'>
    <div class="contact-input">
        <div class="add-titre">
            <label for="titre">Titre</label>
            <input name="titre" id="titre" require>
        </div>
        <div class="add-contenu">
            <label for="contenu">Contenu</label>
            <textarea name="contenu" id="contenu" rows="10" require></textarea>
        </div>
        <div class="add-img">
            <label for="imageRecipe">Image</label>
            <input type="file" name="imageRecipe" id="imageRecipe" require>
        </div>
        <div class="add-category">
            <label for="category">Catégorie:</label>
            <select id="category" name="category">
                <option value="1" selected>Plat</option>
                <option value="2">Pâtisserie</option>
                <option value="3">Apéritif</option>
                <option value="4">dessert</option>
                <option value="5">Entrée</option>
            </select>
        </div>
        <!-- <div class="add-email">
            <label for="email">Auteur(email)</label>

            <input name="email" id="email" require>
        </div> -->
        <div class="field button">
            <input name="addRecipe" type="submit" value="Créer">
        </div>
    </div>
</form>


<?php include_once "footer.php"; ?>