<?php
if (isset($_POST['Edited'])) {
    session_start();
    include "../initConnection.php";
    $id = $_POST['id'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $money = $_POST['money'];
    $role = $_POST['role'];
    $query = 'UPDATE users SET username="$username", name="$name", money="$money", role="$role" WHERE id="$id"';
    $result = mysqli_query($db, $query);
    if ($result) {
        echo "gg";
    } else if (!$result) {
        echo "ga"
    } else {
        echo "agal lain";
    }
} else {
    die("Access Denied!");
}
?>