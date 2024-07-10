<?php

function delete($dbconn, $id_mhs) {
    // Menyiapkan pernyataan SQL untuk menghapus data
    $query = "DELETE FROM mahasiswa WHERE id_mhs = $1";
    $result = pg_query_params($dbconn, $query, array($id_mhs));

    // Mengecek hasil eksekusi
    if ($result) {
        return true;
    } else {
        return false;
    }
}
?>
