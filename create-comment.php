<?php

    //OVDE SALJEMO PODATKE KOJI SU UNETI KAO KOMENTAR U BAZU PODATAKA
            //REDIREKCIJOM IH OUTPUTUJEMO NA single-post.php (poslednja linija koda)

    include "db.php";

    $postId = $_POST['postId'];//kad se posalje komentar na dugme SUBMIT uzimamo post_id (id tog posta koji je komentarisan)


    $formName = $_POST['formName'];//kad se klikne na dugme SUBMIT uzimamo ime autora komentara (<input name="formName" type="text" class="" placeholder="Enter name"><br>)
    $comment = $_POST['comment'];//kad se klikne na dugme SUBMIT uzimamo tekst komentara (<textarea name="comment" class="" rows="5" cols="50"></textarea>)




    $sql="INSERT INTO comments (author, text, post_id) VALUES ('$formName', '$comment', '$postId')";//u bazu podataka ubacujemo autora, tekst komentara i id tog posta koji je komentarisan($postId)
    $statement = $connection->prepare($sql);//pripremamo upit za bazu podataka
    $statement->execute();//izvrsavamo upit, tj povezujemo se na bazu
    header("Location: single-post.php?id=" . $postId);//pozivanje redirekcijom (komentare koji ce biti upisani u bazu podataka saljemo na single-post.php)
                                                            //redirekcija se pise: header("Location: putanja na single-post.php stranicu i uzimamo id svakog posta(id=$postId));
                                                                //pre ovog poziva ne sme da stoji nikakav output (echo) i HTML
?>