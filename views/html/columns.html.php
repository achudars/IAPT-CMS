<?php $columns = ["PC","PS","XBOX", "MOBILE"]?>
<div class="content">
    <?php foreach ($columns as $key => $column_name) { ?>
    <div class="block column-layout">
        <h2><?php echo $column_name; ?></h2>
        <ol>
            <?php foreach($articles as $article): ?>
                <?php if( $article->getArticleStatus() == "published" && $this->articlesModel->getArticleColumn( $article->getArticleId() ) == $column_name ) { ?>
                <li>
                    <a href="index.php?show=<?php echo $article->getArticleId(); ?>">
                        <h4><?php echo $article->getArticleTitle(); ?></h4>
                        <small>by
                            <?php $article_authors = $this->articlesModel->getAuthors( $article->getArticleId() ); ?>
                            <?php foreach($article_authors as $author): ?>
                                <?php print $author['user_name']; ?> |
                            <?php endforeach; ?>
                        </small>
                        <small>on <?php echo date("l jS", $article->getArticleTimestamp()); ?></small>

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
    <?php } ?>
</div>