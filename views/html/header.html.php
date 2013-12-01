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
</head>
<body>
    <header>
        <h1><span class="emphasis">C</span>MS for you, <span class="emphasis"><?php echo "USER"; ?></span></h1>

        <form action="?page=articles&action=search_articles" method="post">
            <input type="search" placeholder="Find articles..." name="search_key" value="" autofocus />
        </form>

    </header>
    <nav>
        <ul class="navlist">
            <li class="active"><a href="?page=home">home</a></li>
            <li><a href="?page=register">register</a></li>
            <li><a href="?page=login">login</a></li>
            <li><a href="?page=articles">articles</a></li>
            <li><a href="?page=add">add</a></li>
            <li><a href="?page=users">users</a></li>
            <li><a href="?page=tutorial">tutorial</a></li>
        </ul>
    </nav>
    <main>