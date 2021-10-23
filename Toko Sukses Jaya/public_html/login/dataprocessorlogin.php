<?php
$mysqli = new mysqli('localhost','id11991958_root','usbww','id11991958_tokobuku') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * from akun where username = '".$_POST['username']."'") or die($mysqli-> error);
$isi = $result-> fetch_assoc();
$hasil = mysqli_num_rows($result);
if (!$hasil >= 1){
?>
            <script language="JavaScript">
            alert('Username / Password salah!, silahkan ulang kembali!');
            document.location='?l=formlogin.inc';
            </script>
<?php }

else {
	if ($isi['id']==1 && $_POST['pass'] == $isi['password']){
        $_SESSION['admin']="admin";
        header("location: ?p=content.inc");
    } elseif($isi['id']>1 && $_POST['pass'] == $isi['password']){
        $_SESSION['akun']=$isi['id'];
	    header("location: ?p=content.inc");
    }
    else {
        ?>
            <script language="JavaScript">
            alert('Username / Password salah!, silahkan ulang kembali!');
            document.location='?l=formlogin.inc';
            </script>
        <?php
    }
}
?>