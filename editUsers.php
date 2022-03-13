<?php include_once "header.php"; ?>
<?php include_once "php/users.php"; ?>
<?php
if (!isset($_SESSION['IS_ADMIN']) || $_SESSION['IS_ADMIN'] != "Admin") {
    header("Location: /index.php");
} ?>
<div class="table">
    <h1>Liste d'utilisateurs.</h1>
    <div class="field button">
        <a href="admin.php">
            <input type="submit" value="retour">
        </a>
    </div>
    <table>
        <tr>
            <th>id</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Modifier role ?</th>
        </tr>
        <?php foreach ($stmt1 as $i) : ?>
            <tr>
                <?php if ($i['role'] == "user") : ?>
                    <form method="POST" action="php/users.php">
                        <td><?php echo $i['id_users'] ?></td>
                        <td><input name="fname" value="<?php echo $i['fname'] ?>"></td>
                        <td><input name="lname" value="<?php echo $i['lname'] ?>"></td>
                        <td><input name="email" value="<?php echo $i['email'] ?>"></td>
                        <td><select name="role">
                                <option value="user" selected><?php echo $i['role']; ?></option>
                                <option value="Admin">Admin</option>
                            </select></td>
                        <input hidden name="id" value="<?php echo $i['id_users']; ?>">
                        <td><input type="submit" name="userUpdate" class="btnUpdate" value="Modifier"></td>
                    </form>
                <?php else : ?>
                    <td><?php echo $i['id_users'] ?></td>
                    <td><?php echo $i['fname'] ?></td>
                    <td><?php echo $i['lname'] ?></td>
                    <td><?php echo $i['email'] ?></td>
                    <td><?php echo $i['role'] ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include_once "footer.php"; ?>