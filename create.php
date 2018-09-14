<?php

    //kreiranje posta

    include "db.php";

    //$formName = $_POST['newPost'];

    $author = $_POST['author'];//saljem ime autora u db
    $title = $_POST['title'];
    $bodyText = $_POST['bodyText'];

    //var_dump();


    $sql="INSERT INTO posts (author, title, body) VALUES ('$author', '$title', '$bodyText')";
    $statement = $connection->prepare($sql);
    $statement->execute();

    header("Location: index.php");





?>