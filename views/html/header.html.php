<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- I am against ugly default fonts, hence resorting to Lato -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
    <script src="http://codeorigin.jquery.com/jquery-2.0.3.min.js"></script>
</head>
<body>
    <header>
        <h1>
            <span class="emphasis">C</span>MS
            <?php if( (isset($_SESSION['user_name']) && isset($_SESSION['user_password'])) ) { ?>
                for you, <span class="emphasis"><?php echo $_SESSION["user_name"]; ?></span>
            <?php } ?>
        </h1>

        <form action="?page=articles&action=search_articles" method="post">
            <input type="search" placeholder="Find articles..." name="search_key" value="" autofocus />
        </form>

        <span id="session">
            <?php if( !(isset($_SESSION['user_name']) && isset($_SESSION['user_password'])) ) { ?>
            <span><a href="?page=register">register</a></span>
            <span><a href="?page=login">login</a></span>
            <?php } else { ?>
            <form action="?page=login&action=logout" method="post" autocomplete="off">
                <input type="submit" value="Logout" />
            </form>
            <?php } ?>
        </span>

    </header>
    <nav>
        <ul class="navlist">
        <?php
                $url = "$_SERVER[REQUEST_URI]";
                $parts = parse_url($url);
                parse_str($parts['query'], $query);
                $home =  ( $query['page'] == 'home') ? 'class="active"' : '';
                $articles =  ( $query['page'] == 'articles') ? 'class="active"' : '';
                $add =  ( $query['page'] == 'add') ? 'class="active"' : '';
                $users =  ( $query['page'] == 'users') ? 'class="active"' : '';
                $tutorial =  ( $query['page'] == 'tutorial') ? 'class="active"' : '';

            ?>
            <li <?php echo $home ?>     ><a href="?page=home">home</a></li>
            <li <?php echo $articles ?> ><a href="?page=articles">articles</a></li>
            <li <?php echo $add ?>      ><a href="?page=add">add</a></li>
            <li <?php echo $users ?>    ><a href="?page=users">users</a></li>
            <li <?php echo $tutorial ?> ><a href="?page=tutorial">tutorial</a></li>

        </ul>

    </nav>
    <main>