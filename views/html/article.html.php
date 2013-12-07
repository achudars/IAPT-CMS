<!-- single article view -->
<div class="content">
    <div class="block article">
        <h2><?php echo $article['article_title']; ?></h2>
        <div class="small-thumb" style="background-image: url(<?php echo $article['article_image']; ?>);"></div>
        <br />
        <small class="pull-left">by
            <?php $article_authors = $this->articlesModel->getArticleAuthors( $article['article_id'] ); ?>
            <?php foreach($article_authors as $author): ?>
                <?php print $author['user_name']; ?> |
            <?php endforeach; ?>
        </small>
        <small class="pull-left">on <?php echo date("G:i l jS", $article['article_timestamp']); ?></small>

        <small class="pull-left">likes: [ <?php echo $likes ?> ]</small>
        <small class="pull-left">dislikes: [ <?php echo $dislikes ?> ]</small>
        
        <?php if( $article['article_type']== "review_article" ) { ?><small class="pull-left">rating: [<?php echo $this->articlesModel->getArticleRating( $article['article_id'] ); ?>]</small><?php } ?>

        <?php if( isset($_SESSION['user_role']) ) { ?>
            <form class="pull-right" action="index.php?show=<?php echo $article['article_id']; ?>&action=dislike" method="post">
                <input type='hidden' name='article_id' value='<?php echo $article['article_id']; ?>' />
                <input type="submit" value="dislike" />
            </form>
            <form class="pull-right" action="index.php?show=<?php echo $article['article_id']; ?>&action=like" method="post">
                <input type='hidden' name='article_id' value='<?php echo $article['article_id']; ?>' />
                <input type="submit" value="like" />
            </form>
        <?php } ?>
        <br /><br />
        <hr>
        <br />
        <p><?php echo $article['article_content']; ?></p>
        <br />
        <hr>
    </div>

	<!-- mock comments -->
    <div class="block article comment">
        <article>
            <a rel='commentator'>John</a> posted @ <time>06-12-2013</time>
            <p>Brilliant!</p>
        </article>
        <article>
            <a rel='commentator'>OriginalityIsMyWeakness</a> posted @ <time>05-12-2013</time>
            <p>Awesome article</p>
        </article>
        <article>
            <a rel='commentator'>Mr St John</a> posted @ <time>04-12-2013</time>
            <p>Best thing since sliced bread</p>
        </article>
        <article>
            <a rel='commentator'>Double Rainbow Guy</a> posted @ <time>04-12-2013</time>
            <p>This is better than double rainbow!</p>
        </article>
        <article>
            <a rel='commentator'>fanatic</a> posted @ <time>03-12-2013</time>
            <p>If i HAD TO READ THIS AGAIN, i WOULD AND i DID.</p>
        </article>
        <article>
            <a rel='commentator'>That guy</a> posted @ <time>02-12-2013</time>
            <p>First!</p>
        </article>
    </div>
</div>