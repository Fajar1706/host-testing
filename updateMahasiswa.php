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
<style>
    .form{
        height: 800px;
    }
</style>
<body>
    <div class="sidebar">  
        <header>Menu</header>
        <ul>
            <li><a href="index.php"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="inputdataMhs.php"><i class="fas fa-keyboard"></i>Input Mahasiswa</a></li>
            <li><a href="dataMahasiswa.php"><i class="fas fa-database"></i>Data Mahasiswa</a></li>
            <li><a href="inputBuku.php"><i class="fas fa-keyboard"></i>Input Buku</a></li>
            <li><a href="dataBuku.php"><i class="fas fa-database"></i>Data Buku</a></li>
            <li><a href="transaksi.php"><i class="fas fa-tags"></i>Transaksi</a></li>
            <li><a href="dataPinjam.php"><i class="fas fa-tags"></i>Data Pinjam</a></li>
        </ul>
    </div>
    <?php
    include "koneksi.php";
    $sql = mysqli_query($koneksi, "select * from tablemhs where nim='$_GET[kode]'");
    $data = mysqli_fetch_array($sql);

    
    ?>
    <div class="form">
        <div class="judul">
            <h2>Input Data Mahasiswa</h2>
        </div>
        <form action="" method="post">
        <table class="form-main">
            <tr>
                <th>Nama Lengkap</th>
                <th>:</th>
                <th><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></th>
            </tr>
            <tr>
                <th>NIM</th>
                <th>:</th>
                <th><input type="text" name="nim" value="<?php echo $data['nim']; ?>"></th>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <th>:</th>
                <th><input type="radio" name="jenis_kelamin" value="Laki - Laki">Laki - Laki</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th><input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan</th>
            </tr>
            <tr>
                <th>Tanggal lahir</th>
                <th>:</th>
                <th><input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>"></th>
            </tr>
            <tr>
                <th>Alamat</th>
                <th>:</th>
                <th><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></th>
            </tr>
            <tr>
                <th>Nama Dosen</th>
                <th>:</th>
                <th><input type="text" name="namadosen" value=""></th>
            </tr>

            <tr>
                <th>Nama Mata kuliah</th>
                <th>:</th>
                <th><input type="text" name="matakuliah" value=""></th>
            </tr>
            <tr>
                <th>Administrasi</th>
                <th>:</th>
                <th><input type="radio" name="administrasi" value="Laki - Laki">Lunas</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th><input type="radio" name="administrasi" value="Perempuan">Belom lunas</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th><input type="submit" name="submit"></th>
            </tr>
        </table>
        </form>
    </div>
    <?php

    include "koneksi.php";

    if(isset($_POST['submit'])){
        mysqli_query($koneksi, "update tablemhs set 
        nama            ='$_POST[nama]',
        nim             ='$_POST[nim]',
        jenis_kelamin   ='$_POST[jenis_kelamin]',
        tanggal_lahir   ='$_POST[tanggal_lahir]',
        alamat          ='$_POST[alamat]',
        administrasi ='$_POST[administrasi]'
        namadosen ='$_POST[namadosen]',
        matakuliah ='$_POST[matakuliah]',
        where nim        ='$_GET[kode]'");

        echo "<script language='javascript'>alert('data berhasil disimpan');window.location='dataMahasiswa.php'</script>";
    }

    ?>
</body>
</html>