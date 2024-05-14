<?php
    global $db;

    $databaseServer = "localhost";
    $databaseUsername = "root";
    $databasePassword = "nashih";
    $databaseName = "nashdb_market";

    $db = mysqli_connect($databaseServer, $databaseUsername, $databasePassword, $databaseName);

    if($db) {
        echo("<br>" . "Manual Debug: " . "Database \"". $databaseName . "\" Terkoneksi tanpa Error. " . "<br>");
    }
    else if (!$db){
        die("<br><br>" . "Database tidak terhubung, karena: <strong>" . mysqli_connect_error()) . "</strong>. ";
    }

    global $ContactNumber;
    $ContactNumber = "<a href='wa.me/+62'> +62851500930044 </a>";

?>