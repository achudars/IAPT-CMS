

<div class="content">
    <div class="block list">
        <ol>
            <?php foreach($articles as $article): ?>
                <?php $article_authors = $this->articlesModel->getAuthors( $article->getArticleId() ); ?>
                <?php
                foreach ($article_authors as $author) {
                    if ( $author["user_name"] == $_SESSION['user_name'] ) {
                ?>
                <li>
                <a href="index.php?show=<?php echo $article->getArticleId(); ?>">
                    <div class="square-thumb" style="background-image: url(<?php echo $article->getArticleImage(); ?>);"></div>
                    <h4>[<?php echo $article->getArticleType(); ?>] <?php echo $article->getArticleTitle(); ?></h4>
                    <small>author(s): [
                        <?php foreach($article_authors as $author): ?>
                            <?php print $author['user_name']; ?> |
                        <?php endforeach; ?>
                        ]
                    </small>&nbsp;
                    <small>date posted: [ <?php echo date("l jS", $article->getArticleTimestamp()); ?> ]</small>
                    <small>likes: [ <?php echo $this->articlesModel->getLikes( $article->getArticleId() ); ?> ]</small>
                    <small>dislikes: [ <?php echo $this->articlesModel->getDislikes( $article->getArticleId() ); ?> ]</small>
                    <small class="dark">
                    <?php echo ($article->getArticleStatus()=='submitted')?'submitted':'' ?>
                    <?php echo ($article->getArticleStatus()=='under_review')?'under review':'' ?>
                    <?php echo ($article->getArticleStatus()=='awaiting_changes')?'awaiting changes':'' ?>
                    <?php echo ($article->getArticleStatus()=='published')?'published':'' ?>
                    <?php echo ($article->getArticleStatus()=='rejected')?'rejected':'' ?>
                    </small>
                    <?php if( $article->getArticleType() == "review_article" ) { ?><small>rating: [<?php echo $this->articlesModel->getArticleRating( $article->getArticleId() ); ?>]</small><?php } ?>
                    <?php if( $article->getStaffPickedArticle() == 1 ) { ?><small>STAFF PICK</small><?php } ?>
                </a>

                <?php if ( $_GET["type"]=="all") { ?>
                <?php if( isset($_SESSION['user_role']) ) {
                    if ( $_SESSION['user_role']=="writer" || $_SESSION['user_role']=="editor" || $_SESSION['user_role']=="publisher" ) { ?>

                    <a class="pull-right" href="?page=edit&id=<?php echo $article->getArticleId(); ?>">
                        <button>edit</button>
                    </a>

                    <form class="pull-right" action="?page=articles&type=all&action=delete_article" method="post">
                        <input type='hidden' name='action' value='delete' />
                        <input type='hidden' name='article_id' value='<?php echo $article->getArticleId(); ?>' />
                        <button onclick="this.form.submit(); return false;">delete</button>
                    </form>



                    <?php } ?>
                    <?php } ?>
                <?php } ?>
            </li>
            <?php } } ?>
        <?php endforeach; ?>
        </ol>
    </div>
</div>