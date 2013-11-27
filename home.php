<?php include 'views/header.html.php'; ?>

<div class="container">
    <ol>
        <?php foreach( $articles as $article ) { ?>
        <li>
            <a href="article.php?id=<?php echo $article['article_id']?>">
                <?php echo $article['article_title']; ?>
            </a>
            - <small>
            <!-- l = short version of the day, jS = th, nd-->
            posted <?php echo date("l jS", $article["article_timestamp"]); ?>
        </small>
    </li>
    <?php } ?>
</ol>
<br />

<small><a href="admin">ADMIN</a></small>

</div>

<?php include 'views/footer.html.php'; ?>
