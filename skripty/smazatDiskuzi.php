<?php
	session_start();
	include_once 'dtb.php';
	$idClanku=$_SESSION['idDiskuze'];

	if(isset($_POST['smazatDiskuzi'])){
	 //mazani prispevku
	 $sql = "DELETE FROM prispevkyForum WHERE id=?;";
	 $stmt = mysqli_stmt_init($pripojeni);
	 //mazani komentaru prispevku
	 $sqlKom = "DELETE FROM komentarePrispevku WHERE id_diskuze=?;";
	 $stmtKom = mysqli_stmt_init($pripojeni);

	 if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location: ../phpStranky/forum.php?smazaniDiskuze=neuspesne");
		exit();
	 }
     if(!mysqli_stmt_prepare($stmtKom,$sqlKom)){
		exit();
	 }else{
		//mazani prispevku
		mysqli_stmt_bind_param($stmt,"s",$idClanku);
		mysqli_stmt_execute($stmt);
		//mazani komentaru prispevku
		mysqli_stmt_bind_param($stmtKom,"s",$idClanku);
		mysqli_stmt_execute($stmtKom);
		header("Location: ../phpStranky/forum.php?smazaniDiskuze=uspesne");
	 	exit();
	 }
	}
?>
