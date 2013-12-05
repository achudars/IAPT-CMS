<div class="content">
    <div class="block article">
        <h2><?php echo $article['article_title']; ?></h2>
        <div class="small-thumb" style="background-image: url(<?php echo $article['article_image']; ?>);"></div>
        <br />
        <small class="pull-left">by
            <?php $article_authors = $this->articlesModel->getAuthors( $article['article_id'] ); ?>
            <?php foreach($article_authors as $author): ?>
                <?php print $author['user_name']; ?> |
            <?php endforeach; ?>
        </small>
        <small class="pull-left">on <?php echo date("l jS", $article['article_timestamp']); ?></small>

        <small class="pull-left">likes: [ <?php echo $likes ?> ]</small>
        <small class="pull-left">dislikes: [ <?php echo $dislikes ?> ]</small>

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


    <div class="block article comment">
        <article>
            <a rel='commentator'>John</a> posted @ <time>09-02-2011</time>
            <p>Comment #1</p>
        </article>
        <article>
            <a rel='commentator'>John</a> posted @ <time>09-02-2011</time>
            <p>Comment #1</p>
        </article>
        <article>
            <a rel='commentator'>John</a> posted @ <time>09-02-2011</time>
            <p>Comment #1</p>
        </article>
        <article>
            <a rel='commentator'>John</a> posted @ <time>09-02-2011</time>
            <p>Comment #1</p>
        </article>
        <article>
            <a rel='commentator'>John</a> posted @ <time>09-02-2011</time>
            <p>Comment #1</p>
        </article>
        <article>
            <a rel='commentator'>John</a> posted @ <time>09-02-2011</time>
            <p>Comment #1</p>
        </article>
    </div>
</div>