<?php
    $id = $_GET['lihat'];
    $database = mysqli_connect('localhost','id11991958_root','usbww','id11991958_tokobuku') or die("Ngga bisa konek, Alasan dari MySQL :".mysqli_error($mysqli)); 
    if (!$database)   die ("Ngga bisa konek, Alasan dari MySQL :".mysqli_error()); 
    $result = mysqli_query ($database, "SELECT * FROM buku WHERE id='$id'"); 
    $data = $result->fetch_assoc();
    $gambar = $data["gambar"];
?>
<div id="content">
    <div id="single">
        <h2><?php echo $data['judul'] ?></h2> 
        <img src="gambar/<?php echo $gambar?>" width='600px'>
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
        <div id='more'><a href='?m=all.php'>Kembali</a></div>
        <div id='more'><a href='?m=edit.php&update=<?php echo $data['id']?>'>Edit</a></div>
        <?php 
            if($data['status']==1) echo "<div id='more'><a href='?m=delete.php&id=".$data['id']."'>Delete</a></div>";
            if($data['status']==0) echo "<div id='more'><a href='?m=restore.php&id=".$data['id']."'>Restore</a></div>";
        ?>
    </div>
</div>