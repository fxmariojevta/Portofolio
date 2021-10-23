<?php
    if (isset($_SESSION['admin']))header("location:?a=admin.php");
    else if(!isset($_SESSION['akun'])) header("location:?l=formlogin.inc");
    else {
        $id = $_SESSION['akun'];
        $mysqli = new mysqli('localhost','id11991958_root','usbww','id11991958_tokobuku') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM akun WHERE id='$id'") or die($mysqli->error);
        $isi = $result->fetch_assoc();
?>
<div id="content">
	<div id="single">
		<table border="0" style="margin:25px;">
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>
                    <?php echo $isi['username'] ?>
                </td>
            </tr>

            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                    <?php echo $isi['nama'] ?>
                </td>
            </tr>
            
            <tr>
                <td>E-mail</td>
                <td>:</td>
                <td>
                    <?php echo $isi['email'] ?>
                </td>
            </tr>
            <tr>
                <div id='more'><a href='?a=edit-prof.php&prof'>Ubah Profil</a></div>
                <div id='more'><a href='?a=edit-prof.php&pass'>Ubah Password</a></div>
            </tr>
            <tr>
                <td>Riwayat Transaksi</td>
                <td>:</td>
                <td>
                </td>
            </tr>
            <tr>
                <table border="1" style="border-collapse: collapse;margin:5px;">
                    <tr style="text-align: center; border-bottom: 1px solid #ddd; background-color:#ddd;">
                        <th style="padding:15px">Kode Transaksi</th>
                        <th style="padding:15px">Total</th>
                        <th style="padding:15px">Alamat Pengiriman</th>
                        <th style="padding:15px">Status</th>
                        <th style="padding:15px">Tanggal</th>
                    </tr>
                    <?php 
                        $hasil = $mysqli->query("SELECT * FROM transaksi WHERE id_akun='$id'") or die($mysqli->error);
                        while($row = $hasil->fetch_assoc()): 
                    ?>
                        <tr style="text-align: center; border-bottom: 1px solid #ddd;">
                            <td><?php echo $row['id_transaksi']; ?></td>
                            <td>Rp. <?php echo $row['total']; ?>,00</td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['tanggal']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </tr>
		</table>
	</div>
</div>
<?php
    }
?>