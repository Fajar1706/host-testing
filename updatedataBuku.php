<?php
    include "koneksi.php";
    $sql=mysqli_query($koneksi, "select * from tablebuku where id='$_GET[kode]'");
    $data = mysqli_fetch_array($sql);
    ?>

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
            <li><a href="inputBuku.php"><i class="fas fa-keyboard"></i>Input Buku</a></li>
            <li><a href="dataBuku.php"><i class="fas fa-database"></i>Data Buku</a></li>
            <li><a href="transaksi.php"><i class="fas fa-tags"></i>Transaksi</a></li>
            <li><a href="dataPinjam.php"><i class="fas fa-tags"></i>Data Pinjam</a></li>
        </ul>
    </div>
    

    <form action="" method="post">
        <div class="form">
            <div class="judul">
                <h2>Input Data Buku</h2>
            </div>
            <table class="form-main">
                <tr>
                    <th>Nama Buku</th>
                    <th>:</th>
                    <th><input type="text" name="nama_buku" value="<?php echo $data['nama_buku'];?>"></th>
                </tr>
                <tr>
                    <th>Kode Buku</th>
                    <th>:</th>
                    <th><input type="text" name="kode_buku" value="<?php echo $data['kode_buku'];?>"></th>
                </tr>
                <tr>
                    <th>Tanggal Terbit</th>
                    <th>:</th>
                    <th><input type="date" name="tanggal_terbit" value="<?php echo $data['tanggal_terbit']; ?>"></th>
                </tr>
                <tr>
                    <th>Pencipta</th>
                    <th></th>
                    <th><input type="text" name="pencipta" value="<?php echo $data['pencipta']; ?>"></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th><input type="submit" name="submit"></th>
                </tr>
            </table>
        </div>
    </form>
    <?php

    include "koneksi.php";

    if(isset($_POST['submit'])){
        mysqli_query($koneksi, "update tablebuku set 
        nama_buku       ='$_POST[nama_buku]',
        kode_buku       ='$_POST[kode_buku]',
        tanggal_terbit  ='$_POST[tanggal_terbit]',
        pencipta        ='$_POST[pencipta]'
        where id        ='$_GET[kode]'");

        echo "<script language='javascript'>alert('data berhasil diupdate');window.location='dataBuku.php'</script>";
    }

    ?>
</body>
</html>