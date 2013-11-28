<div class="content">
    <div class="block">
        <h2><?php echo $article->getId(); ?>"></h2>
        <h4><?php echo $article->getTitle(); ?></h4>
        <small>posted <?php echo date("l jS", $article->getTimestamp()); ?></small>
        <div class="small-thumb" style="background-image: url(<?php echo $article->getImage(); ?>);"></div>
    </div>
</div>