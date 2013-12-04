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
                                <input checked type = "radio" name = "article_status" id = "pc" value = "pc" />
                                <label for = "pc">PC</label>
                            </div>
                            <div>
                                <input type = "radio" name = "article_status" id = "ps" value = "ps" />
                                <label for = "ps">PS</label>
                            </div>
                            <div>
                                <input type = "radio" name = "article_status" id = "xbox" value = "xbox" />
                                <label for = "xbox">XBOX</label>
                            </div>
                            <div>
                                <input type = "radio" name = "article_status" id = "mobile" value = "mobile" />
                                <label for = "mobile">Mobile</label>
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
                        <input type="range" name="article_rating" min="1" max="5" value=""/>
                    </div>
                    <br />
                    <div id="tags">
                        <span class="tag">action</span>
                        <span class="tag">adventure</span>
                        <span class="tag">racing</span>
                        <input type="text" placeholder="Add another tag" />
                        <input type='hidden' name='article_tags[]' value='action' />
                        <input type='hidden' name='article_tags[]' value='adventure' />
                        <input type='hidden' name='article_tags[]' value='racing' />
                    </div>
                    <br />
                    <div id="authors">
                        <!-- <select name="users" size="5" name="article_authors[]" multiple="multiple"> -->
                            <!-- <php foreach($writers_and_editors_and_publishers as $user): > -->
                            <!--     <option value="<php echo $user->getUserId(); >"><php echo $user->getUserName() ."[". $user->getUserRole() . "]"; ></option> -->
                            <!-- <php endforeach; > -->

                        <!-- </select> -->
                        <span class="tag"><?php echo $_SESSION['user_name']; ?></span>
                        <input type="text" value="" placeholder="Add another author" />
                        <input type='hidden' name='article_authors[]' value='<?php echo $_SESSION['user_name']; ?>' />
                    </div>
                    <br />
                    <?php if ( $_SESSION['user_role']=="editor" || $_SESSION['user_role']=="publisher" ) { ?>
                    <div>
                        <input type="checkbox" value="article_staff_picked" id="article_staff_picked" />
                        <label for = "article_staff_picked">Mark as Staff Pick</label>
                    </div>
                    <br />
                    <?php } ?>
                    <input type="submit" value="DONE" />

                </form>

            </div>
        </div>
    <?php } ?>
<?php } ?>
<script>
    $(function () {

        $('#tags input').on('focusout', function () {
            var txt = this.value.replace(/[^a-zA-Z0-9\+\-\.\#]/g, ''); // allowed characters
            if (txt) {
                $(this).before('<span class="tag">' + txt.toLowerCase() + '</span>');
                $(this).after("<input type='hidden' name='article_tags[]' value='" + txt + "' />");
            }
            this.value = "";
        }).on('keyup', function (e) {
            // if: comma,enter (delimit more keyCodes with | pipe)
            if (/(188|13)/.test(e.which)) $(this).focusout();
        });

        $('#tags').on('click', '.tag', function () {
            if (confirm("Really delete this tag?")) $(this).remove();
        });


        var maxWords = 2000;
        $('#article_content').keypress(function () {
            var $this, wordcount;
            $this = $(this);
            var words = $this.val().split(/\b[\s,\.-:;]*/);
            wordcount = words.length;
            if (words[wordcount - 1].length === 0) {
                --wordcount;
            }
            if (words[0].length === 0) {
                --wordcount;
            }
            words = null;
            if (wordcount+1 > maxWords) {
                $(".word_count span").text("Word limit reached.");
                return false;
            } else {
                return $(".word_count span").text(wordcount + " / "+ maxWords);
            }
        });

        $('#article_content').change(function () {
            var words = $(this).val().split(/\b[\s,\.-:;]*/);
            var content = $(this).val();
            for (var i = maxWords; i < words.length; ++i) {
                content = trimNonWords(content);
                content = content.substring(0, content.length - words[i].length);
            }
            $(this).val(content);
        });

        function trimNonWords(str) {
            var col = str.length-1;
            while (" ,.-:;".indexOf(str.charAt(col)) >= 0) {
                --col;
            }
            if (col+1 < str.length) {
                return str.substring(0, col+1);
            }
            return str;
        }

        var rating = $(".rating");
        rating.hide();
        var columns = $(".columns");
        columns.hide();

        $("input[name$='article_type']").click(function() {

            if ( $("input[value$='review_article']").is(':checked') ) {
                rating.show();
                columns.hide();
            } else if ( $("input[value$='column_article']").is(':checked') ) {
                rating.hide();
                columns.show();
            } else {
                rating.hide();
                columns.hide();
            }
        });


        var rating = $(".rating");
        rating.hide();
        $("input[name$='article_type']").click(function() {
            if ( $("input[value$='review_article']").is(':checked') ) {
                rating.show();
            } else {
                rating.hide();
            }
        });

    });
</script>