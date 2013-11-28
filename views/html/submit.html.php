<h1>SUBMIT AN ARTICLE</h1>

<div class="content">
    <div class="block article-editor">

        <form action="" method="post" autocomplete="off">
            <input type="text" name="title" placeholder="Title" autofocus />
            <br />
            <br />
            <textarea rows="20" name="content" placeholder="Content"></textarea>
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
                    <input checked type = "radio" name = "user_roles" id = "subscriber" value = "subscriber" />
                    <label for = "subscriber">Submitted</label>
                </div>
                <div>
                    <input type = "radio" name = "user_roles" id = "writer" value = "writer" />
                    <label for = "writer">Under review</label>
                </div>
                <div>
                    <input type = "radio" name = "user_roles" id = "editor" value = "editor" />
                    <label for = "editor">Awaiting Changes</label>
                </div>
                <div>
                    <input type = "radio" name = "user_roles" id = "writer" value = "writer" />
                    <label for = "writer">Published</label>
                </div>
                <div>
                    <input type = "radio" name = "user_roles" id = "editor" value = "editor" />
                    <label for = "editor">Rejected</label>
                </div>
            </span>
            <span class="col">

            </span>
            </div>
            <br />
            <br />
            <div class="rating">
                <div>Rating</div>
                <input type="range" name="rating" min="1" max="5" />
            </div>
            <br />
            <div id="tags">
                <span class="tag">PC</span>
                <span class="tag">PS4</span>
                <span class="tag">XBONE</span>
                <input type="text" value="" placeholder="Add a tag" />
            </div>
            <br />
            <div id="authors">
                <span class="tag">ME</span>
                <input type="text" value="" placeholder="Add an author" />
            </div>
            <br />

            <div>
                <input type="checkbox" value="staff_pick" id="staff_pick" />
                <label for = "staff_pick">Mark as Staff Pick</label>
            </div>
            <br />

            <input type="submit" value="SUBMIT" />

            <input type="submit" value="PUBLISH" />

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

    });
</script>