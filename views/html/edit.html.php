<!-- content viewable based on the logged user's role -->
<?php if( isset($_SESSION['user_role']) ) {
    if ( $_SESSION['user_role']=="writer" || $_SESSION['user_role']=="editor" || $_SESSION['user_role']=="publisher" ) { ?>
<div class="content">
    <div class="block article-editor">

        <form action="?page=articles&type=all&action=edit_article" method="post" autocomplete="off">
            <input type="text" name="article_title" placeholder="Title" value="<?php echo $article['article_title']; ?>" autofocus required />
            <br />
            <input type="text" name="article_id" placeholder="ID" value="<?php echo $article['article_id']; ?>" readonly />
            <br />

            <textarea rows="20" name="article_content" placeholder="Content" id="article_content" required><?php echo $article['article_content']; ?></textarea>
            <br />
            <div class="word_count"><em>Word count: <span>0 / 2000</span></em></div>
            <br />
            <input type="text" name="article_image" placeholder="Image / Image URL" id="article_image" value="<?php echo $article['article_image']; ?>" required />
            <br />
            <br />
            <div class="content">
                        <span class="col">

                        </span>
                        <span class="col">
                            <div>
                                <input <?php echo ($article["article_type"] == 'basic_article')?'checked':'' ?> type = "radio" name = "article_type" id = "basic_article" value = "basic_article" />
                                <label for = "basic_article">Basic Article</label>
                            </div>
                            <div>
                                <input <?php echo ($article["article_type"] == 'column_article')?'checked':'' ?> type = "radio" name = "article_type" id = "column_article" value = "column_article" />
                                <label for = "column_article">Column Article</label>
                            </div>
                            <div>
                                <input <?php echo ($article["article_type"] == 'review_article')?'checked':'' ?> type = "radio" name = "article_type" id = "review_article" value = "review_article" />
                                <label for = "review_article">Review Article</label>
                            </div>
                        </span>
                        <span class="col columns">
                            <div>
                                <input <?php echo ($this->articlesModel->getArticleColumn( $article['article_id'] ) == 'PC')?'checked':'' ?> type = "radio" name = "column_name" id = "PC" value = "PC" />
                                <label for = "pc">PC</label>
                            </div>
                            <div>
                                <input <?php echo ($this->articlesModel->getArticleColumn( $article['article_id'] ) == 'PS')?'checked':'' ?> type = "radio" name = "column_name" id = "PS" value = "PS" />
                                <label for = "ps">PS</label>
                            </div>
                            <div>
                                <input <?php echo ($this->articlesModel->getArticleColumn( $article['article_id'] ) == 'XBOX')?'checked':'' ?> type = "radio" name = "column_name" id = "XBOX" value = "XBOX" />
                                <label for = "xbox">XBOX</label>
                            </div>
                            <div>
                                <input <?php echo ($this->articlesModel->getArticleColumn( $article['article_id'] ) == 'MOBILE')?'checked':'' ?> type = "radio" name = "column_name" id = "MOBILE" value = "MOBILE" />
                                <label for = "mobile">Mobile</label>
                            </div>
                        </span>
                        <span class="col">
                        <?php if ( $_SESSION['user_role']=="editor" || $_SESSION['user_role']=="publisher" ) { ?>
                            <div>
                                <input <?php echo ($article["article_status"] == 'submitted')?'checked':'' ?> type = "radio" name = "article_status" id = "submitted" value = "submitted" />
                                <label for = "submitted">submitted</label>
                            </div>
                            <div>
                                <input <?php echo ($article["article_status"] == 'under_review')?'checked':'' ?> type = "radio" name = "article_status" id = "under_review" value = "under_review" />
                                <label for = "under_review">under review</label>
                            </div>
                            <div>
                                <input <?php echo ($article["article_status"] == 'awaiting_changes')?'checked':'' ?> type = "radio" name = "article_status" id = "awaiting_changes" value = "awaiting_changes" />
                                <label for = "awaiting_changes">awaiting changes</label>
                            </div>
                            <div>
                                <input <?php echo ($article["article_status"] == 'published')?'checked':'' ?> type = "radio" name = "article_status" id = "published" value = "published" />
                                <label for = "published">published</label>
                            </div>
                            <div>
                                <input <?php echo ($article["article_status"] == 'rejected')?'checked':'' ?> type = "radio" name = "article_status" id = "rejected" value = "rejected" />
                                <label for = "rejected">rejected</label>
                            </div>
                        <?php } ?>
                        </span>
                        <span class="col">

                        </span>
                    </div>
                    <br />
                    <br />
                    <div class="rating">
                        <div>Rating</div>
                        <input type="range" name="article_rating" min="1" max="5" value="<?php echo $this->articlesModel->getArticleRating( $article['article_id'] ); ?>"/>
                    </div>
                    <br />
                    <!-- <div id="tags">
                        <span class="tag">action</span>
                        <span class="tag">adventure</span>
                        <span class="tag">racing</span>
                        <input type="text" placeholder="Add another tag" />
                        <input type='hidden' name='article_tags[]' value='action' />
                        <input type='hidden' name='article_tags[]' value='adventure' />
                        <input type='hidden' name='article_tags[]' value='racing' />
                    </div>
                    <br /> -->
                    <div id="authors">
                        Author(s):
                        <?php foreach($article_authors as $author): ?>
                            <span class="tag"><?php echo $author['user_name']; ?></span>
                        <?php endforeach; ?>
                    </div>
                    <br />

                    <div id="editors">
                        Editors(s) (hold CTRL to select multiple editors):
                        <?php foreach($article_editors as $editor): ?>
                            <span class="tag"><?php echo $editor['user_name']; ?></span>
                        <?php endforeach; ?>
                        <?php if ( $_SESSION['user_role']=="editor" || $_SESSION['user_role']=="publisher" ) { ?>
                            <select size="5" name="article_editors[]" multiple="multiple">
                                <?php foreach($writers_and_editors_and_publishers as $user): ?>
                                    <option <?php echo ( $this->usersModel->getLoggedUserId($_SESSION['user_name'], $_SESSION['user_password']) == $user->getUserId() )?'selected':'' ?> value="<?php echo $user->getUserId(); ?>">
                                        <?php echo "[". $user->getUserId() . "] " . $user->getUserName() ." [". $user->getUserRole() . "]"; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        <?php } ?>
                    </div>
                    <br />
                    <?php if ( $_SESSION['user_role']=="editor" || $_SESSION['user_role']=="publisher" ) { ?>
                    <div>
                        <input <?php echo ($article["article_staff_pick"])?'checked':'' ?> type="checkbox" value="1" name="article_staff_pick" id="article_staff_pick" />
                        <label for = "article_staff_pick">Mark as Staff Pick</label>
                    </div>
                    <br />
                    <?php } ?>
                    <input type="submit" value="DONE" />

                </form>

            </div>
        </div>
    <?php } ?>
<?php } ?>