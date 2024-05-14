<?php
    include_once("../initConnection.php");
    if(isset($_GET['id']) ){
        $id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id=$id";
        $query = mysqli_query($db, $sql);
        if( $query ){
            header('Location: ../../pageAdmin/userFetch.php?status=delete_success');
        } else if (!$query) {
            header('Location: ../../pageAdmin/userFetch.php?status=delete_failed');
            die("Query di Tolak!");
        }
        else {
            die("Akses Query di Tolak!");
        }

    } else {
        die("Akses UserDelete.php Dilarang!");
    }
?>