<div class="content">
    <div class="block">
        <h2>Most liked</h2>
        <ol>
            <?php foreach($basic_articles as $article): ?><li>
                <a href="index.php?id=<?php echo $article->getArticleId(); ?>">
                    <h4><?php echo $article->getArticleTitle(); ?></h4>
                    <small>posted <?php echo date("l jS", $article->getArticleTimestamp()); ?></small>
                    <div class="small-thumb" style="background-image: url(<?php echo $article->getArticleImage(); ?>);"></div>
                </a>
            </li><?php endforeach; ?>
        </ol>
    </div>

    <div class="block">
        <h2>New</h2>
        <ol>
            <?php foreach($column_articles as $article): ?><li>
                <a href="index.php?id=<?php echo $article->getArticleId(); ?>">
                    <h4><?php echo $article->getArticleTitle(); ?></h4>
                    <small>posted <?php echo date("l jS", $article->getArticleTimestamp()); ?></small>
                    <div class="small-thumb" style="background-image: url(<?php echo $article->getArticleImage(); ?>);"></div>
                </a>
            </li><?php endforeach; ?>
        </ol>
    </div>

    <div class="block">
        <h2>Staff picks</h2>
        <ol>
            <?php foreach($review_articles as $article): ?><li>
                <a href="index.php?id=<?php echo $article->getArticleId(); ?>">
                    <h4><?php echo $article->getArticleTitle(); ?></h4>
                    <small>posted <?php echo date("l jS", $article->getArticleTimestamp()); ?></small>
                    <div class="small-thumb" style="background-image: url(<?php echo $article->getArticleImage(); ?>);"></div>
                </a>
            </li><?php endforeach; ?>
        </ol>
    </div>
</div>