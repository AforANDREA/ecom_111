<?php
if (isset($_POST['btnLogin'])) //login request
{
    $email =  $_POST['email']; //it is name attribute value of form contract
    $password = $_POST['password'];
    $hashcode = "$2y$10\$jnZGZmoV06lXbWi.l19h2e5fTKWeI1ts5qPf2nVto1LY3pFF/ld6u";
    if (password_verify($password, $hashcode))  //plain text, hashcode
    {
        echo "login success";
    } else {
        echo "login fail";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container-fluid"></div>
    <div class="row">
        <?php
        require_once "navigation.php";
        ?>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="login.php" class="form mt-5" method="post">
                <fieldset>
                    <legend>Admin Login</legend>
                    <div class="mb-1">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2" name="btnLogin">
                        Login
                    </button>
                </fieldset>
            </form>
        </div>
    </div>

</body>

</html>