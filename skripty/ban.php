<?php
	session_start();
	include_once 'dtb.php';
	$id=$_SESSION['idUzivateleMenu'];

	if(isset($_POST['banNastroj'])){
		if(isset($_SESSION['idUzivateleMenu'] != ""))
		{
			 $sql = "UPDATE uzivatele SET ban=1 WHERE id='$id';";
		 	 $vys=mysqli_query($pripojeni,$sql); //provedeme prikaz
		 	 header("Location: ../pages/amenu.php?uzivatel==zabanovan");
		 	 exit();
		}
	}
?>
