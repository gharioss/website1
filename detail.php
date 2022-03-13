<?php include_once "header.php"; ?>
<?php include_once "php/recettes.php"; ?>
<?php include_once "php/comments.php"; ?>

<div class="all-detail">
    <?php foreach ($stmt3 as $i) : ?>
        <div class="carte">
            <div class="carte-ids">
                <i class="fa-solid fa-user"></i>
                <p><?php echo $i['fname'] . " " . $i['lname']; ?> • </p>
                <p><?php echo $i['date']; ?> • </p>
                <p><?php echo $i['category']; ?></p>
            </div>
            <div class="carte-title">
                <h3><?php echo $i['titre']; ?></h3>
            </div>
            <div class="carte-image">
                <img src="<?php echo $i['img']; ?>" alt="Orange" />
            </div>
            <div class="carte-excerpt">
                <p><?php echo $i['content']; ?></p>
            </div>
            <hr class="small2">
            <?php foreach ($sql4 as $i) : ?>
                <div class="comments">
                    <i class="fa-solid fa-message"></i>
                    <p class="number"><?php echo $i['countC'] . " "; ?>Commentaires</p>
                </div>
            <?php endforeach; ?>
            <?php foreach ($sql6 as $i) : ?>
                <div id="commentaires" class="carte-comment">
                    <p>Redigé par <?php echo $i['fname'] . " " . $i['lname']; ?>, le <?php echo $i['date'] ?></p>
                    <p><?php echo $i['comment']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (isset($_SESSION['IS_LOGGED'])) : ?>
            <form action="php/comments.php" method="POST">
                <div class="details-input">
                    <div class="text">
                        <h1>Envoyer un commentaire</h1>
                    </div>
                    <div class="details-message">
                        <input hidden name="id" value="<?php echo $i['id_recette'] ?>">
                        <label for="comment">Commentaire</label>
                        <textarea name="comment" id="comment" rows="10" require></textarea>
                    </div>
                    <div class="field button">
                        <input name="sendComment" type="submit" value="Envoyer un commentaire">
                    </div>
            </form>
        <?php endif; ?>
    <?php endforeach; ?>
    <h1>Recettes récentes</h1>

    <div class="cardIdk">
        <?php foreach ($stmt4 as $i) : ?>
            <div class="card3">
                <div class="card-image2">
                    <img src="<?php echo $i['img']; ?>" alt="Orange" />
                </div>
                <div class="card-body2">
                    <div class="card-title2">
                        <h3><?php echo $i['titre']; ?></h3>
                    </div>
                    <div class="field button">
                        <a href="detail.php?id=<?php echo $i['id_recette'] ?>">
                            <input type="submit" value="Voir plus">
                        </a>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>






<?php include_once "footer.php"; ?>