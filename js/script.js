$(function () {
		
		/*
		 	Word counter function.
		 	If text is there when loaded (case:edit article), then the function will count words,
		 	if the field is empty but text is pasted or typed, the function will count words.
		 	Input will be disabled if limit is reached.
		 	
		 */
        var maxWords = 2000;
        var words = $('#article_content').val().split(/\b[\s,\.-:;]*/);
        var wordcount = words.length;
        $(".word_count span").text(wordcount + " / "+ maxWords);
        
        $('#article_content').on('focusout, keyup',function () {
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
		
		// hides/shows rating and column radio buttons based on article_type
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