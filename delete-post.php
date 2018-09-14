<?php

    include "db.php";

    $postId = $_POST['postId'];
var_dump($postId);
    $sql = "DELETE FROM posts WHERE id =" . $postId;

    $statement = $connection->prepare($sql);

    $statement->execute();
    header("Location:index.php");//kad izbrisem post vraca me na stranicu koju sam unela kao lokaciju



?>