<?php include_once "header.php"; ?>
<?php include_once "php/recettes.php"; ?>
<div class="contains2">
    <div class="recipes">
        <?php foreach ($stmt1 as $i) : ?>
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo $i['img'] ?>" alt="Orange" />
                </div>
                <div class="card-body">
                    <div class="card-ids">
                        <i class="fa-solid fa-user"></i>
                        <p><?php echo $i['id_users'] ?> • </p>
                        <p><?php echo $i['date'] ?> • </p>
                        <p><?php echo $i['id_category'] ?></p>
                    </div>
                    <div class="card-title">
                        <h3><?php echo $i['titre'] ?></h3>
                    </div>
                    <div class="card-excerpt">
                        <p><?php echo $i['content'] ?></p>
                    </div>
                    <div class="field button">
                        <a href="detail.php?id=<?php echo $i['id_recette'] ?>">
                            <input type="submit" value="Voir plus">
                        </a>
                    </div>
                    <hr>
                    <div class="comments">
                        <i class="fa-solid fa-message"></i>
                        <p class="number"><span>0</span> Commentaires</p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include_once "footer.php"; ?>