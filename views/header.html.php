<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>IAPT CMS</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link rel="stylesheet" type="text/css" href="public/css/iapt.css" />
    </head>

    <body>
		<!-- @IAPT: Extra div element id with main could be replaced by HTML5 extension spec <main> -->
        <div id ="main">
         <!--@IAPT: HTML5 element header helps add semantic structure the page, telling machines where the top of the page is -->
            <header>

            </header>
            <!--@IAPT: Semantic element nav helps SEO identify key options on the page -->
            <nav>
                <!-- @IAPT: A basic navigation list which is modified by CSS to be horizontal - note the use of the class .navlist -->
                <ul class="navlist">
                    <li><a href="?page=home">Home</a></li>
                    <li><a href="?page=register">Register</a></li>
                    <li><a href="?page=login">Login</a></li>
                    <li><a href="?page=list">List</a></li>
                    <li><a href="?page=submit">Submit</a></li>
                    <li><a href="?page=check">Check</a></li>
                    <li><a href="?page=admin">Admin</a></li>
                </ul>
            </nav>
