<?php
    include_once("../init/initConnection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | SMarket </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/styleOnboarding.css">
    <script>
        function validate(){

            var password = document.getElementById("password").value;
            var passwordConfirm = document.getElementById("passwordConfirm").value;
            if (password!=passwordConfirm) {
               alert("Password dan Confirm Password tidak Sesuai!");
               return false;
            }
        }
    </script>
</head>
<body>
    <section class="formContainer">
        <div class="formWrapper">
            <div class="formItem" >
                <h1>Register</h1>
                <form action="../init/process/processOnboarding.php" method="POST" onSubmit="return validate();">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="passwordConfirm" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm">
                </div>
                <div class="mb-3">
                    <label class="form-text">Sudah Punya Akun? <a href="pageLogin.php">Login</a></label>
                </div>
                <div class="mb-3">
                    <button type="submit" name="register" value="register" class="btn btn-primary">Register</button>
                </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>