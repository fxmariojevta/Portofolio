<?php
    $id=$_SESSION['akun'];
    $mysqli = new mysqli('localhost','id11991958_root','usbww','id11991958_tokobuku') or die(mysqli_error($mysqli));
    if(isset($_GET['prof'])) {
        $nama = $_POST['nama'];
        $email=$_POST['email'];
        $mysqli -> query("UPDATE akun SET nama = '$nama', email = '$email' WHERE id=$id") or die($database->error());
        header("location: ?a=akun.php");
    }
    else if(isset($_GET['pass'])) {
        $result = $mysqli -> query("SELECT * FROM akun WHERE id=$id") or die($database->error());
        $data = $result->fetch_assoc();
        $password0 = $_POST['pass0'];
        $password1 = $_POST['pass1'];
        $password2 = $_POST['pass2'];
        if ($password0 != $data['password']){
            ?>
                <script language="JavaScript">
                alert('Password lama tidak sesuai!, silahkan ulang kembali!');
                document.location='?a=edit-prof.php&pass';
                </script>
        <?php }
        else if ($password1 != $password2){
            ?>
                <script language="JavaScript">
                alert('Password konfirmasi tidak sesuai!, silahkan ulang kembali!');
                document.location='?a=edit-prof.php&pass';
                </script>
        <?php }
        else {
            $mysqli -> query("UPDATE akun SET password = '$password2' WHERE id=$id") or die($database->error());
            header("location: ?a=akun.php");
        }
    }
    
    
?>