<!-- home page -->
<div class="content">
    <div class="block">
        <h2>Most liked</h2>
        <ol>
            <?php foreach($most_liked_articles as $article): ?>
                <?php if( $article->getArticleStatus() == "published") { ?>
                <li>
                <a href="index.php?show=<?php echo $article->getArticleId(); ?>">
                    <h4>
                    	<?php if ($article->getArticleType() == "review_article") {
                    			echo "<small class='bubble'>review</small>";
                    		  } else if ($article->getArticleType() == "basic_article") {
                    			echo "<small class='bubble'>article</small>";
                    		  } else if ($article->getArticleType() == "column_article") {
                    			echo "<small class='bubble'>column</small>";
                    		  }
                    	?>
                    	<?php echo $article->getArticleTitle(); ?>
                    </h4>
                    <small>by
                        <?php $article_authors = $this->articlesModel->getArticleAuthors( $article->getArticleId() ); ?>
                        <?php foreach($article_authors as $author): ?>
                            <?php print $author['user_name']; ?> |
                        <?php endforeach; ?>
                    </small>
                    <small>on <?php echo date("G:i l jS", $article->getArticleTimestamp()); ?></small>

                    <div class="small-thumb" style="background-image: url(<?php echo $article->getArticleImage(); ?>);"></div>
                    <small class="likes-dislikes pull-right">
                        <span class="green">+<?php echo $this->articlesModel->getLikes( $article->getArticleId() ); ?></span>
                        /<span class="red">-<?php echo $this->articlesModel->getDislikes( $article->getArticleId() ); ?></span>
                    </small>
                </a>
            </li>
        <?php } ?>
    <?php endforeach; ?>
        </ol>
    </div>

    <div class="block">
        <h2>New</h2>
        <ol>
            <?php foreach($newest_articles as $article): ?>
                <?php if( $article->getArticleStatus() == "published") { ?>
                <li>
                <a href="index.php?show=<?php echo $article->getArticleId(); ?>">
                    <h4>
                    	<?php if ($article->getArticleType() == "review_article") {
                    			echo "<small class='bubble'>review</small>";
                    		  } else if ($article->getArticleType() == "basic_article") {
                    			echo "<small class='bubble'>article</small>";
                    		  } else if ($article->getArticleType() == "column_article") {
                    			echo "<small class='bubble'>column</small>";
                    		  }
                    	?>
                    	<?php echo $article->getArticleTitle(); ?>
                    </h4>
                    <small>by
                        <?php $article_authors = $this->articlesModel->getArticleAuthors( $article->getArticleId() ); ?>
                        <?php foreach($article_authors as $author): ?>
                            <?php print $author['user_name']; ?> |
                        <?php endforeach; ?>
                    </small>
                    <small>on <?php echo date("G:i l jS", $article->getArticleTimestamp()); ?></small>
                    <div class="small-thumb" style="background-image: url(<?php echo $article->getArticleImage(); ?>);"></div>
                    <small class="likes-dislikes pull-right">
                        <span class="green">+<?php echo $this->articlesModel->getLikes( $article->getArticleId() ); ?></span>
                        /<span class="red">-<?php echo $this->articlesModel->getDislikes( $article->getArticleId() ); ?></span>
                    </small>
                </a>
                </li>
                <?php } ?>
            <?php endforeach; ?>
        </ol>
    </div>

    <div class="block">
        <h2>Staff picks</h2>
        <ol>
            <?php foreach($staff_picked_articles as $article): ?>
                <?php if( $article->getArticleStatus() == "published") { ?>
                <li>
                <a href="index.php?show=<?php echo $article->getArticleId(); ?>">
                    <h4>
                    	<?php if ($article->getArticleType() == "review_article") {
                    			echo "<small class='bubble'>review</small>";
                    		  } else if ($article->getArticleType() == "basic_article") {
                    			echo "<small class='bubble'>article</small>";
                    		  } else if ($article->getArticleType() == "column_article") {
                    			echo "<small class='bubble'>column</small>";
                    		  }
                    	?>
                    	<?php echo $article->getArticleTitle(); ?>
                    </h4>
                    <small>by
                        <?php $article_authors = $this->articlesModel->getArticleAuthors( $article->getArticleId() ); ?>
                        <?php foreach($article_authors as $author): ?>
                            <?php print $author['user_name']; ?> |
                        <?php endforeach; ?>
                    </small>
                    <small>on <?php echo date("G:i l jS", $article->getArticleTimestamp()); ?></small>
                    <div class="small-thumb" style="background-image: url(<?php echo $article->getArticleImage(); ?>);"></div>
                    <small class="likes-dislikes pull-right">
                        <span class="green">+<?php echo $this->articlesModel->getLikes( $article->getArticleId() ); ?></span>
                        /<span class="red">-<?php echo $this->articlesModel->getDislikes( $article->getArticleId() ); ?></span>
                    </small>
                </a>
            </li>
        <?php } ?>
    <?php endforeach; ?>
        </ol>
    </div>
</div>