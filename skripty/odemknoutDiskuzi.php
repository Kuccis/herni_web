<?php
session_start();
include_once 'dtb.php';

$idDiskuze=$_SESSION['idDiskuze'];

if(isset($_POST['odemknoutDiskuzi']))
{
		$sql = "UPDATE prispevkyForum SET uzamceno=0 WHERE id=?;";
		$stmt = mysqli_stmt_init($pripojeni);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../phpStranky/forum.php?uzamceni=neuspesne");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt,"s",$idDiskuze);
			mysqli_stmt_execute($stmt);
			header("Location: ../phpStranky/forum.php?diskuze".$idDiskuze);
		}
		exit();
}
