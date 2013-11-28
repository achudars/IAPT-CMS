<?php

session_start();
     // validation
if (isset($_POST["username"], $_POST["password"])) {

    $username = $_POST["username"];
    $password = md5($_POST['password']);

            //check if submitted fields are non blank
    if ( empty($username) or empty($password) ) {

        $error = "All fields are mandatory.";

    } else {

        $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

        $query->bindValue(1, $username);
        $query->bindValue(2, $password);

        $query->execute();

        $num = $query->rowCount();
        if( $num == 1 ) {
                    // user entered correct details
            $_SESSION["logged_in"] = true;

            header("Location: index.php");
            exit();
        } else {
                    // user entered false details
            $error = "Incorrect details!";
        }
    }
}

        // display login
?>

<h1>LOGIN</h1>

<div class="content">
    <div class="block">
        <div class="left">

        </div>
        <div class="right">
            <?php if ( isset($error) ) { ?>
            <small style="color:#aa0000"><?php echo $error; ?></small>
            <?php } ?>

            <form action="index.php" method="post" autocomplete="off">
                <input type="text" name="username" placeholder="Username" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" value="Login" />
            </form>
        </div>


    </div>
</div>