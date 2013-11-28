<h1>LOGIN</h1>

<div class="form-content login">

    <div class="left untouchable">
        <div class="pull-right">
            <p>Username</p>
            <p>Password</p>
        </div>
    </div>
    <div class="right">
        <?php if ( isset($error) ) { ?>
        <small style="color:#aa0000"><?php echo $error; ?></small>
        <?php } ?>

        <form action="index.php" method="post" autocomplete="off">
            <input id="username" type="text" name="username" autofocus />
            <input type="password" name="password" />
            <input type="submit" value="Login" />
        </form>
    </div>
</div>