<?php 
    $mysqli = new mysqli('localhost','id11991958_root','usbww','id11991958_tokobuku') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM buku") or die($mysqli->error);
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $mysqli->query("UPDATE buku SET status = 1 WHERE id=$id") or die($mysqli->error());
        header("Location: ?m=all.php");
    }
?>