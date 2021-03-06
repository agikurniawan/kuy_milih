<?php
session_start();
if(!isset($_SESSION['siswa']) || !isset($_GET['id'])) {
   header('location:./');
}

define('BASEPATH', dirname(__FILE__));

require('../include/connection.php');

$thn     = date('Y');
$dpn     = date('Y') + 1;
$periode = $thn.'/'.$dpn;
$suara   = $_GET['s'] + 1;

//update suara
$update  = $con->prepare("UPDATE t_calon_rt SET suara = ? WHERE id_rt = ?") or die($con->error);
$update->bind_param('is', $suara, $_GET['id']);
$update->execute();

//simpan data pemilih
$save = $con->prepare("INSERT INTO t_hasil_pemilih_rt(nis, periode) VALUES(?,?)") or die($con->error);
$save->bind_param('ss', $_SESSION['siswa'], $periode);
$save->execute();

unset($_SESSION['siswa']);

header('location:./index.php?page=thanks');
?>
