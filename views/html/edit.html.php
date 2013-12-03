<h1>EDIT AN ARTICLE</h1>

<div class="content">
    <div class="block article-editor">

        <form action="?page=edit" method="post" autocomplete="off">
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
                        <input <?php echo ($article['article_type']=='basic_article')?'checked':'' ?> type = "radio" name = "article_type" id = "basic_article" value = "basic_article" />
                        <label for = "basic_article">Basic Article</label>
                    </div>
                    <div>
                        <input <?php echo ($article['article_type']=='column_article')?'checked':'' ?> type = "radio" name = "article_type" id = "column_article" value = "column_article" />
                        <label for = "column_article">Column Article</label>
                    </div>
                    <div>
                        <input <?php echo ($article['article_type']=='review_article')?'checked':'' ?> type = "radio" name = "article_type" id = "review_article" value = "review_article" />
                        <label for = "review_article">Review Article</label>
                    </div>
                </span>
                <span class="col">
                    <div>
                        <input checked type = "radio" name = "columns" id = "column_1" value = "column_1" />
                        <label for = "column_1">Column 1</label>
                    </div>
                    <div>
                        <input type = "radio" name = "columns" id = "column_2" value = "column_2" />
                        <label for = "column_2">Column 2</label>
                    </div>
                    <div>
                        <input type = "radio" name = "columns" id = "column_3" value = "column_3" />
                        <label for = "column_3">Column 3</label>
                    </div>
                    <div>
                        <input type = "radio" name = "columns" id = "column_4" value = "column_4" />
                        <label for = "column_4">Column 4</label>
                    </div>
                </span>
                <span class="col">
                    <div>
                        <input <?php echo ($article['article_status']=='submitted')?'checked':'' ?> type = "radio" name = "article_status" id = "submitted" value = "submitted" />
                        <label for = "submitted">submitted</label>
                    </div>
                    <div>
                        <input <?php echo ($article['article_status']=='under_review')?'checked':'' ?> type = "radio" name = "article_status" id = "under_review" value = "under_review" />
                        <label for = "under_review">under review</label>
                    </div>
                    <div>
                        <input <?php echo ($article['article_status']=='awaiting_changes')?'checked':'' ?> type = "radio" name = "article_status" id = "awaiting_changes" value = "awaiting_changes" />
                        <label for = "awaiting_changes">awaiting changes</label>
                    </div>
                    <div>
                        <input <?php echo ($article['article_status']=='published')?'checked':'' ?> type = "radio" name = "article_status" id = "published" value = "published" />
                        <label for = "published">published</label>
                    </div>
                    <div>
                        <input <?php echo ($article['article_status']=='rejected')?'checked':'' ?> type = "radio" name = "article_status" id = "rejected" value = "rejected" />
                        <label for = "rejected">rejected</label>
                    </div>
                </span>
                <span class="col">

                </span>
            </div>
            <br />
            <br />
            <div class="rating">
                <div>Rating</div>
                <input type="range" name="article_rating" min="1" max="5" value="<?php echo $article['article_rating'] ?>"/>
            </div>
            <br />
            <div id="tags">
                <span class="tag">PC</span>
                <span class="tag">PS4</span>
                <span class="tag">XBONE</span>
                <input type="text" value="<?php $article['article_tags']; ?>" placeholder="Add a tag" />
            </div>
            <br />
            <div id="authors">
                <span class="tag">ME</span>
                <input type="text" value="<?php $article['article_authors']; ?>" placeholder="Add an author" />
            </div>
            <br />

            <div>
                <input type="checkbox" value="staff_pick" id="staff_pick" />
                <label for = "staff_pick">Mark as Staff Pick</label>
            </div>
            <br />
            <input type='hidden' name='article_id' value='<?php echo $article["article_id"]; ?>' />
            <input type="submit" value="DONE" />

        </form>

    </div>
</div>

<script src="http://codeorigin.jquery.com/jquery-2.0.3.min.js"></script>
<script>
    $(function () {

        $('#tags input, #authors input').on('focusout', function () {
            var txt = this.value.replace(/[^a-zA-Z0-9\+\-\.\#]/g, ''); // allowed characters
            if (txt) {
                $(this).before('<span class="tag">' + txt.toLowerCase() + '</span>');
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

    });
</script>