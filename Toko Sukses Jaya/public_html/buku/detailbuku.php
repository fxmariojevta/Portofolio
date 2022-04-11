<?php
    if(isset($_GET['lihat'])) {
        $id = $_GET['lihat'];
    }
    if(isset($_GET['add'])) {
        $id = $_GET['add'];
    }
    $database = mysqli_connect('localhost','id11991958_root','usbww','id11991958_tokobuku') or die("Ngga bisa konek, Alasan dari MySQL :".mysqli_error($mysqli)); 
    if (!$database)   die ("Ngga bisa konek, Alasan dari MySQL :".mysqli_error()); 
    $result = mysqli_query ($database, "SELECT * FROM buku WHERE id='$id' AND status=1"); 
    $data = $result->fetch_assoc();
    $popular = $data['popular'] + 1;
    $database -> query("UPDATE buku SET popular = '$popular' WHERE id=$id") or die($database->error());
    $gambar = $data["gambar"];
    if(isset($_GET['add'])) {
        $akun = $_SESSION['akun'];
        $buku = $_GET['add'];
        $stok = $data['stok'] - 1;
        $database -> query("UPDATE buku SET stok = '$stok' WHERE id=$id") or die($database->error());
        $database -> query("INSERT INTO keranjang (id_akun, id_buku, status) VALUES ('$akun', '$buku', 1)") or die($database ->error());
    }
?>
<div id="content" style="width:100px;">
    <div id="single">
        <h2 style="text-align:center;"><?php echo $data['judul'] ?></h2> 
        <img src='gambar/<?php echo $gambar?>' width='600px'>
        <table>
            <TR>
                <TD>Judul</TD>
                <TD>:</TD>
                <td><?php echo $data['judul'] ?></td>
            </TR>
            <tr>
                <TD>Penulis</TD>
                <TD>:</TD>
                <td><?php echo $data['penulis'] ?></td>
            </tr>
            <tr>
                <TD>Penerbit</TD>
                <TD>:</TD>
                <td><?php echo $data['penerbit'] ?></td>
            </tr>
            <tr>
                <TD>Tahun Terbit</TD>
                <TD>:</TD>
                <td><?php echo $data['tahun_terbit'] ?></td>
            </tr>
            <Tr>
                <TD>Kategori</TD>
                <TD>:</TD>
                <td><?php echo $data['kategori'] ?></td>
            </Tr>
            <tr>
                <TD>Harga</TD>
                <TD>:</TD>
                <td><?php echo $data['harga'] ?></td>
            </tr>
            <tr>
                <TD>Stok</TD>
                <TD>:</TD>
                <td><?php echo $data['stok'] ?></td>
            </tr>
        </table>
        <p align="justify"><?php echo $data['deskripsi'] ?></p>
        <div id='more'><a href='?b=list.php'>Kembali</a></div>
        <?php 
            if(isset($_SESSION['admin'])) {
                echo "<div id='more'><a href='#'>Tambah ke Keranjang</a></div>";
            }
            else if(!isset($_SESSION['akun'])) {
                echo "<div id='more'><a href='?l=formlogin.inc'>Tambah ke Keranjang</a></div>";
            }
            else if($data['stok'] < 1) {
                echo "<div id='more'><a href='#'>Stok Habis</a></div>";
            }
            else {
                echo "<div id='more'><a href='?b=detailbuku.php&add=".$data['id']."'>Tambah ke Keranjang</a></div>";
            }
        ?>
    </div>
</div>