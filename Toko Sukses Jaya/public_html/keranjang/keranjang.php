<div id='content'>
<div id="single">
    <center>
        <h2>Keranjang</h2>
        <?php
            if(isset($_SESSION['admin']))
            header("Location:?p=content.inc");
            if(!isset($_SESSION['akun'])) header("Location: ?l=formlogin.inc");
            $total = "";
            $idtransaksi = $_SESSION['akun'];
            $id_akun = $_SESSION['akun'];
            $database = mysqli_connect('localhost','id11991958_root','usbww','id11991958_tokobuku') or die("Ngga bisa konek, Alasan dari MySQL :".mysqli_error($mysqli)); 
            if (!$database)   die ("Ngga bisa konek, Alasan dari MySQL :".mysqli_error()); 
            $result = mysqli_query ($database, "SELECT * FROM keranjang WHERE status='1' and id_akun = '$id_akun'"); 
            if(isset($_GET['delete'])) {
                $id = $_GET['delete'];
                $dbkeranjang = mysqli_query ($database, "SELECT * FROM keranjang WHERE id = '$id'");
                $eusikeranjang = $dbkeranjang->fetch_assoc();
                $id_buku = $eusikeranjang['id_buku'];
                $dbstok = mysqli_query ($database, "SELECT * FROM buku WHERE id='$id_buku'"); 
                $eusibuku = $dbstok->fetch_assoc();
                $stok = $eusibuku['stok'] + 1;
                $database -> query("UPDATE keranjang SET status = 0 WHERE id=$id") or die($database->error());
                $database -> query("UPDATE buku SET stok = '$stok' WHERE id=$id_buku") or die($database->error());
                header("Location: ?c=keranjang.php");
            }
            while ($row = mysqli_fetch_assoc($result)) {
                $id_buku = $row['id_buku'];
                $dbbuku = mysqli_query ($database, "SELECT * FROM buku WHERE id = '$id_buku'");
                $data = mysqli_fetch_assoc($dbbuku);
                echo "<div id='singlekeranjang'>";
                echo "<h2>".$data['judul']."</h2>";
                echo "<div id='featured-image'><img src='gambar/".$data['gambar']."' width='130px'>&nbsp;</div>";
                echo "<div align='justify'>".$data['harga']."</div>";
                echo "<div id='more'><a href='?c=keranjang.php&delete=".$row['id']."'>Hapus dari Keranjang</a></div>";
                echo "</div>";
                $total = (int)$total + (int)$data['harga'];
                $idtransaksi = $idtransaksi."#".$row['id'];
            }
            if(!isset($data['id'])) echo "Keranjang Kosong";
            else {
                $_SESSION['total']=$total;
                $_SESSION['idtransaksi']=$idtransaksi;
                echo "<div id='singlebayar'>";
                echo "<h2>Total Harga : Rp. ".$total."</h2>";
                echo "<div id='bayar'>";
                echo "<p>Pembayaran dapat dilakukan dengan mengirim bukti pembayaran ke nomor rekening <h1>12345678910</h1>
                <br><h1>BANK SISTEM a.n. Jaya Sujaya</h1></p>";
                echo "</div>";
                echo "</div>";
                echo "<div id='more'><a href='?c=bayar.php'>Bayar</a></div>";
            }
        ?>
    </CENTER>
    </div>
</div>