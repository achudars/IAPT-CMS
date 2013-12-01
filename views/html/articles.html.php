

<div class="content">
    <div class="block list">
        <ol>
            <li>
                <h1>LIST OF ARTICLES</h1>
            </li>
            <?php foreach($articles as $article): ?><li>
                <a href="index.php?id=<?php echo $article->getId(); ?>">
                    <div class="square-thumb" style="background-image: url(<?php echo $article->getImage(); ?>);"></div>
                    <h4><?php echo $article->getTitle(); ?></h4>
                    <small>posted <?php echo date("l jS", $article->getTimestamp()); ?></small>
                    <small>author</small>
                    <small>number of comments</small>
                    <small>number of likes</small>
                    <small>number of dislikes</small>
                    <small>tags</small>
                </a>
                <span class="pull-right">
                    <label>STATUS: </label>
                    <select>
                        <option>Published</option>
                        <option>Rejected</option>
                        <option>Under Review</option>
                        <option>Awaiting Changes</option>
                        <option>Submitted</option>
                    </select>


                </span>
                <form class="pull-right" action="?page=admin&action=change_article_status" method="post">
                    <input type='hidden' name='article_id' value='<?php echo $article->getArticleId(); ?>' />
                    <select onchange="this.form.submit();" name="article_status">
                        <option <?php echo ($article->getArticleStatus()=='submitted')?'selected':'' ?> value="submitted" name='submitted'>submitted</option>
                        <option <?php echo ($article->getArticleStatus()=='under_review')?'selected':'' ?> value="under_review" name='under_review'>under_review</option>
                        <option <?php echo ($article->getArticleStatus()=='awaiting_changes')?'selected':'' ?> value="awaiting_changes" name='awaiting_changes'>awaiting_changes</option>
                        <option <?php echo ($article->getArticleStatus()=='published')?'selected':'' ?> value="published" name='published'>published</option>
                        <option <?php echo ($article->getArticleStatus()=='rejected')?'selected':'' ?> value="rejected" name='rejected'>rejected</option>
                    </select>
                </form>
                <form class="pull-right" action="?page=admin&action=edit_article" method="post">
                    <input type='hidden' name='action' value='delete' />
                    <input type='hidden' name='article_id' value='<?php echo $article->getArticleId(); ?>' />
                    <button onclick="this.form.submit(); return false;">edit</button>
                </form>
                <form class="pull-right" action="?page=admin&action=delete_article" method="post">
                    <input type='hidden' name='action' value='delete' />
                    <input type='hidden' name='article_id' value='<?php echo $article->getArticleId(); ?>' />
                    <button onclick="this.form.submit(); return false;">delete</button>
                </form>

            </li><?php endforeach; ?>
        </ol>
    </div>
</div>