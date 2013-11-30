<h1>REGISTER</h1>

<div class="form-content register">

    <div class="left untouchable">
        <div class="pull-right">
            <p>Username</p>
            <p>Password</p>
            <p>Repeat Password</p>
        </div>
    </div>
    <div class="right">
        <?php if ( isset($error) ) { ?>
        <small style="color:#aa0000"><?php echo $error; ?></small>
        <?php } ?>

        <form action="?page=register&action=register_user" method="post" autocomplete="off">
            <input type="text" name="user_name" autofocus required/>
            <input type="password" name="user_password" required />
            <input type="password" name="repeated_user_password" required />
            <input type="submit" value="Register" />
        </form>
    </div>

</div>