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
    <style>
        .table{
            border-collapse: collapse;
            font-size: 13pt;
            text-align: center;
        }
        .table tr{
            padding: 10px;
            height: 30px;
        }
        .table th{
            background-color: steelblue;
            color: white;
        }
        .btn-delete{
            border: 1px solid #db5d59;
            background: #db5d59 url(hapus.png) no-repeat 5px 4px;
            height: 22px;
            padding-left: 30px;
        }
        </style>
        
    </style>
    <div class="table">
    <table class="data" border="1">
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>NIM Peminjam</th>
                <th style="width: 100px;">Nama Buku</th>
                <th>Kode Buku</th>
                <th style="width: 180px;">Tanggal Peminjaman</th>
                <th style="width: 180px;">Tanggal Pengembaliam</th>
                <th colspan="2" style="width: 100px;">Aksi</th>
            </tr>
            <?php
            include "koneksi.php";
            $no=1;
            $ambildata = mysqli_query($koneksi, "select * from tablepeminjaman");
            while ($tampil = mysqli_fetch_array($ambildata)){
                $warna = ($no%2==1)?"white":"#eee";
                echo"
                
                <tr bgcolor='$warna'>
                <td>$no</td>
                <td>$tampil[nama_peminjam]</td>
                <td>$tampil[nim_peminjam]</td>
                <td>$tampil[nama_buku]</td>
                <td>$tampil[kode_buku]</td>
                <td>$tampil[tanggal_peminjaman]</td>
                <td>$tampil[tanggal_pengembalian]</td>
                <td><a href='?kode=$tampil[id]'><input type='button' class='btn-delete'></a></td>
                </tr>  
                ";
                $no++;
            }
            ?>
        </table>
    </div>
    
    <?php
        
        if(isset($_GET['kode'])){
            mysqli_query($koneksi,"delete from tablepeminjaman where id='$_GET[kode]'");


            echo "data berhasil dihapus";
            echo "<script language='javascript'>alert('data berhasil dihapus');window.location='dataPinjam.php'</script>";
        }
        
        ?>
</body>
</html>