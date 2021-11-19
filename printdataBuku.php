<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styleprint.css">
    <title>Data Buku</title>
</head>
<body>
    <center><h1>Table Data Buku</h1></center>
    <div class="table">
        <table class="data" border="1">
            <tr>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Kode Buku</th>
                <th>Tanggal Terbit</th>
                <th>Pencipta</th>
            </tr>
            <?php
            
            include "koneksi.php";
            $no=1;
            $ambildata = mysqli_query($koneksi, "select * from tablebuku");
            while ($tampil = mysqli_fetch_array($ambildata)){
                echo"
                
                <tr>
                    <td>$no</td>
                    <td>$tampil[nama_buku]</td>
                    <td>$tampil[kode_buku]</td>
                    <td>$tampil[tanggal_terbit]</td>
                    <td>$tampil[pencipta]</td>
                </tr>";
                $no++;
            }
            
            ?>
        </table>
        <script type="text/javascript">window.print()</script>
    </div>
</body>
</html>