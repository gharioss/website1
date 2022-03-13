<?php include_once "header.php"; ?>

<div class="intro">
    <section class="section">
        <h2>Bienvenue sur Aventures Gustatives !</h2>
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque odit laborum perferendis expedita veniam sit, sint similique minima quibusdam. Beatae, iure! Quidem magni doloremque omnis illum fugit delectus numquam inventore.
            Veniam debitis nostrum ut laudantium fugiat asperiores perferendis eaque quisquam recusandae animi accusamus nulla doloribus delectus, dignissimos nam! Quis sit distinctio nulla, accusantium repellat illo fugiat ipsum veniam magnam at!
            Reiciendis sapiente beatae sunt ipsa deleniti ad praesentium porro! Consectetur inventore exercitationem aliquam ipsum quidem illo assumenda illum, odit eos deserunt necessitatibus nam, dolor veniam facilis, doloribus corporis! Placeat, repellendus?</p>
    </section>
</div>



<?php include_once "php/recettes.php"; ?>
<div class="contains">
    <div class="next-card">
        <p>Bonjour</p>
        <hr class="small">
        <p class="elements">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis eum in amet, modi odit totam dolor, libero eveniet officia officiis deserunt fuga natus ipsam ipsa.</p>
        <hr>
        <div class="card-icons">
            <ul>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
            </ul>
        </div>
        <hr>
        <h1>Elu meilleur blog culinaire</h1>
        <hr>
        <?php if (isset($stmt2)) : ?>
            <p>Ma dernière recette</p>
            <hr class="small">

            <?php foreach ($stmt2 as $i) : ?>
                <div class="card2">
                    <div class="card-image2">
                        <img src="<?php echo $i['img'] ?>" alt="Orange" />
                    </div>
                    <div class="card-body2">
                        <div class="card-title2">
                            <h3><?php echo $i['titre']; ?></h3>
                        </div>
                        <div class="field button">
                            <a href="detail.php?id=<?php echo $i['id_recette'] ?>">
                                <input type="submit" value="Voir la recette">
                            </a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="recipes">
        <?php foreach ($stmt1 as $i) : ?>
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo $i['img']; ?>" alt="Orange" />
                </div>
                <div class="card-body">
                    <div class="card-ids">
                        <i class="fa-solid fa-user"></i>
                        <p><?php echo $i['fname'] . " " . $i['lname']; ?> • </p>
                        <p><?php echo $i['date']; ?> • </p>
                        <p><?php echo $i['category']; ?></p>
                    </div>
                    <div class="card-title">
                        <h3><?php echo $i['titre']; ?></h3>
                    </div>
                    <div class="card-excerpt">
                        <p><?php echo $i['content']; ?></p>
                    </div>
                    <div class="field button">
                        <a href="detail.php?id=<?php echo $i['id_recette'] ?>">
                            <input type="submit" value="Voir plus">
                        </a>
                    </div>
                    <hr>
                    <div class="comments">
                        <a href="detail.php?id=<?php echo $i['id_recette']; ?>#commentaires">
                            <i class="fa-solid fa-message"></i>
                            <p class="number"><?php echo $i['countComment'] . " " .  "Commentaires"; ?></p>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


</div>








<?php include_once "footer.php"; ?>



</body>

</html>
<!-- <div class="card">
            <div class="card-image">
                <img src="image/pasta.jpg" alt="Orange" />
            </div>
            <div class="card-body">
                <div class="card-ids">
                    <i class="fa-solid fa-user"></i>
                    <p>Maria LOPEZ • </p>
                    <p>Le 23/10/2018 • </p>
                    <p>Plat</p>
                </div>
                <div class="card-title">
                    <h3>Lorem Ipsum</h3>
                </div>
                <div class="card-excerpt">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam voluptatibus autem consectetur voluptate facere at, omnis ab optio placeat officiis! Animi modi harum enim quia veniam consectetur unde autem inventore.</p>
                </div>
                <div class="field button">
                    <input type="submit" value="Voir plus">
                </div>
                <hr>
                <div class="comments">
                    <i class="fa-solid fa-message"></i>
                    <p class="number"><span>0</span> Commentaires</p>
                </div>

            </div> -->