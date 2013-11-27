<?php include 'views/header.html.php'; ?>

<div class="container">
    <a href="index.php" id="logo">CMS</a>

    <h4>Delete an article</h4>

    <?php if ( isset($error) ) { ?>
    <small style="color:#aa0000"><?php echo $error; ?></small>
    <?php } ?>

    <form action="delete.php" method="get">
        <select  name="id">
            <?php foreach ($articles as $article) { ?>
            <option value="<?php echo $article['article_id']; ?>">
                <?php echo $article['article_title']; ?>
            </option>
            <?php } ?>
        </select>
        <input type='submit' value='Delete'>
    </form>

</div>

<?php include 'views/footer.html.php'; ?>
