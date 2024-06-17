<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nama Mahasiswa</th>
            <th>Prodi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        include "tampilkan_data.php";
        while ($data = mysqli_fetch_assoc($result)) { 
        ?>
            <tr>
                <td><?php echo $data['id'] ?></td>
                <td><?php echo $data['nama_mahasiswa'] ?></td>
                <td><?php echo $data['prodi'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>
