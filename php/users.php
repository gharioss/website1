<?php
include_once "db.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/header.php";
if (isset($_REQUEST['register'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $password = password_hash($pwd, PASSWORD_DEFAULT);

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = $db->prepare("SELECT email FROM users WHERE email = :email");
            $sql->bindParam(':email', $email);
            $sql->execute();
            $number = $sql->fetchColumn();
            if ($number > 0) {
                echo "$email - This email already exist!";
            } else {
                $sql1 = $db->prepare("INSERT INTO users (fname, lname, email, password, role)
                                VALUES (:fname, :lname, :email, :password, 'user')");

                $sql1->bindParam(':fname', $fname);
                $sql1->bindParam(':lname', $lname);
                $sql1->bindParam(':email', $email);
                $sql1->bindParam(':password', $password);
                $sql1->execute();
                $id = $db->lastInsertId();
                $_SESSION['IS_LOGGED'] = $id;
                header('Location: ../index.php');
            }
        } else {
            echo "$email - This is not a valid email";
        }
    } else {
        echo "All input field are required!";
    }
}


if (isset($_REQUEST['login'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    if (!empty($email) && !empty($pwd)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql2 = $db->prepare("SELECT * FROM users WHERE email = :email");
            $sql2->bindParam(':email', $email);
            $sql2->execute();
            $user = $sql2->fetchAll();

            if (isset($user[0]) && $user[0]["password"] == password_verify($pwd, $user[0]["password"]) && $user[0]["email"] == $email) {
                $_SESSION['IS_LOGGED'] = $user[0]['id_users'];
                $_SESSION['IS_ADMIN'] = $user[0]['role'];
                header('Location: ../index.php');
            }
        } else {
            echo "$email - This is not a valid email";
        }
    } else {
        echo "All input field are required!";
    }
}

$stmt1 = $db->prepare("SELECT * FROM users");
$stmt1->execute();

if (isset($_REQUEST['userUpdate'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $stmt1 = $db->prepare("UPDATE users SET fname = :fname, lname = :lname, email = :email, role = :role WHERE id_users = $id");
    $stmt1->bindParam(':fname', $fname);
    $stmt1->bindParam(':lname', $lname);
    $stmt1->bindParam(':email', $email);
    $stmt1->bindParam(':role', $role);
    $stmt1->execute();

    header('Location: ../editUsers.php');
}
