<?php
    include_once("../init/initConnection.php");
    session_start();
    if($_SESSION['status']=="login"){
        $logedInUsername = $_SESSION['username'];
        echo "Welcome " . $logedInUsername;
    }
    else {
        header("Location: ../pageOnboarding/pageLogin.php?message=loginnothing");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Fetch User - Admin | SMarket </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .form-width-50 {
            width: 200px;
        }
    </style>
</head>
<body class="">


    <!-- <div class="hello" style="margin-left: 45px;">
        <h1>
            <?php
                if($_SESSION['status']=="login"){
                    $logedInUsername = $_SESSION['username'];
                    echo "Welcome " . $logedInUsername;
                }
                ?>
        </h1>
    </div> -->
    <div class="p-5">
        <table border="1px" class="table table-striped m-1">
            <?php if(isset($_GET['status'])): ?>
                <p>
                    <?php
                    if($_GET['status'] == 'delete_success'){
                        echo "Penghapusan berhasil!>";
                    } else if ($_GET['status'] == 'delete_failed'){
                        echo "Penghapusan Gagal";
                    } else if ($_GET['status'] == 'edit_success'){
                        echo "Pengeditan Berhasil";
                    } else if ($_GET['status'] == 'edit_failed') {
                        echo "Pengeditan Gagal";
                    }
                    else {
                        echo "nothing!";
                    }
                    ?>
            </p>
            <?php endif; ?>
        </thead>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>Balance</th>
            <th>Password</th>
            <th>Role</th>
        </tr>
        <thead>
            <tbody class="">
                <h3>Users</h3>
                <form class="d-flex" role="search" >
                    <input class="form-control me-2 d-inline form-width-50" type="users_search" placeholder="Search By Name" name="prospective_search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" name="">Search</button>
                </form>
                <a class="float-end btn btn-primary d-inline-block" href="pageAdd.php">Tambah Baru</a>
            <?php
                $select = "SELECT * FROM users";
                $query = mysqli_query($db, $select);
                $tablenumber = 1;

                if(isset($_GET['users_search'])){
                    $search = $_GET['users_search'];
                    $query = mysqli_query($db, "SELECT * FROM users WHERE name like '%".$search."%'");
                }   else{
                    $query = mysqli_query($db, "SELECT * FROM users ");
                }


                echo "<p> Total:" . mysqli_num_rows($query) . "</p>";

                while($users = mysqli_fetch_array($query)){
                    echo "<tr>";

                        echo "<td>". $tablenumber++ . "</td>";
                        echo "<td>". $users['id'] . "</td>";
                        echo "<td>". $users['username'] . "</td>";
                        echo "<td>". $users['name'] . "</td>";
                        echo "<td>". $users['money'] . "</td>";
                        echo "<td>". $users['password'] . "</td>";
                        echo "<td>". $users['role'] . "</td>";



                        echo "<td>";
                            echo "<a class='btn btn-primary' role='button' value'Action' name='Edit' href='userEdit.php?id=" . $users['id'] . "'> Edit</a>";
                            echo "<a class='btn btn-danger ms-5' role='button' name='Action' value='Delete' href='.php?id=" . $users['id'] . "'>Hapus</a>";
                        echo "</td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>

</body>
</html>