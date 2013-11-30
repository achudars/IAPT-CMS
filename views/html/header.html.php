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
        <h1><span class="emphasis">C</span>MS</h1>

        <form action="?page=list&action=search_articles" method="post">
            <input type="search" placeholder="Find articles..." name="search_key" value="" autofocus />
        </form>

    </header>
    <nav>
        <ul class="navlist">
            <li class="active"><a href="?page=articles">Home</a></li>
            <li><a href="?page=register">Register</a></li>
            <li><a href="?page=login">Login</a></li>
            <li><a href="?page=list">List</a></li>
            <li><a href="?page=submit">Submit</a></li>
            <li><a href="?page=check">Check</a></li>
            <li><a href="?page=admin">Admin</a></li>
            <li><a href="?page=tutorial">Tutorial</a></li>
        </ul>
    </nav>
    <main>