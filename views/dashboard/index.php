<main>
    <?php echo $this->showMessage() ?>
    <section class="post">
        <form action="<?php echo constant('URL') ?>dashboard/post" method="POST" class="form">
            <div class="form-group">
                <textarea name="post" id="post" placeholder="Escriba lo que piensa aquí"></textarea>
            </div>
            <input type="submit" value="Publicar" class="btn">
        </form>
    </section>
    <section class="section__postwall">
        <?php
$data_post = $this->getData();
foreach ($data_post as $post) {
    ?>
        <article class="postwall" id="<?php echo $post['id'] ?>">
            <p class="postwall__text"><?php echo $post['post'] ?></p>
            <small class="postwall__user"
                id="<?php echo $post['id_user'] ?>">Usuario:<?php echo $post['user'] ?></small>
        </article>
        <?php
}
?>
    </section>
</main>