
<?php 
    include "db.php"; 

    //include "posts.php";

    $sql = "SELECT id, title, created_at FROM posts ORDER BY created_at DESC LIMIT 5";//stavila sam limit da mi izlistava samo poslednjih 5 postova(koliko god da ih ima)
    $statement = $connection->prepare($sql);

    //izvrsavanje upita
    $statement->execute();

    //vracamo rezultat kao asocijativni niz
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    //hvatamo rezultat u promenljivu $titles
    $titles = $statement->fetchAll();
?>


<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">

        <h4>Latest posts</h4>

        <?php foreach($titles as $title) { ?>
            <p><a href="single-post.php?id=<?php echo($title['id']); ?>"><?php echo($title['title']); ?></a></p>
        <?php } ?>

    </div>
</aside>


