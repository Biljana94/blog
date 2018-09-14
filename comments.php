<?php
    include "db.php";
    //include "delete-comment.php";

    //$post_id=$_GET['id'];//dohvatili smo id posta i stavili u promenljivu $post_id

    // pripremamo upit
    $sql = "SELECT * FROM comments WHERE post_id = $post_id";
    $statement = $connection->prepare($sql);

    // izvrsavamo upit
    $statement->execute();

    // zelimo da se rezultat vrati kao asocijativni niz.
    // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    // punimo promenjivu sa rezultatom upita
    $comments = $statement->fetchAll();

    // echo '<pre>';
    // print_r($comments);
    // echo '</pre>';
?>

<ul id="allComments" class="comments">
    <?php foreach($comments as $comment) { ?>
        <li>created by: <?php echo($comment['author']); ?> <br> <?php echo($comment['text']); ?></li>
        <form name="deleteComment" action="delete-comment.php" method="post">
            <button type="submit" class"btn btn-default">Delete comment</button>
            <input type="hidden" name="postId" value=<?php echo($post_id); ?>>
            <input type="hidden" name="commentId" value=<?php echo $comment['id'] ?>>
        </form><hr>
    <?php }; ?>
</ul>

