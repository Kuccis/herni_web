<?php
	session_start();
	include_once 'dtb.php';
	$idKomentare=$_POST['komentid'];

	if(isset($_POST['odstranitKomentar'])){
	 $sql = "DELETE FROM komentarePrispevku WHERE id=?;";
	 $stmt = mysqli_stmt_init($pripojeni);

		 if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../phpStranky/nastaveni.php?odstranenikomentare=neuspesne");
			exit();
		 }else{
			mysqli_stmt_bind_param($stmt,"s",$idKomentare);
			mysqli_stmt_execute($stmt);
			header("Location: ../phpStranky/forum.php?diskuze".$_SESSION['idDiskuze']);
			exit();
		 }
	}
?>
