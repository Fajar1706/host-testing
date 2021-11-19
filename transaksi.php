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
    .haha{
        position: relative;
        top: 10px;
        left: 100px;
        font-size: 30px;
        color: white;
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
        <div class="form">
        <form action="" method="post" autocomplete="off">
        <table class="form-main">
            <tr>
                <th>Nama Peminjam</th>
                <th>:</th>
                <th><input type="text" name="nama_peminjam"></th>
            </tr>
            <tr>
                <th>NIM Peminjam</th>
                <th>:</th>
                <th><input type="text" name="nim_peminjam"></th>
            </tr>
            <tr>
                <th>Nama Buku</th>
                <th>:</th>
                <th><input type="text" name="nama_buku"></th>
            </tr>
            <tr>
                <th>Kode Buku</th>
                <th>:</th>
                <th><input type="text" name="kode_buku"></th>
            </tr>
            <tr>
                <th>Tanggal Peminjaman</th>
                <th>:</th>
                <th><input type="date" name="tanggal_peminjaman"></th>
            </tr>
            <tr>
                <th>Tanggal Pengembalian</th>
                <th>:</th>
                <th><input type="date" name="tanggal_pengembalian"></th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th><input type="submit" name="submit"></th>
            </tr>
        </table>
        </form>

        <?php
        include "koneksi.php";

        if(isset($_POST['submit'])){
            mysqli_query($koneksi, "INSERT INTO tablepeminjaman SET
            nama_peminjam = '$_POST[nama_peminjam]',
            nim_peminjam = '$_POST[nim_peminjam]',
            nama_buku = '$_POST[nama_buku]',
            kode_buku = '$_POST[kode_buku]',
            tanggal_peminjaman = '$_POST[tanggal_peminjaman]',
            tanggal_pengembalian = '$_POST[tanggal_pengembalian]'");

            echo "<script language='javascript'>alert('data berhasil disimpan');window.location='transaksi.php'</script>";
        }
        ?>
        </div>
        
</body>
</html>