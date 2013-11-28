<h1>LIST OF ALL ARTICLES</h1>

<div class="content">
    <div class="block list">
        <ol>
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
                    <button>Edit</button>
                    <button>Delete</button>
                </span>

            </li><?php endforeach; ?>
        </ol>
    </div>
</div>