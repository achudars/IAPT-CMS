<div class="content">
    <div class="block">
        <h2>Most liked</h2>
        <ol>
            <?php foreach($most_liked_articles as $article): ?><li>
                <a href="index.php?show=<?php echo $article->getArticleId(); ?>">
                    <h4>[<?php echo $article->getArticleType(); ?>] <?php echo $article->getArticleTitle(); ?></h4>
                    <small>by <?php echo "author" ?></small>
                    <small>on <?php echo date("l jS", $article->getArticleTimestamp()); ?></small>

                    <div class="small-thumb" style="background-image: url(<?php echo $article->getArticleImage(); ?>);"></div>
                    <small class="likes-dislikes pull-right">
                        <span class="green">+<?php echo $this->model->getLikes( $article->getArticleId() ); ?></span>
                        /<span class="red">-<?php echo $this->model->getDislikes( $article->getArticleId() ); ?></span>
                    </small>
                </a>
            </li><?php endforeach; ?>
        </ol>
    </div>

    <div class="block">
        <h2>New</h2>
        <ol>
            <?php foreach($newest_articles as $article): ?><li>
                <a href="index.php?show=<?php echo $article->getArticleId(); ?>">
                    <h4>[<?php echo $article->getArticleType(); ?>] <?php echo $article->getArticleTitle(); ?></h4>
                    <small>by <?php echo "author" ?></small>
                    <small>on <?php echo date("l jS", $article->getArticleTimestamp()); ?></small>
                    <div class="small-thumb" style="background-image: url(<?php echo $article->getArticleImage(); ?>);"></div>
                    <small class="likes-dislikes pull-right">
                        <span class="green">+<?php echo $this->model->getLikes( $article->getArticleId() ); ?></span>
                        /<span class="red">-<?php echo $this->model->getDislikes( $article->getArticleId() ); ?></span>
                    </small>
                </a>
            </li><?php endforeach; ?>
        </ol>
    </div>

    <div class="block">
        <h2>Staff picks</h2>
        <ol>
            <?php foreach($staff_picked_articles as $article): ?><li>
                <a href="index.php?show=<?php echo $article->getArticleId(); ?>">
                    <h4>[<?php echo $article->getArticleType(); ?>] <?php echo $article->getArticleTitle(); ?></h4>
                    <small>by <?php echo "author" ?></small>
                    <small>on <?php echo date("l jS", $article->getArticleTimestamp()); ?></small>
                    <div class="small-thumb" style="background-image: url(<?php echo $article->getArticleImage(); ?>);"></div>
                    <small class="likes-dislikes pull-right">
                        <span class="green">+<?php echo $this->model->getLikes( $article->getArticleId() ); ?></span>
                        /<span class="red">-<?php echo $this->model->getDislikes( $article->getArticleId() ); ?></span>
                    </small>
                </a>
            </li><?php endforeach; ?>
        </ol>
    </div>
</div>