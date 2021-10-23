<?php
    $database = mysqli_connect('localhost','id11991958_root','usbww','id11991958_tokobuku') or die("Ngga bisa konek, Alasan dari MySQL :".mysqli_error($mysqli)); 
    if (!$database)   die ("Ngga bisa konek, Alasan dari MySQL :".mysqli_error()); 
    if(isset($_GET['lihat'])) {
        $id = $_GET['lihat'];
    }
    if(isset($_GET['validasi'])) {
        $id = $_GET['validasi'];
        $database->query("UPDATE transaksi SET status = 'Terkirim' WHERE id=$id");
    }
    $result = mysqli_query ($database, "SELECT * FROM transaksi WHERE id='$id'"); 
    $data = $result->fetch_assoc();
    $gambar = $data["bukti"];
?>
<div id="content">
    <div id="single">
        <h2>Transaksi <?php echo $data['id_transaksi'] ?></h2> 
        <table>
            <TR>
                <TD>Kode Transaksi</TD>
                <TD>:</TD>
                <td><?php echo $data['id_transaksi'] ?></td>
            </TR>
            <tr>
                <TD>Total</TD>
                <TD>:</TD>
                <td><?php echo $data['total'] ?></td>
            </tr>
            <tr>
                <TD>Alamat</TD>
                <TD>:</TD>
                <td><?php echo $data['alamat'] ?></td>
            </tr>
            <tr>
                <TD>Tanggal</TD>
                <TD>:</TD>
                <td><?php echo $data['tanggal'] ?></td>
            </tr>
            <Tr>
                <TD>Status</TD>
                <TD>:</TD>
                <td><?php echo $data['status'] ?></td>
            </Tr>
            <Tr>
                <TD>Bukti Transaksi</TD>
                <TD>:</TD>
                <td></td>
            </Tr>
        </table>
        <img src='bukti/<?php echo $gambar?>' width='600px'>
        <div id='more'><a href='?a=daftartransaksi.php'>Kembali</a></div>
        <?php 
            if($data['status'] == "Proses") {
                echo "<div id='more'><a href='?a=selengkapnya.php&validasi=".$id."'>Validasi</a></div>";
            }
        ?>
    </div>
</div>