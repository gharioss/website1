<?php
include_once "db.php";
if (isset($_SESSION['IS_LOGGED'])) {
    $sql3 = $db->prepare("SELECT email FROM users WHERE id_users = $_SESSION[IS_LOGGED]");
    $sql3->execute();
    $email = $sql3->fetch();
}
if (isset($_REQUEST['sendMsg'])) {
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (!empty($email) && !empty($message)) {
        $sql4 = $db->prepare("INSERT INTO messages (email, message) VALUES (:email, :message)");
        $sql4->bindParam(':email', $email);
        $sql4->bindParam(':message', $message);
        $sql4->execute();
    } else {
        echo "Vous devez remplir les inputs";
    }

    header("Location: ../contact.php");
}

$stmt3 = $db->prepare("SELECT * FROM messages ORDER BY id_messages DESC");
$stmt3->execute();
