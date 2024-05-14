<?php
session_start();
include_once("../initConnection.php");

if (isset($_POST['register'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST["password"];
    $passwordConfirm = $_POST['passwordConfirm'];

    if ($password === $passwordConfirm) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, name, password, money, role) VALUES ('$username', '$name', '$hashedPassword', '0', 'user')";
        $result = mysqli_query($db, $query);
        if ($result) {
            header("Location: ../../pageOnboarding/pageLogin.php?message=registersuccess");
            exit();
        } else {
            echo "Manual Debug: Query Error";
        }
    } else {
        die("Manual Debug: Password dan Password Confirm Berbeda!");
    }
} elseif (isset($_POST['login'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        // Debugging:
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
        // echo "Password dari form: " . htmlspecialchars($password) . "<br>";
        // echo "Panjang password dari form: " . strlen($password) . "<br>";
        // echo "Password hash dari database: " . htmlspecialchars($user['password']) . "<br>";
        // echo "Panjang hash dari database: " . strlen($user['password']) . "<br>";

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";
            if ($user['role'] === 'admin') {
                header("Location: ../../pageAdmin/Home.php");
                exit();
            } elseif ($user['role'] === 'user') {
                header("Location: ../../pageUser/Home.php");
                exit();
            } else {
                die("Role Tidak Terdefinisi!");
            }
        } else {
            echo "Password salah";
            header("Location: ../../pageOnboarding/pageLogin.php?message=loginfailed");
            exit();
        }
    } else {
        header("Location: ../../pageOnboarding/pageLogin.php?message=loginfailed");
        exit();
    }
} else {
    die("Access Denied!");
}
?>
