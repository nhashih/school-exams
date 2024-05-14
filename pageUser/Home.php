<?php
    include '../init/initConnection.php';
    session_start();
    if($_SESSION['status'] == "login") {
        $loggedInUsername = $_SESSION['username'];

        $query = "SELECT id, name, username, money FROM users WHERE username = '$loggedInUsername'";
        $result = mysqli_query($db, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (isset($_POST['work'])) {
                $randomValue = rand(1, 2);
                if ($randomValue == 1) {
                    $earnings = rand(10, 30);
                    $newMoney = $user['money'] + $earnings;
                } else {
                    $expenses = rand(5, 30);
                    $newMoney = $user['money'] - $expenses;
                }
                $userId = $user['id'];
                $updateMoneyQuery = "UPDATE users SET money = $newMoney WHERE id = $userId";
                mysqli_query($db, $updateMoneyQuery);
                header("Location: Home.php");
                exit();
            }
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Home | SMarket </title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>
    <p>Username: <?php echo htmlspecialchars($user['username']); ?></p>
    <p>Money: <?php echo htmlspecialchars($user['money']); ?></p>
    <p>User ID: <?php echo $user['id']; ?></p>
    <form method="POST">
        <button type="submit" name="work">Bekerja</button>
    </form>
    <p>This is the user dashboard.</p>
    <a href="profile.php">Edit Profile</a> | <a href="../init/Process/processLogout.php">Logout</a>
</body>
</html>
<?php
        } else {
            header("Location: ../pageOnboarding/pageLogin.php?message=usernotfound");
            exit();
        }
    } else {
        header("Location: ../pageOnboarding/pageLogin.php?message=loginrequired");
        exit();
    }
?>
