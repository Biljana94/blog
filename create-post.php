<?php
    include "header.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
</head>

<body>
    <main role="main" class="container">


        <!--FORMA ZA UNOSENJE NOVOG POSTA-->
        <form name="newPost" action="create.php" method="post" onsubmit="return createPostRequire()">

            <label for="author">Your name</label>
            <input name="author" placeholder="Enter your name"><br>

            <label for="title">Post title</label>
            <input name="title" placeholder="Enter title"><br>

            <label for="bodyText">Enter your text</label>
            <textarea name="bodyText" row="5" cols="50"></textarea><br>

            <input type="submit" class="btn btn-primary"></input>
        </form>

        <script src="js/js.js"></script>

        <?php
            include "footer.php";
        ?>

    </main> <!--.container-->
</body>
</html>