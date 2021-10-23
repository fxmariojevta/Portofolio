<?php
    $id = $_SESSION['akun'];
	$nama ="";
    $email = "";
	// if(isset($_SESSION['nama'])) {
	// 	$nama = $_SESSION['nama'];
	// 	$email=$_SESSION['email'];
    // }
    $mysqli = new mysqli('localhost','id11991958_root','usbww','id11991958_tokobuku') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM akun WHERE id='$id'") or die($mysqli->error);
    $isi = $result->fetch_assoc();
    if(isset($_GET['prof'])) {
        ?>
        <div id="content">
            <div id="single">
                <table border="0">
                    <FORM METHOD="POST" ACTION="?a=edit-prof-pros.php&prof">
                        <tr>
                            <td>Nama</td>
                            <td><INPUT TYPE="text" NAME="nama" size=53 MAXLENGTH="36" VALUE="<?php echo $isi['nama']?>""></td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td><INPUT TYPE="text" NAME="email" size=53 MAXLENGTH="36" VALUE=<?php echo $isi['email']?>></td>
                        </tr>
                        <tr>
                            <td>
                                <INPUT TYPE="submit" VALUE="Ubah"> <INPUT TYPE="Reset">
                                <button onclick="window.location.href = '?a=akun.php'" type="button">Kembali</button>
                            </td>
                        </tr>
                    </FORM>
                </table>
            </div>
        </div>
    <?php }
    else if(isset($_GET['pass'])) {
        ?>
        <div id="content">
            <div id="single">
                <table border="0">
                    <FORM METHOD="POST" ACTION="?a=edit-prof-pros.php&pass">
                        <tr>
                            <td>Password lama</td>
                            <td><INPUT TYPE="password" NAME="pass0" size=53 MAXLENGTH="32"></td>
                        </tr>
                        <tr>
                            <td>Password Baru</td>
                            <td><INPUT TYPE="password" NAME="pass1" size=53 MAXLENGTH="32"></td>
                        </tr>		
                        <tr>
                            <td>Ulangi Password Baru</td>
                            <td><INPUT TYPE="password" NAME="pass2" size=53 MAXLENGTH='32'></td>
                        </tr>
                        <tr>
                            <td>
                                <INPUT TYPE="submit" VALUE="Ubah"> <INPUT TYPE="Reset">
                                <button onclick="window.location.href = '?a=akun.php'" type="button">Kembali</button>
                            </td>
                        </tr>
                    </FORM>
                </table>
            </div>
        </div>
    <?php } ?>
