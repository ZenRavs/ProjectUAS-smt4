<?php
include 'supabaseConnect.php';
session_start();
if (isset($_SESSION['user'])) {
?>
    DASHBOARD!
    <form action="destroy_session.php">
        <input class="btn btn-sm btn-danger" type="submit" value="Logout">
    </form>
<?php
    include 'table_mhs.php';
} else {
    $_SESSION['login_error'] = 1;
    header('location: index.php');
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script>
    src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity = "sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin = "anonymous"
</script>
<?php
