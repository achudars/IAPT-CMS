<h1>SUBMIT AN ARTICLE</h1>

<div class="content">
    <div class="block">

        <form action="add.php" method="post" autocomplete="off">
            <input type="text" name="title" placeholder="Title" />
            <br />
            <br />
            <textarea name="content" placeholder="Content"></textarea>
            <br />
            <br />

            <span class="left-col">
                <div>
                    <input type = "radio" name = "user_roles" id = "subscriber" value = "subscriber" />
                    <label for = "subscriber">Subscriber</label>
                </div>
                <div>
                    <input type = "radio" name = "user_roles" id = "writer" value = "writer" />
                    <label for = "writer">Writer</label>
                </div>
                <div>
                    <input type = "radio" name = "user_roles" id = "editor" value = "editor" />
                    <label for = "editor">Editor</label>
                </div>
            </span>
            <span class="mid-col">
                <div>
                    <input type = "radio" name = "user_roles" id = "subscriber" value = "subscriber" />
                    <label for = "subscriber">Subscriber</label>
                </div>
                <div>
                    <input type = "radio" name = "user_roles" id = "writer" value = "writer" />
                    <label for = "writer">Writer</label>
                </div>
                <div>
                    <input type = "radio" name = "user_roles" id = "editor" value = "editor" />
                    <label for = "editor">Editor</label>
                </div>
                <div>
                    <input type = "radio" name = "user_roles" id = "editor" value = "editor" />
                    <label for = "editor">Editor</label>
                </div>
            </span>
            <span class="right-col">
                <div>
                    <input type = "radio" name = "user_roles" id = "subscriber" value = "subscriber" />
                    <label for = "subscriber">Subscriber</label>
                </div>
                <div>
                    <input type = "radio" name = "user_roles" id = "writer" value = "writer" />
                    <label for = "writer">Writer</label>
                </div>
                <div>
                    <input type = "radio" name = "user_roles" id = "editor" value = "editor" />
                    <label for = "editor">Editor</label>
                </div>
                <div>
                    <input type = "radio" name = "user_roles" id = "writer" value = "writer" />
                    <label for = "writer">Writer</label>
                </div>
                <div>
                    <input type = "radio" name = "user_roles" id = "editor" value = "editor" />
                    <label for = "editor">Editor</label>
                </div>
            </span>

            <div class="rating">
                Points: 1
                <input type="range" name="rating" min="1" max="5">5
                <input type="rate">
            </div>

            <div id="tags">
                <span class="tag">PC</span>
                <span class="tag">PS4</span>
                <span class="tag">XBONE</span>
                <input type="text" value="" placeholder="Add a tag" />
            </div>

            <div id="authors">
                <span class="tag">ME</span>
                <input type="text" value="" placeholder="Add an author" />
            </div>

            <input type="checkbox" placeholder="mark as staff pick" />

            <input type="submit" value="SUBMIT" />
            <input type="submit" value="PUBLISH" />
            <input type="submit" value="REJECT" />
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