<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../UAS-DataMHS2/styles/style.css">
</head>

<body>
    <div class="sidebar">
        <h4 class="mb-2">PENDATAAN MAHASISWA</h4>
        <a href="#" class="btn btn-dark text-start" data-file="dashboard.php">DASHBOARD</a>
        <a href="#" class="btn btn-dark text-start" data-file="../UAS-DataMHS2/table_mhs.php">Data Mahasiswa</a>
        <a href="#" class="btn btn-dark text-start" data-file="data_fakultas.php">Data Fakultas</a>
        <a href="#" class="btn btn-dark text-start" data-file="data_jurusan.php">Data Jurusan</a>
        <a href="#" class="btn btn-dark text-start" data-file="../UAS-DataMHS2/profil.php">About</a>
    </div>
    <div class="content">
        <div class="header">
            <div><!-- Placeholder for alignment --></div>
            <div class="d-flex align-items-center">
                <span class="me-3">Admin-00</span>
                <a href="#" class="logout">logout</a>
                <div class="ms-3 d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; border-radius: 50%; background-color: #007bff; color: white;">
                    A
                </div>
            </div>
        </div>
        <div class="content-inner d-flex justify-content-center">
            <p></p>
            <p></p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidebar a').on('click', function(e) {
                e.preventDefault();
                var file = $(this).data('file');
                $('.content-inner').load(file);
            });
        });
    </script>
</body>

</html>