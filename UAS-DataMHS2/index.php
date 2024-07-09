<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert alert-info" role="alert">
                    Welcome!
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        <h2>Login Page</h2>
                    </div>
                    <div class="card-body">
                        <form action="login_logic.php" method="post">
                            <div>
                                <label for="username">Username</label> <br>
                                <input class="form-control" type="text" name="username" id="username" required>
                            </div>
                            <div>
                                <label for="passwd">Password </label> <br>
                                <input class="form-control" type="password" name="passwd" id="passwd" required>
                            </div>
                            <div class="d-flex justify-content-center mt-3" ">
                                <input class=" btn btn-primary" style="width: 150px;" type="submit" value="Sign In">
                            </div>
                        </form>
                        <div class="d-flex justify-content-center m-2">or</div>
                        <div class="d-flex justify-content-center">
                            <form action="register.php">
                                <input class="btn btn-success" style="width: 150px;" type="submit" value="Sign Up">
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['login_error'])) {
                    $error = $_SESSION['login_error'];
                ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <?php
                        echo 'Error: ' . $error;
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
<?php
session_destroy();
?>
<script>
    src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity = "sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin = "anonymous"
</script>