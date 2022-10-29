<?php require_once('includes/functions.php'); ?>
<!-- The jQuery plugin used for the sitemap is the same one used in the week 7 tutorial of Web Programming. -->
<!DOCTYPE html>
<html>
<head>
    <title>Adrenaline Buzz Club | Sitemap</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aaron Cartledge">

    <!-- jQuery Sitemap CSS -->
    <link rel="stylesheet" type="text/css" href="style/sitemap.css">

    <!-- jQuery Google CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- jQuery breadcrumbs plugin sourced from Yuusaku Miyazaki's GitHub files: https://github.com/sutara79/jquery.breadcrumbs-generator -->
    <script src="plugins/jquery.breadcrumbs-generator.js"></script>

    <script>
        $(function() {
            $('#breadcrumbs').breadcrumbsGenerator(); 
        });
    </script>
    <style>
    header {
     margin: 0;
     padding: 0;
     text-align: center;
     background-color: #00354e;
    }
    a:link, a:visited {
     color: green;
    }
    article {
        margin: 1% 3%;
    }
    </style>

</head>

<body>
<!-- Header fragment file -->
<?php require_once("includes/header.php"); ?>

    <article>
    <span style="font-size: 18pt;">
    <h1>Breadcrumb Map</h1></span>

    <span style="font-size: 16pt;">
    <ol id="breadcrumbs"></ol></span>
    <br>

    <nav id="sitemaps">
        <h2>Adrenaline Buzz Club Sitemap</h2>
        <span style="font-size: 14pt;">
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="services.php">Services</a>
            </li>
            <li>
                <a href="contact.php">Contact Us</a>
            </li>
            <li>
                <a href="register.php">Register</a>
            </li>
            <li>
                <a href="login.php">Login Page</a>
            </li>
            <li>
                <a href="myFitness.php">myFitness</a>
            </li>
            <li>
                <a href="sitemap.php">Sitemap</a>
            </li>
            
        </ul></span>
    </nav>
</article>
</body>
</html>