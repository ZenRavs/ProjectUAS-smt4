<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Mahasiswa</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Custom CSS -->
  <style>
    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      background: #343a40;
      color: white;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
    }

    .sidebar .nav-link.active {
      background-color: #495057;
    }

    .content-wrapper {
      margin-left: 250px;
      padding: 20px;
    }

    .table {
      margin-top: 20px;
    }

    .btn-download {
      margin-top: 20px;
    }

    .card {
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar p-3">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
        <div class="image">
          <i class="fas fa-user-graduate fa-2x"></i>
        </div>
        <div class="info ms-3">
          <a href="#" class="d-block">Pendataan Mahasiswa</a>
        </div>
      </div>

      <nav>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a href="#" class="nav-link active" id="dashboard-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" id="data-mahasiswa-link">
              <i class="nav-icon fas fa-table"></i>
              Data Mahasiswa
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=data-prodi" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              Data Program Studi
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=data-fakultas" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              Data Fakultas
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" id="about-link">
              <i class="nav-icon fas fa-info-circle"></i>
              About Us
            </a>
          </li>
        </ul>
      </nav>
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div id="content">
        <!-- Default content goes here -->
        <div class="card">
          <div class="card-body">
            <h1>Selamat Datang di Pendataan Mahasiswa</h1>
            <p>Ini adalah halaman dashboard. Klik pada menu di sebelah untuk menampilkan data.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->

  <!-- Bootstrap 5 JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Custom JS for AJAX -->
  <script>
    $(document).ready(function() {
      $('#dashboard-link').on('click', function(e) {
        e.preventDefault();
        $('#content').load('dashboard_content.php');
      });

      $('#about-link').on('click', function(e) {
        e.preventDefault();
        $('#content').load('profil.php');
      });

      $('#data-mahasiswa-link').on('click', function(e) {
        e.preventDefault();
        $('#content').load('table_mhs.php');
        $('.nav-link').removeClass('active'); // Remove active class from all nav links
        $(this).addClass('active'); // Add active class to the clicked nav link
      });
    });
  </script>
</body>

</html>