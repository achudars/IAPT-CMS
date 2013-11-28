<div class="block">
    <h1><?php echo $title; ?></h1>
    <?php foreach($articles as $article): ?>

        <h3><?php echo $article->getTitle(); ?></h3>
        <h4><?php echo $article->getContent(); ?></h4>
        <h3><?php echo $article->getTimestamp(); ?></h3>
        <h3><img src="<?php echo $article->getImage(); ?>"/></h3>
        <h4><?php echo $article->getStatus(); ?></h4>
        <h4><?php echo $article->getType(); ?></h4>

    <?php endforeach; ?>
</div>

<div class="block">
    <h1><?php echo $title; ?></h1>
</div>

<div class="block">
    <h1><?php echo $title; ?></h1>
</div>