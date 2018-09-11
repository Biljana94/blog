<?php

//povezivanje na bazu podataka

$servername = "127.0.0.1";//ip adresa servera
$username = "root";
$password = "vivify";
$dbname = "zavrsni_blog";//ime baze iz sqlectrona


//konektovala sam se na bazu podataka sa try catch blokom
try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}

?>