<h1>LOGIN</h1>

<div class="form-content login">

    <div class="left untouchable">
        <div class="pull-right">
            <p>Username</p>
            <p>Password</p>
        </div>
    </div>
    <div class="right">
        <form action="?page=login&action=login" method="post" autocomplete="off">
            <input id="user_name" type="text" name="user_name" autofocus required />
            <input type="password" name="user_password" required />
            <input type="submit" value="Login" />
        </form>
    </div>
    <p>Not a member? <a href="?page=register">Register here</a></p>
</div>

