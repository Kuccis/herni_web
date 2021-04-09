<?php
session_start();
include_once 'dtb.php';

  if(isset($_POST['whitelistOn'])){

    $email=$_POST['emailZadatele'];
    $sqli = "UPDATE uzivatele SET whitelist=1 WHERE email='$email';";
	  $vysi=mysqli_query($pripojeni,$sqli); //provedeme prikaz
    header("Location: ../phpStranky/zadostiWhitelist.php?whitelist=on");
		exit();
	}
  if(isset($_POST['wl'])){
      $id=$_POST['idUzivatele'];
      $sqli = "UPDATE uzivatele SET whitelist=1 WHERE id=$id;";
  	  $vysi=mysqli_query($pripojeni,$sqli); //provedeme prikaz
      header("Location: ../phpStranky/amenu.php?whitelist=on");
  		exit();
  	}
?>
