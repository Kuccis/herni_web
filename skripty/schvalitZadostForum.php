<?php
	session_start();
	include_once 'dtb.php';
	$id=$_POST['id'];

	if(isset($_POST['schvalitZadost1'])){
	 $sql = "UPDATE prispevkyForum SET zarazeni=2 WHERE id=?;";
	 $stmt = mysqli_stmt_init($pripojeni);

		 if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../phpStranky/forum.php?diskuze".$_SESSION['idDiskuze']."#schvaleni=neuspesne");
			exit();
		 }else{
			mysqli_stmt_bind_param($stmt,"s",$id);
			mysqli_stmt_execute($stmt);
			header("Location: ../phpStranky/forum.php?diskuze".$_SESSION['idDiskuze']);
			exit();
		 }
	}
  if(isset($_POST['schvalitZadost2'])){
	 $sql = "UPDATE prispevkyForum SET zarazeni=3 WHERE id=?;";
	 $stmt = mysqli_stmt_init($pripojeni);

		 if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../phpStranky/forum.php?diskuze".$_SESSION['idDiskuze']."#schvaleni=neuspesne");
			exit();
		 }else{
			mysqli_stmt_bind_param($stmt,"s",$id);
			mysqli_stmt_execute($stmt);
			header("Location: ../phpStranky/forum.php?diskuze".$_SESSION['idDiskuze']);
			exit();
		 }
	}
?>
