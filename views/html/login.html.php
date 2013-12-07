<h1>LOGIN</h1>
<div class="form-content login">
    <div class="left untouchable">
        <div class="pull-right">
            <p>Username</p>
            <p>Password</p>
            <p></p>
            <p>Not a member?</p>
        </div>
    </div>
    <div class="right">
    	<!-- send a request to log in  -->
        <form action="?page=login&action=login" method="post" autocomplete="off">
            <input id="user_name" type="text" name="user_name" autofocus required />
            <input type="password" name="user_password" required />
            <input type="submit" value="Login" />
        </form>
        <!-- suggest registration -->
        <a href="?page=register">Register here</a>
    </div>
</div>

