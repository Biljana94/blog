<?php

    include "db.php";

    $postId = $_POST['postId'];
    $commentId = $_POST['commentId'];

    $sql = "DELETE FROM comments WHERE id = {$commentId} and post_id = {$postId};";

    $statement = $connection->prepare($sql);

    $statement->execute();
    header("Location:single-post.php?id={$postId}");
?>