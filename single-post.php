<?php include "db.php"; ?>

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

<?php include "header.php"; ?>


<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php
                $post_id=($_GET['id']);//ovde smo dovukli id posta u varijablu $post_id
                //var_dump($post_id);
                //die();
 
                // pripremamo upit
                $sql = "SELECT * FROM posts WHERE id = $post_id";
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

            <!-- ovde sam stavila title,created_at,author i body u singlePost. Kad kliknem na naslov posta da mi otvori taj post -->
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo($singlePost['title']); ?></h2>
                <p class="blog-post-meta"><?php echo($singlePost['created_at']); ?> by <a href="#"><?php echo($singlePost['author']); ?></a></p>
                <p> <?php echo($singlePost['body']); ?> </p>
                <hr>
            </div>


            <!--DELETE POST dugme-->
            <form name="deletePost" action="delete-post.php" method="post">
                <input type="submit" class="btn btn-primary">Delete post</input><br>
                <input type="hidden" name="postId" value=<?php echo($post_id); ?>>
            </form>



            <!--FORMA ZA UNOSENJE KOMENTARA-->
                    <!--otvarajuci <form> tag (kad unesemo podaci se salju u bazu)-->
                        <!--sa ACTION pokrecemo stranicu create-comment.php-->
                        <!--sa ONSUBMIT-kad se klikne dugme 'Submit' kao izlazna vrednost vraca se funkcija commentForm() iz javascript fajla(js/js.js)-->
                        <!--sa METHOD="POST" saljemo podatke na server u bazu podataka pa tek onda iz nje mozemo da iscitavamo podatke-->
            <form name="firstFrom" action="create-comment.php" onsubmit="return commentForm()" method="post">
                    <!-- ono sto stoji u input name='IME_INPUTA' se dodeljuje u $_POST['IME_INPUTA'],
                    primer: <input type="hidden"  name="postId" value=1>   kreira u $_POST  sledece: 
                    $_POST['postId'] = 1 (tj `value` iz inputa); kada odes na sledecu stranu mozes da pristupis $_POST['postId'] i dobijes vrednost koju sadrzi -->

                    <!--labela koja ispisuje 'Your name'-->
                <label for="formName">Your name</label> 
                    <!--input polje u koje unosimo ime autora-->
                <input name="formName" type="text" class="" placeholder="Enter name"><br>
                <small>Your name and comment are public</small><br>

                    <!--labela koja ispisuje 'Enter your name'-->
                <label for="comments">Enter your comment</label><br>
                    <!--textarea polje u koje unosimo nas komentar-->
                <textarea name="comment" class="" rows="5" cols="50"></textarea> <br>
                    <!--input koji je sakriven i koji komentar lepi za id tog posta ($post_id)-->
                <input type="hidden"  name="postId" value=<?php echo($post_id); ?> >

                    <!--input SUBMIT koji je dugme za slanje komentara u bazu podataka (iz baze se salje na stranicu posta)-->
                <input type="submit" class="btn btn-primary"></input><br>

            </form>


            <!--dugme koje ce da sakriva komentare ili da ih pokazuje-->
            <button id="myBtn" type="button" class="btn btn-default">Hide comments</button> 

            <?php include "comments.php";?> 

            <!--UKLJUCILA SAM JAVASCRIPT U OVU STRANICU-->
            <script src='js/js.js'></script>


        </div><!-- /.blog-main -->

        <?php include "sidebar.php";//ubacili smo sidebar u index fajl ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php include "footer.php"; ?>

</body>
</html>
