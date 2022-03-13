<?php
include_once "db.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/header.php";

if (isset($_REQUEST['addRecipe'])) {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $category = $_POST['category'];
    $dir = $_SERVER['DOCUMENT_ROOT'] . '/image/';
    $pic_path = $dir . basename($_FILES['imageRecipe']['name']);

    if (!empty($titre) && !empty($contenu) && !empty($category)) {
        if (move_uploaded_file($_FILES['imageRecipe']['tmp_name'], $pic_path)) {
            $img = "image/" . $_FILES['imageRecipe']['name'];
            $sql = $db->prepare("INSERT INTO recettes (titre, content, img, id_category, date, id_users)
                                VALUES (:titre, :content, :image, :id_category, now(), $_SESSION[IS_LOGGED])");
            $sql->bindParam(':titre', $titre);
            $sql->bindParam(':content', $contenu);
            $sql->bindParam(':image', $img);
            $sql->bindParam(':id_category', $category);
            $sql->execute();

            header('Location: ../add_recipe.php');
        } else {

            header('Location: ../add_recipe.php');
        }
    } else {

        header('Location: ../add_recipe.php');
    }
}

$stmt1 = $db->prepare("SELECT recettes.*, users.*, category.*, ifnull(t1.countComment,0) as countComment FROM recettes
                    LEFT JOIN (SELECT comments.id_recette, COUNT(comments.id_recette) as countComment from comments WHERE comments.valided = 1 GROUP BY comments.id_recette) as t1 ON t1.id_recette = recettes.id_recette
                    INNER JOIN users on recettes.id_users = users.id_users
                    INNER JOIN category ON recettes.id_category = category.id_category
                    GROUP BY recettes.id_recette
                    ORDER BY recettes.id_recette DESC");
$stmt1->execute();

if (isset($_SESSION['IS_LOGGED'])) {
    $stmt2 = $db->prepare("SELECT * FROM recettes WHERE id_users = $_SESSION[IS_LOGGED] ORDER BY id_recette DESC LIMIT 1");
    $stmt2->execute();
}
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $stmt3 = $db->prepare("SELECT * FROM recettes
                        LEFT JOIN users ON recettes.id_users = users.id_users
                        LEFT JOIN category ON recettes.id_category = category.id_category
                        WHERE id_recette = $id");
    $stmt3->execute();
    $sql4 = $db->prepare("SELECT COUNT(*) AS 'countC' FROM comments WHERE id_recette = $id AND valided = 1");
    $sql4->execute();
}

$stmt4 = $db->prepare("SELECT * FROM recettes ORDER BY id_recette DESC LIMIT 3");
$stmt4->execute();

if (isset($_REQUEST['editRecipe'])) {
    $id = $_REQUEST['id'];
    $titre = $_POST['titre'];
    $content = $_POST['contenu'];

    $sql7 = $db->prepare("UPDATE recettes SET titre = :titre, content = :content, update_date = now() WHERE id_recette = $id");
    $sql7->bindParam(':titre', $titre);
    $sql7->bindParam(':content', $content);
    $sql7->execute();

    header("Location: ../admin.php");
}
if (isset($_REQUEST['btnDelete'])) {
    $id = $_POST['id'];

    $sql8 = $db->prepare("DELETE FROM recettes WHERE id_recette = $id");
    $sql8->execute();

    header("Location: ../admin.php");
}
