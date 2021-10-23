<?php
    $mysqli = new mysqli('localhost','id11991958_root','usbww','id11991958_tokobuku') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM akun") or die($mysqli->error);
    $dataakun = $result->fetch_assoc();
    $alamat = $dataakun['alamat'];
    $total = $_SESSION['total'];
    $idtransaksi= $_SESSION['idtransaksi'];
?>
<div id='content'>
    <CENTER>
        <FORM METHOD="post" ACTION="?c=bayar-pros.php" enctype="multipart/form-data">
            <TABLE>
                <TR BGCOLOR="#DDDDDD">
                    <TD COLSPAN="2" ALIGN="center">
                        <b>Masukan data transaksi</b>
                    </TD>
                </TR>
                <TR>
                    <TD>Kode Transaksi</TD>
                    <TD>
                        <?php echo $idtransaksi?>
                    </TD>
                </TR>
                <TR>
                    <TD>Total Pembayaran</TD>
                    <TD>
                        <?php echo $total?>
                    </TD>
                </TR>
                <TR>
                    <TD>Alamat Pengiriman</TD>
                    <TD>
                        <INPUT TYPE="text" NAME="alamat" PLACEHOLDER="Masukkan alamat" SIZE="68" VALUE='<?php echo $alamat?>'>
                    </TD>
                </TR>
                <TR>
                    <td>Bukti Transaksi</td>
                    <td>
                        <input type="file" name="fileToUpload" id="fileToUpload"><br>
                    </td>
                </TR>
            </TABLE>
            <INPUT TYPE="submit" VALUE="Kirim">
            <button onclick="window.location.href = '?c=bayar.php'" type="button">Reset</button>
            <button onclick="window.location.href = '?c=keranjang.php'" type="button">Kembali</button>
        </FORM>
        <?php 
            if(isset($_SESSION['duar'])) {
                echo $_SESSION['duar']."<br>";
            } 
            if(isset($_SESSION['duarR'])) {
                echo $_SESSION['duarR']."<br>";
            } 
        ?>
    </CENTER>
</div>
    