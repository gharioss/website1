<?php include_once "db.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/header.php";


if (isset($_REQUEST['sendComment'])) {
    $id = $_POST['id'];
    $comment = $_POST['comment'];

    if (!empty($comment)) {
        $sql5 = $db->prepare("INSERT INTO comments (comment, date, id_users, id_recette)
                        VALUES (:content, now(), $_SESSION[IS_LOGGED], :id_recette)");
        $sql5->bindParam(':content', $comment);
        $sql5->bindParam(':id_recette', $id);
        $sql5->execute();

        header("Location: ../detail.php?id=$id");
    }
}
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $sql6 = $db->prepare("SELECT * FROM comments
                        LEFT JOIN users ON comments.id_users = users.id_users
                        WHERE id_recette = $id AND valided = 1
                        ORDER BY id_comments DESC");
    $sql6->execute();
}
$sql9 = $db->prepare("SELECT * FROM comments
                    LEFT JOIN users ON comments.id_users = users.id_users 
                    LEFT JOIN recettes ON comments.id_recette = recettes.id_recette 
                    WHERE valided = 0 ORDER BY id_comments DESC");
$sql9->execute();

if (isset($_REQUEST['btnValid'])) {
    $id = $_REQUEST['id'];

    $sql10 = $db->prepare("UPDATE comments SET valided = 1 WHERE id_comments = $id");
    $sql10->execute();

    header("Location: ../validComment.php");
}
