<h1>ADMIN DASHBOARD</h1>

<div class="content">
    <div class="block">
        <h2>Most liked</h2>
        <ol>
            <?php foreach($articles as $article): ?><li>

                <h4><a href="article.php?id=<?php echo $article->getTitle(); ?>"><?php echo $article->getTitle(); ?></a></h4>
                <small>posted <?php echo date("l jS", $article->getTimestamp()); ?></small>
                <div class="small-thumb" style="background-image: url(<?php echo $article->getImage(); ?>);"></div>

            </li><?php endforeach; ?>
        </ol>
    </div>
</div>