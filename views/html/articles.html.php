<div class="content">
    <div class="block">
        <h2>Most liked</h2>
        <ol>
            <?php foreach($basic_articles as $article): ?><li>
                <a href="article.php?id=<?php echo $article->getId(); ?>">
                    <h4><?php echo $article->getTitle(); ?></h4>
                    <small>posted <?php echo date("l jS", $article->getTimestamp()); ?></small>
                    <div class="small-thumb" style="background-image: url(<?php echo $article->getImage(); ?>);"></div>
                </a>
            </li><?php endforeach; ?>
        </ol>
    </div>

    <div class="block">
        <h2>New</h2>
        <ol>
            <?php foreach($column_articles as $article): ?><li>
                <a href="article.php?id=<?php echo $article->getId(); ?>">
                    <h4><?php echo $article->getTitle(); ?></h4>
                    <small>posted <?php echo date("l jS", $article->getTimestamp()); ?></small>
                    <div class="small-thumb" style="background-image: url(<?php echo $article->getImage(); ?>);"></div>
                </a>
            </li><?php endforeach; ?>
        </ol>
    </div>

    <div class="block">
        <h2>Staff picks</h2>
        <ol>
            <?php foreach($review_articles as $article): ?><li>
                <a href="article.php?id=<?php echo $article->getId(); ?>">
                    <h4><?php echo $article->getTitle(); ?></h4>
                    <small>posted <?php echo date("l jS", $article->getTimestamp()); ?></small>
                    <div class="small-thumb" style="background-image: url(<?php echo $article->getImage(); ?>);"></div>
                </a>
            </li><?php endforeach; ?>
        </ol>
    </div>
</div>