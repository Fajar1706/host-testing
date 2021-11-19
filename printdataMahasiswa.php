<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styleprint.css">
    <title>Dashboard input data</title>
</head>
<body>
    <div class="table">
        <table class="data" border="1">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NIM</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
            </tr>

            <?php
            
            include "koneksi.php";
            $no=1;
            $ambildata = mysqli_query($koneksi, "select * from tablemhs");
            while ($tampil = mysqli_fetch_array($ambildata)){
                echo"
                
                <tr>
                    <td>$no</td>
                    <td>$tampil[nama]</td>
                    <td>$tampil[nim]</td>
                    <td>$tampil[jenis_kelamin]</td>
                    <td>$tampil[tanggal_lahir]</td>
                    <td>$tampil[alamat]</td>
                </tr>";
                $no++;
            }
            
            ?>
        </table>
        <script type="text/javascript">window.print()</script>
    </div>
</body>
</html>