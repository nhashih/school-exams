<?php
include '../init/initConnection.php';
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
    $username = $_SESSION['username'];

    $query = "SELECT id, username, name, money, role FROM users WHERE username='$username'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if ($user['role'] !== 'admin') {
            header("Location: ../pageUser/Home.php");
            exit();
        }
    } else {
        header("Location: ../pageOnboarding/pageLogin.php?message=loginfailed");
        exit();
    }
} else {
    header("Location: ../pageOnboarding/pageLogin.php?message=loginnothing");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
    <p>Username: <?php echo htmlspecialchars($user['username']); ?></p>
    <p>ID: <?php echo htmlspecialchars($user['id']); ?></p>
    <p>Money: $<?php echo htmlspecialchars($user['money']); ?></p>


    <a href="../init/process/processLogout.php">Logout</a> |
    <a href="./userFetch.php">Fetch User Data</a> |
    <a href="../logout.php">Logout</a>
</body>
</html>
