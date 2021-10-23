<?php
$username = $_POST['username'];
$password1 = $_POST['pass1'];
$password2 = $_POST['pass2'];
$nama = $_POST['nama'];
$email=$_POST['email'];
$sex = $_POST['sex'];
$_SESSION['username'] = $username; 
$_SESSION['nama'] = $nama;
$_SESSION['email'] = $email;
if ($sex == "Pria") $_SESSION['pria'] = "CHECKED";
else $_SESSION['wanita'] = "CHECKED";
if ($password1 != $password2){
?>
    <script language="JavaScript">
    alert('Password konfirmasi tidak sesuai!, silahkan ulang kembali!');
    document.location='?l=formregister.inc';
    </script>
<?php }
else {
$mysqli = new mysqli('localhost','id11991958_root','usbww','id11991958_tokobuku') or die(mysqli_error($mysqli));

$mysqli -> query("INSERT into akun(username, password, nama, email, sex, tanggal_daftar, status) values('$username','$password1','$nama','$email','$sex', now(), 1 )") or die($mysqli-> error);
session_unset();
header("location: ?p=content.inc");}
?>