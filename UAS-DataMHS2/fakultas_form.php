<?php
session_start();

if (isset($_SESSION['user'])) {
?>
    <div class="container flex border rounded mt-3 bg-white p-3">
        <h1>Insert New Fakultas</h1>
        <form id="insertFakultasForm" method="POST">
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Fakultas</label>
                <input type="text" class="form-control" id="kode" name="kode" required>
            </div>
            <div class="mb-3">
                <label for="fakultas" class="form-label">Nama Fakultas</label>
                <input type="text" class="form-control" id="fakultas" name="fakultas" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
<?php
} else {
    echo "Invalid request.";
}
?>
