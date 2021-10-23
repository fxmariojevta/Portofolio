<?php 
    $mysqli = new mysqli('localhost','id11991958_root','usbww','id11991958_tokobuku') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM akun") or die($mysqli->error);
    if($_GET['delete']) {
        $id=$_GET['delete'];
        $mysqli->query("UPDATE akun SET status = 0 WHERE id=$id") or die($mysqli->error());
        header("Location: ?a=akunlist.php");
    }
    if($_GET['restore']) {
        $id=$_GET['restore'];
        $mysqli->query("UPDATE akun SET status = 1 WHERE id=$id") or die($mysqli->error());
        header("Location: ?a=akunlist.php");
    }
?>