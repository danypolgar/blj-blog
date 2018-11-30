<?php include 'models/model.home.php' ?>
<h1 class="form-title">Dani Blog</h1>
<?php include 'views/view.navigation.php' ?>
<br>
     
<?php foreach($allPosts as $post): ?>
    <div class="form-actions">
    <?php
        $post = preg_replace("/(.{80})/mi","$1\n", $post);
        ?>

        <h2><?= htmlspecialchars($post['created_by'], ENT_QUOTES, "UTF-8"); ?></h2>
        <h4><?= htmlspecialchars($post['post_title'], ENT_QUOTES, "UTF-8"); ?></h4>
        <p><?= htmlspecialchars($post['post_text'], ENT_QUOTES, "UTF-8"); ?></p>    
        <p><?= htmlspecialchars($post['created_at'], ENT_QUOTES, "UTF-8"); ?></p>
    </div>
    <div> 
        <?php if(htmlspecialchars($post['post_image'], ENT_QUOTES, "UTF-8") !== ''): ?>
            <img class="post_images" src="<?= htmlspecialchars($post['post_image'], ENT_QUOTES, "UTF-8"); ?>" onError="this.src='ersatzbild.png';" alt="Bild nicht verfügbar" />
        <?php endif; ?>
        <hr>
    </div>
<?php endforeach; ?>