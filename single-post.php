<?php
    include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
</head>

<body>

<?php
    include "header.php";//ubacili smo header
?>


<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php
                $post_id=($_GET['id']);//ovde smo dovukli id posta u varijablu $post_id
                //var_dump($post_id);
                //die();
 
                // pripremamo upit
                $sql = 'SELECT * FROM posts WHERE id = ' . $post_id;
                $statement = $connection->prepare($sql);

                // izvrsavamo upit
                $statement->execute();

                // zelimo da se rezultat vrati kao asocijativni niz.
                // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                $statement->setFetchMode(PDO::FETCH_ASSOC);

                // punimo promenjivu sa rezultatom upita
                $singlePost = $statement->fetch();

                // koristite var_dump kada god treba da proverite sadrzaj neke promenjive
                    // echo '<pre>';
                    // var_dump($singlePost);
                    // echo '</pre>';

            ?>

            <!-- ovde sam stavila title,created_at,author i body u singlePost. Kad kliknem na naslov posta da mi otvori jedan post -->
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo($singlePost['title']); ?></h2>
                <p class="blog-post-meta"><?php echo($singlePost['created_at']); ?> by <a href="#"><?php echo($singlePost['author']); ?></a></p>
                <p> <?php echo($singlePost['body']); ?> </p>
                <hr>
            </div>



            <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->

        <?php
            //include "sidebar.php";//ubacili smo sidebar u index fajl
        ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php 
    include "footer.php";//ubacili smo footer
?>

</body>
</html>
