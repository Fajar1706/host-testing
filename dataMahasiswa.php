<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Dashboard input data</title>
</head>

<body>
    <div class="sidebar">
        <header>Menu</header>
        <ul>
            <li><a href="index.php"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="inputdataMhs.php"><i class="fas fa-keyboard"></i>Input Mahasiswa</a></li>
            <li><a href="dataMahasiswa.php"><i class="fas fa-database"></i>Data Mahasiswa</a></li>
            <li><a href="inputBuku.php"><i class="fas fa-keyboard"></i>Input Data Dosen</a></li>
            <li><a href="dataBuku.php"><i class="fas fa-database"></i>Data Dosen</a></li>
            <li><a href="transaksi.php"><i class="fas fa-tags"></i>Transaksi</a></li>
        </ul>
    </div>
    <style>
        .table {
            border-collapse: collapse;
            font-size: 13pt;
            text-align: center;
        }

        .table tr {
            padding: 10px;
            height: 30px;
        }

        .table th {
            background-color: steelblue;
            color: white;
        }

        .btn-delete {
            border: 1px solid #db5d59;
            background: #db5d59 url(hapus.png) no-repeat 5px 4px;
            height: 22px;
            padding-left: 30px;
        }

        .btn-update {
            border: 1px solid #00b3a8;
            background: #00b3a8 url(edit.png) no-repeat 5px 4px;
            height: 22px;
            padding-left: 30px;
        }
    </style>
    <div class="table">
        <table class="data" border="1">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NIM</th>
                <th style="width: 100px;">Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th colspan="2">Aksi</th>
            </tr>
            <?php
            include "koneksi.php";
            $no = 1;
            $ambildata = mysqli_query($koneksi, "select * from tablemhs");
            while ($tampil = mysqli_fetch_array($ambildata)) {
                $warna = ($no % 2 == 1) ? "white" : "#eee";
                echo "
                 
                <tr bgcolor='$warna'>
                <td>$no</td>
                <td>$tampil[nama]</td>
                <td>$tampil[nim]</td>
                <td>$tampil[jenis_kelamin]</td>
                <td>$tampil[tanggal_lahir]</td>
                <td>$tampil[alamat]</td>
                <td><a href='?kode=$tampil[nim]'><input type='button' class='btn-delete'></a></td>
                <td><A href='updateMahasiswa.php?kode=$tampil[nim]'><input type='button' class='btn-update'></a></td>                
                </tr>  
                ";
                $no++;
            }
            ?>
        </table>
        <button><a href="printdataMahasiswa.php">PRINT</a></button>
        <style>
            button {
                margin-top: 100px;
                margin-left: -780px;
                width: 70px;
                height: 30px;
            }
        </style>

        <?php

        if (isset($_GET['kode'])) {
            mysqli_query($koneksi, "delete from tablemhs where nim='$_GET[kode]'");


            echo "data berhasil dihapus";
            echo "<script language='javascript'>alert('data berhasil dihapus');window.location='dataMahasiswa.php'</script>";
        }

        ?>
    </div>
</body>

</html>