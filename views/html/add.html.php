<!-- content visible only to writers, editors and publishers -->
<?php if( isset($_SESSION['user_role']) ) {
    if ( $_SESSION['user_role']=="writer" || $_SESSION['user_role']=="editor" || $_SESSION['user_role']=="publisher" ) { ?>
        <div class="content">
            <div class="block article-editor">

                <form action="?page=add&action=add_article" method="post" autocomplete="off">
                    <input type="text" name="article_title" placeholder="Title" autofocus required />
                    <br />
                    <br />
                    <textarea rows="20" name="article_content" placeholder="Content" id="article_content" required></textarea>
                    <br />
                    <div class="word_count"><em>Word count: <span>0 / 2000</span></em></div>
                    <br />
                    <input type="text" name="article_image" placeholder="Image / Image URL" id="article_image" required />
                    <br />
                    <br />
                    <div class="content">
                        <span class="col">

                        </span>
                        <span class="col">
                            <div>
                                <input checked type = "radio" name = "article_type" id = "basic_article" value = "basic_article" />
                                <label for = "basic_article">Basic Article</label>
                            </div>
                            <div>
                                <input type = "radio" name = "article_type" id = "column_article" value = "column_article" />
                                <label for = "column_article">Column Article</label>
                            </div>
                            <div>
                                <input type = "radio" name = "article_type" id = "review_article" value = "review_article" />
                                <label for = "review_article">Review Article</label>
                            </div>
                        </span>
                        <span class="col columns">
                            <div>
                                <input checked type = "radio" name = "column_name" id = "PC" value = "PC" />
                                <label for = "PC">PC</label>
                            </div>
                            <div>
                                <input type = "radio" name = "column_name" id = "PS" value = "PS" />
                                <label for = "PS">PS</label>
                            </div>
                            <div>
                                <input type = "radio" name = "column_name" id = "XBOX" value = "XBOX" />
                                <label for = "XBOX">XBOX</label>
                            </div>
                            <div>
                                <input type = "radio" name = "column_name" id = "MOBILE" value = "MOBILE" />
                                <label for = "MOBILE">Mobile</label>
                            </div>
                        </span>
                        <span class="col">
                        <?php if ( $_SESSION['user_role']=="editor" || $_SESSION['user_role']=="publisher" ) { ?>
                            <div>
                                <input checked type = "radio" name = "article_status" id = "submitted" value = "submitted" />
                                <label for = "submitted">submitted</label>
                            </div>
                            <div>
                                <input type = "radio" name = "article_status" id = "under_review" value = "under_review" />
                                <label for = "under_review">under review</label>
                            </div>
                            <div>
                                <input type = "radio" name = "article_status" id = "awaiting_changes" value = "awaiting_changes" />
                                <label for = "awaiting_changes">awaiting changes</label>
                            </div>
                            <div>
                                <input type = "radio" name = "article_status" id = "published" value = "published" />
                                <label for = "published">published</label>
                            </div>
                            <div>
                                <input type = "radio" name = "article_status" id = "rejected" value = "rejected" />
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
                        <input type="range" name="article_rating" min="1" max="5" />
                    </div>
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
                        Author(s) (hold CTRL to select multiple authors):
                        <select size="5" name="article_authors[]" multiple="multiple">
                            <?php foreach($writers_and_editors_and_publishers as $user): ?>
                                <option <?php echo ( $this->usersModel->getLoggedUserId($_SESSION['user_name'], $_SESSION['user_password']) == $user->getUserId() )?'selected':'' ?> value="<?php echo $user->getUserId(); ?>">
                                    <?php echo "[". $user->getUserId() . "] " . $user->getUserName() ." [". $user->getUserRole() . "]"; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br />
                    <?php if ( $_SESSION['user_role']=="editor" || $_SESSION['user_role']=="publisher" ) { ?>
                    <div>
                        <input type="checkbox" value="0" name="article_staff_pick" id="article_staff_pick" />
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
