<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../UAS-DataMHS2/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="sidebar">
        <h4 class="mb-2"><i class="fas fa-database"></i> PENDATAAN MAHASISWA</h4>
        <a href="#" class="btn btn-dark text-start" data-file="dashboard_content.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="#" class="btn btn-dark text-start" data-file="table_mhs.php"><i class="fas fa-user-graduate"></i> Data Mahasiswa</a>
        <a href="#" class="btn btn-dark text-start" data-file="table_fakultas.php"><i class="fas fa-university"></i> Data Fakultas</a>
        <a href="#" class="btn btn-dark text-start" data-file="table_jurusan.php"><i class="fas fa-book"></i> Data Jurusan</a>
        <a href="#" class="btn btn-dark text-start" data-file="profil.php"><i class="fas fa-info-circle"></i> About Us</a>
    </div>
    <div class="content">
        <div class="header shadow">
            <div><!-- Placeholder for alignment --></div>
            <div class="d-flex align-items-center">
                <a href="destroy_session.php" class="logout">Logout</a>
                <span class="ms-3"><?php echo $_SESSION['user']['admin']; ?></span>
                <div class="ms-3 d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; border-radius: 50%; background-color: #007bff; color: white;">
                    A
                </div>
            </div>
        </div>
        <div class="content-inner d-flex justify-content-center shadow m-3 rounded">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.content-inner').load('dashboard_content.php');
            $('.sidebar a').on('click', function(e) {
                e.preventDefault();
                var file = $(this).data('file');
                $('.content-inner').load(file);
            });
            $(document).on('click', '.addNew', function() {
                $.ajax({
                    url: 'insert_form.php',
                    success: function(response) {
                        $('.content-inner').html(response);
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat memuat form.');
                    }
                });
            });

            $(document).on('submit', '#insertForm', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'insert_mhs.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert('Added!');
                        $('.content-inner').html(response);
                        $('.content-inner').load('table_mhs.php');
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menyimpan data.');
                    }
                });
            });

            $(document).on('click', '.edit-btn', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                $.ajax({
                    url: 'edit_form.php',
                    type: 'POST',
                    data: {
                        id_mhs: id
                    },
                    success: function(response) {
                        $('.content-inner').html(response);
                    }
                });
            });

            $(document).on('submit', '#editForm', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'edit_mhs.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert('Changed!');
                        $('.content-inner').load('table_mhs.php');
                    }
                });
            });

            // Add new script for inserting jurusan
            $(document).on('click', '.insertJurusan', function() {
                $.ajax({
                    url: 'insert_jurusanform.php',
                    success: function(response) {
                        $('.content-inner').html(response);
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat memuat form.');
                    }
                });
            });

            $(document).on('submit', '#insertJurusanForm', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'insert_jurusan.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert('Jurusan added!');
                        $('.content-inner').html(response);
                        $('.content-inner').load('table_jurusan.php');
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menyimpan data.');
                    }
                });
            });

            // Add new script for deleting jurusan
            $(document).on('click', '.delete-jurusan', function(e) {
                e.preventDefault();
                var kodeJurusan = $(this).data('kode');
                if (confirm('Are you sure you want to delete this jurusan?')) {
                    $.ajax({
                        url: 'delete_jurusan.php',
                        type: 'POST',
                        data: {
                            kode_jurusan: kodeJurusan
                        },
                        success: function(response) {
                            alert(response);
                            $('.content-inner').load('table_jurusan.php');
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat menghapus data.');
                        }
                    });
                }
            });

            $(document).on('click', '#insertFakultas', function(e) {
                $('.content-inner').load('fakultas_form.php');
            });

            $(document).on('submit', '#insertFakultasForm', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'fungsi_fakultas.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        var res = JSON.parse(response);
                        if (res.status === "success") {
                            alert('Fakultas added!');
                            $('#insertFakultasForm')[0].reset();
                            $('.content-inner').load('table_fakultas.php');
                        } else {
                            alert('Error: ' + res.message);
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menyimpan data.');
                    }
                });
            });

            $(document).on('click', '.delete-fakultas', function(e) {
                e.preventDefault();
                var idFaku = $(this).data('id');
                if (confirm('Are you sure you want to delete this fakultas?')) {
                    $.ajax({
                        url: 'delete_fakultas.php',
                        type: 'POST',
                        data: {
                            id_faku: idFaku
                        },
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.status === "success") {
                                alert('Fakultas deleted!');
                                $('.content-inner').load('table_fakultas.php');
                            } else {
                                alert('Error: ' + res.message);
                            }
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat menghapus data.');
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>