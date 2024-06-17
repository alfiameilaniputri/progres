<?php

    include "koneksi.php";

    $query = "SELECT * FROM mahasiswa ORDER BY nama_mahasiswa ASC";
    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

?>