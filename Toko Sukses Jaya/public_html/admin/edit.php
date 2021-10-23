<?php
    $mysqli = new mysqli('localhost','id11991958_root','usbww','id11991958_tokobuku') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM buku") or die($mysqli->error);
    $judul ="";
    $penulis ="";
    $penerbit ="";
    $deskripsi = "";
    $tahunTerbit ="";
    $stok ="";
    $harga ="";
    $image = "";
    $satu = "";
    $dua ="";
    $tiga="";
    $empat="";
    $kategori="";
    $kirim = 0;
    $id = 0;
    if(isset($_GET['update'])) {
        $id=$_GET['update'];
        $kirim = 1;
        $db = new mysqli('localhost','id11991958_root','usbww','id11991958_tokobuku') or die(mysqli_error($db));
        $update = $db->query("SELECT * FROM buku WHERE id='$id'") or die($db->error());
        $eusi = $update->fetch_assoc();
        $judul = $eusi['judul'];
        $penulis =$eusi['penulis'];
        $penerbit =$eusi['penerbit'];
        $deskripsi = $eusi['deskripsi'];
        $tahunTerbit = $eusi['tahun_terbit'];
        $stok = $eusi['stok'];
        $harga = $eusi['harga'];
        $image = $eusi['gambar'];
        switch ($eusi['kategori'])
            {
                case "Data Science": $satu="selected"; break;
                case "Web Programming": $dua="selected"; break;
                case "Arduino Programming": $tiga="selected"; break;
                case "Android Programming": $empat="selected";
            }
    }
    if(isset($_SESSION['judul'])) {
        $judul = $_SESSION['judul'];
        $penulis =$_SESSION['penulis'];
        $penerbit =$_SESSION['penerbit'];
        $deskripsi = $_SESSION['deskripsi'];
        $tahunTerbit = $_SESSION['tahun_terbit'];
        $stok = $_SESSION['stok'];
        $harga = $_SESSION['harga'];
        switch ($_SESSION['kategori'])
            {
                case "Data Science": $satu="selected"; break;
                case "Web Programming": $dua="selected"; break;
                case "Arduino Programming": $tiga="selected"; break;
                case "Android Programming": $empat="selected";
            }
    }
?>
<div id='content'>
    <CENTER>
        <FORM METHOD="post" ACTION="?m=edit-pros.php&kirim=<?php echo $kirim?>&id=<?php echo $id?>" enctype="multipart/form-data">
            <TABLE>
                <TR BGCOLOR="#DDDDDD">
                    <TD COLSPAN="2" ALIGN="center">
                        <b>Masukan data untuk buku</b>
                    </TD>
                </TR>
                <TR>
                    <TD>Judul</TD>
                    <TD>
                        <INPUT TYPE="text" NAME="judul" PLACEHOLDER="Masukkan judul" SIZE="68" VALUE='<?php echo $judul?>'>
                    </TD>
                </TR>
                <tr>
                    <td VALIGN="top">Penulis</td>
                    <TD>
                        <INPUT TYPE="text" NAME="penulis" PLACEHOLDER="Masukkan nama penulis" SIZE="68" VALUE='<?php echo $penulis?>'>
                    </TD>
                </tr>
                <tr>
                    <td VALIGN="top">Penerbit</td>
                    <TD>
                        <INPUT TYPE="text" NAME="penerbit" PLACEHOLDER="Masukkan nama penerbit" SIZE="68" VALUE='<?php echo $penerbit?>'>
                    </TD>
                </tr>
                <TR>
                    <TD VALIGN="top">Deskripsi</TD>
                    <TD>
                        <TEXTAREA NAME="deskripsi" ROWS="15" PLACEHOLDER="Masukkan deskripsi" cols="60"><?php echo $deskripsi?></textarea>
                    </TD>
                </TR>
                <tr>
                    <td VALIGN="top">Tahun Terbit</td>
                    <TD>
                        <INPUT TYPE="text" NAME="tahun_terbit" PLACEHOLDER="Masukkan Tahun Terbit" MAXLENGTH="4" VALUE=<?php echo $tahunTerbit?>>
                    </TD>
                </tr>
                <tr>
                    <td VALIGN="top">Stok</td>
                    <TD>
                        <INPUT TYPE="text" name="stok" PLACEHOLDER="Masukkan stok" MAXLENGTH="4" VALUE=<?php echo $stok?>>
                    </TD>
                </tr>
                <tr>
                    <td VALIGN="top">Harga</td>
                    <TD>
                        <INPUT TYPE="text" name="harga" PLACEHOLDER="Masukkan harga" MAXLENGTH="25" VALUE=<?php echo $harga?>>
                    </TD>
                </tr>
                <Tr>
                    <td>Kategori:</td>
                    <td>
                        <SELECT NAME="kategori">
                            <OPTION VALUE="Data Science" <?php echo $satu?>>Data Science
                            <OPTION VALUE="Web Programming" <?php echo $dua?>>Web Programming
                            <OPTION VALUE="Arduino Programming" <?php echo $tiga?>>Arduino Programming
                            <OPTION VALUE="Android Programming" <?php echo $empat?>>Android Programming
                        </SELECT>
                    </td>
                </Tr>
                <TR>
                    <td>Gambar</td>
                    <td>
                        <input type="file" name="fileToUpload" id="fileToUpload"><br>
                    </td>
                </TR>
            </TABLE>
            <?php 
                if(isset($_GET['update'])) {
                    echo "<td><img src='gambar/".$image."' width='600px'></td>";
                }
            ?>
            <INPUT TYPE="submit" VALUE="Kirim">
            <button onclick="window.location.href = '?m=edit.php'" type="button">Reset</button>
            <button onclick="window.location.href = '?m=all.php'" type="button">Kembali</button>
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
    