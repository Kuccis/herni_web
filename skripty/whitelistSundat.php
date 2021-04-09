<?php
session_start();
include_once 'dtb.php';

if(isset($_POST['whitelistOff'])){

    $email=$_POST['emailZadatele'];
    $sqli = "UPDATE uzivatele SET whitelist=0 WHERE email='$email';";
	  $vysi=mysqli_query($pripojeni,$sqli); //provedeme prikaz
    header("Location: ../phpStranky/zadostiWhitelist.php?whitelist=off");
		exit();
}
if(isset($_POST['unwl'])){
    $id=$_POST['idUzivatele'];
    $sqli = "UPDATE uzivatele SET whitelist=0 WHERE id=$id;";
	  $vysi=mysqli_query($pripojeni,$sqli); //provedeme prikaz
    header("Location: ../phpStranky/amenu.php?whitelist=off");
		exit();
}
?>
