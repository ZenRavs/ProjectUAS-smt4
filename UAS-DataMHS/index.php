<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h2>Login Page</h2>
                    </div>
                    <div class="card-body">
                        <form action="login_logic.php" method="post">
                            <div>
                                <label for="email">Email</label> <br>
                                <input class="form-control" type="text" name="email" id="username">
                            </div>
                            <div>
                                <label for="passwd">Password </label> <br>
                                <input class="form-control" type="password" name="passwd" id="passwd">
                            </div>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity = "sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin = "anonymous"
</script>
<?php
session_start();
session_destroy();
