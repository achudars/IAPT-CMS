<div class="content">
    <div class="block article">
        <h2><?php echo $article['article_title']; ?></h2>
        <div class="small-thumb" style="background-image: url(<?php echo $article['article_image']; ?>);"></div>
        <br />
        <small class="pull-left">by <?php echo "author"; ?></small>
        <small class="pull-left">on <?php echo date("l jS", $article['article_timestamp']); ?></small>

        <small class="pull-left">likes: </small>
        <small class="pull-left">dislikes: </small>
        <small class="pull-left">tags: </small>

        <form class="pull-right" action="" method="post">
            <input type="submit" value="dislike" />
        </form>
        <form class="pull-right" action="" method="post">
            <input type="submit" value="like" />
        </form>
        <br /><br />
        <hr>
        <br />
        <p><?php echo $article['article_content']; ?></p>
        <br />
        <hr>
    </div>


    <div class="block article comment">
        <article>
            <a rel='author'>John</a> posted @ <time>09-02-2011</time>
            <p>Comment #1</p>
        </article>
        <article>
            <a rel='author'>John</a> posted @ <time>09-02-2011</time>
            <p>Comment #1</p>
        </article>
        <article>
            <a rel='author'>John</a> posted @ <time>09-02-2011</time>
            <p>Comment #1</p>
        </article>
        <article>
            <a rel='author'>John</a> posted @ <time>09-02-2011</time>
            <p>Comment #1</p>
        </article>
        <article>
            <a rel='author'>John</a> posted @ <time>09-02-2011</time>
            <p>Comment #1</p>
        </article>
        <article>
            <a rel='author'>John</a> posted @ <time>09-02-2011</time>
            <p>Comment #1</p>
        </article>
    </div>
</div>