<?php
	session_start();
	include_once 'dtb.php';
	$id=$_POST['idUzivatele'];

	if(isset($_POST['banNastroj'])){
	 $sql = "UPDATE uzivatele SET ban=2 WHERE id='$id';";
	 $vys=mysqli_query($pripojeni,$sql); //provedeme prikaz
	 header("Location: ../phpStranky/amenu.php?uzivatel==blacklisted");
	 exit();
	}
?>
