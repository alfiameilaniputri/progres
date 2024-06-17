<?php
include "koneksi.php";
$data_edit = isset($_GET['id']) ? mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = " . $_GET['id'])) : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="library/assets/styles.css" rel="stylesheet" media="screen">
    <style>
        .table-bordered {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            overflow: hidden;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }
        .table thead th {
            background-color: #f8f9fa;
        }
    </style>
    <script src="library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- add framework dataatble untuk sort tahap 1 -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</head>
<body>
    <div class="span9" id="content">
        <div class="row-fluid">
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Input Nilai Mahasiswa</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form action="<?php echo isset($data_edit['id']) ? 'edit_data.php?id=' . $data_edit['id'] . '&proses=1' : 'tambah_data.php'; ?>" method="POST">
                            <fieldset>
                                <legend>Input Nilai Mahasiswa</legend>
                                <div class="control-group">
                                    <label class="control-label" for="NPM">NAMA MAHASISWA : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge focused" id="NPM" name="nama" value="<?php echo isset($data_edit['nama_mahasiswa']) ? $data_edit['nama_mahasiswa'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="NPM">PRODI MAHASISWA : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge focused" id="NPM" name="prodi" value="<?php echo isset($data_edit['prodi']) ? $data_edit['prodi'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Proses</button>
                                    <button type="reset" class="btn">Cancel</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Data Mahasiswa</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <!-- tambahkan id, sesuai dengan yang di add di langkah 2  =-->
                        <table id="sortTable" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Prodi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id ASC");
                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $data['id'] ?></td>
                                    <td><?php echo $data['nama_mahasiswa'] ?></td>
                                    <td><?php echo $data['prodi'] ?></td>
                                    <td><a href="index.php?id=<?php echo $data['id']; ?>"> Edit </a> | <a href="hapus_data.php?id=<?php echo $data['id']; ?>"> Hapus </a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- tambahkan tombol untuk ekspor -->
                        <div class="export-buttons" style="text-align: center;">
                            <form action="ekspor_excel.php" method="POST" style="display: inline-block; margin-right: 10px;">
                                <button type="submit" class="btn btn-success">Export to Excel</button>
                            </form>
                            <form action="download_pdf.php" method="POST" style="display: inline-block;">
                                <button type="submit" class="btn btn-primary">Export to PDF</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>
    </div>

    <!-- script js untuk sort tahap 2-->
    <script>
    $(document).ready( function () {
        $('#sortTable').DataTable();
    });
    </script>

</body>
</html>
