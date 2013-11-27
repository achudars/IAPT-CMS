<!-- @IAPT: A div that can be styled if desired for any introductory text.-->
            <div id="intro">
                <!-- @IAPT: This is our first heading in the main section - it is distinct from the top heading of the site, and
                    will be encountered in order by machines that process headings on websites -->
                <h1><?php echo $title; ?></h1>

            </div>







<?php foreach($articles as $article): ?>

        <h3><?php echo $article->getTitle(); ?></h3>
        <h4>Details:</h4>

<?php endforeach; ?>

