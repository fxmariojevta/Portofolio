<div id="content">
    <div id="single">
        <h2>Daftar Transaksi</h2>
        <table style="border-collapse: collapse;">
            <tr style="text-align: center; border-bottom: 1px solid #ddd; background-color:#ddd;">
                <th style="padding:15px">Kode Transaksi</th>
                <th style="padding:15px">Total</th>
                <th style="padding:15px">Alamat Pengiriman</th>
                <th style="padding:15px">Status</th>
                <th style="padding:15px">Tanggal</th>
                <th style="padding:15px">Aksi</th>
            </tr>
            <?php 
                $mysqli = new mysqli('localhost','id11991958_root','usbww','id11991958_tokobuku') or die(mysqli_error($mysqli));
                $hasil = $mysqli->query("SELECT * FROM transaksi ORDER BY status ASC") or die($mysqli->error);
                while($row = $hasil->fetch_assoc()): 
            ?>
                <tr style="text-align: center; border-bottom: 1px solid #ddd;">
                    <td><?php echo $row['id_transaksi']; ?></td>
                    <td>Rp. <?php echo $row['total']; ?>,00</td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><div id='more'><a href='?a=selengkapnya.php&lihat=<?php echo $row['id']?>'>Selengkapnya</a></div></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>