<?php
session_start();
include_once 'dtb.php';
if(isset($_POST['odeslatZadost'])){
    $jmeno=$_SESSION['jmenoUzivatele'];
    $email=$_SESSION['emailUzivatele'];
    $otazka1=$_POST['otazka1'];
    $otazka2=$_POST['otazka2'];
    $otazka3=$_POST['otazka3'];
    $otazka4=$_POST['otazka4'];
    $otazka5=$_POST['otazka5'];
    $otazka6=$_POST['otazka6'];
    $otazka7=$_POST['otazka7'];
    $otazka8=$_POST['otazka8'];
    $otazka9=$_POST['otazka9'];
    $otazka10=$_POST['otazka10'];
    $otazka11=$_POST['otazka11'];
    $otazka12=$_POST['otazka12'];
    $otazka13=$_POST['otazka13'];
	  $datum = date("Y-m-d");
    if(empty($otazka1))
    {
      $_SESSION['otazka3']=$otazka3;
      $_SESSION['otazka4']=$otazka4;
      $_SESSION['otazka5']=$otazka5;
      $_SESSION['otazka6']=$otazka6;
      $_SESSION['otazka7']=$otazka7;
      $_SESSION['otazka8']=$otazka8;
      $_SESSION['otazka9']=$otazka9;
      $_SESSION['otazka10']=$otazka10;
      $_SESSION['otazka11']=$otazka11;
      $_SESSION['otazka12']=$otazka12;
      header("Location: ../phpStranky/zadost.php?ot1=error");
			exit();
    }
    else if(empty($otazka4)){
      $_SESSION['otazka1']=$otazka1;
      $_SESSION['otazka3']=$otazka3;
      $_SESSION['otazka5']=$otazka5;
      $_SESSION['otazka6']=$otazka6;
      $_SESSION['otazka7']=$otazka7;
      $_SESSION['otazka8']=$otazka8;
      $_SESSION['otazka9']=$otazka9;
      $_SESSION['otazka10']=$otazka10;
      $_SESSION['otazka11']=$otazka11;
      $_SESSION['otazka12']=$otazka12;
      header("Location: ../phpStranky/zadost.php?ot4=error");
			exit();
    }
    else if(empty($otazka5)){
      $_SESSION['otazka1']=$otazka1;
      $_SESSION['otazka3']=$otazka3;
      $_SESSION['otazka4']=$otazka4;
      $_SESSION['otazka6']=$otazka6;
      $_SESSION['otazka7']=$otazka7;
      $_SESSION['otazka8']=$otazka8;
      $_SESSION['otazka9']=$otazka9;
      $_SESSION['otazka10']=$otazka10;
      $_SESSION['otazka11']=$otazka11;
      $_SESSION['otazka12']=$otazka12;
      header("Location: ../phpStranky/zadost.php?ot5=error");
			exit();
    }
    else if(empty($otazka6)){
      $_SESSION['otazka1']=$otazka1;
      $_SESSION['otazka3']=$otazka3;
      $_SESSION['otazka4']=$otazka4;
      $_SESSION['otazka5']=$otazka5;
      $_SESSION['otazka7']=$otazka7;
      $_SESSION['otazka8']=$otazka8;
      $_SESSION['otazka9']=$otazka9;
      $_SESSION['otazka10']=$otazka10;
      $_SESSION['otazka11']=$otazka11;
      $_SESSION['otazka12']=$otazka12;
      header("Location: ../phpStranky/zadost.php?ot6=error");
			exit();
    }
    else if(empty($otazka7)){
      $_SESSION['otazka1']=$otazka1;
      $_SESSION['otazka3']=$otazka3;
      $_SESSION['otazka4']=$otazka4;
      $_SESSION['otazka5']=$otazka5;
      $_SESSION['otazka6']=$otazka6;
      $_SESSION['otazka8']=$otazka8;
      $_SESSION['otazka9']=$otazka9;
      $_SESSION['otazka10']=$otazka10;
      $_SESSION['otazka11']=$otazka11;
      $_SESSION['otazka12']=$otazka12;
      header("Location: ../phpStranky/zadost.php?ot7=error");
			exit();
    }
    else if(empty($otazka8)){
      $_SESSION['otazka1']=$otazka1;
      $_SESSION['otazka3']=$otazka3;
      $_SESSION['otazka4']=$otazka4;
      $_SESSION['otazka5']=$otazka5;
      $_SESSION['otazka6']=$otazka6;
      $_SESSION['otazka7']=$otazka7;
      $_SESSION['otazka9']=$otazka9;
      $_SESSION['otazka10']=$otazka10;
      $_SESSION['otazka11']=$otazka11;
      $_SESSION['otazka12']=$otazka12;
      header("Location: ../phpStranky/zadost.php?ot8=error");
			exit();
    }
    else if(empty($otazka9)){
      $_SESSION['otazka1']=$otazka1;
      $_SESSION['otazka3']=$otazka3;
      $_SESSION['otazka4']=$otazka4;
      $_SESSION['otazka5']=$otazka5;
      $_SESSION['otazka6']=$otazka6;
      $_SESSION['otazka7']=$otazka7;
      $_SESSION['otazka8']=$otazka8;
      $_SESSION['otazka10']=$otazka10;
      $_SESSION['otazka11']=$otazka11;
      $_SESSION['otazka12']=$otazka12;
      header("Location: ../phpStranky/zadost.php?ot9=error");
			exit();
    }
    else if(empty($otazka10)){
      $_SESSION['otazka1']=$otazka1;
      $_SESSION['otazka3']=$otazka3;
      $_SESSION['otazka4']=$otazka4;
      $_SESSION['otazka5']=$otazka5;
      $_SESSION['otazka6']=$otazka6;
      $_SESSION['otazka7']=$otazka7;
      $_SESSION['otazka8']=$otazka8;
      $_SESSION['otazka9']=$otazka9;
      $_SESSION['otazka11']=$otazka11;
      $_SESSION['otazka12']=$otazka12;
      header("Location: ../phpStranky/zadost.php?ot10=error");
			exit();
    }
    else if(empty($otazka11)){
      $_SESSION['otazka1']=$otazka1;
      $_SESSION['otazka3']=$otazka3;
      $_SESSION['otazka4']=$otazka4;
      $_SESSION['otazka5']=$otazka5;
      $_SESSION['otazka6']=$otazka6;
      $_SESSION['otazka7']=$otazka7;
      $_SESSION['otazka8']=$otazka8;
      $_SESSION['otazka9']=$otazka9;
      $_SESSION['otazka10']=$otazka10;
      $_SESSION['otazka12']=$otazka12;
      header("Location: ../phpStranky/zadost.php?ot11=error");
			exit();
    }
    else if(empty($otazka12)){
      $_SESSION['otazka1']=$otazka1;
      $_SESSION['otazka3']=$otazka3;
      $_SESSION['otazka4']=$otazka4;
      $_SESSION['otazka5']=$otazka5;
      $_SESSION['otazka6']=$otazka6;
      $_SESSION['otazka7']=$otazka7;
      $_SESSION['otazka8']=$otazka8;
      $_SESSION['otazka9']=$otazka9;
      $_SESSION['otazka10']=$otazka10;
      $_SESSION['otazka11']=$otazka11;
      header("Location: ../phpStranky/zadost.php?ot12=error");
			exit();
    }
    else{
      $sql="INSERT INTO zadostwhitelist (jmeno,email,otazka1,otazka2,otazka3,otazka4,otazka5,otazka6,otazka7,otazka8,otazka9,otazka10,otazka11,otazka12,otazka13,datum) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
  	  $stmt = mysqli_stmt_init($pripojeni);
  	  if(!mysqli_stmt_prepare($stmt,$sql)){
  			header("Location: ../phpStranky/zadost.php?error=sqlerror");
  			exit();
  	  }
  	  else{
  		mysqli_stmt_bind_param($stmt, "ssssssssssssssss",$jmeno,$email,$otazka1,$otazka2,$otazka3,$otazka4,$otazka5,$otazka6,$otazka7,$otazka8,$otazka9,$otazka10,$otazka11,$otazka12,$otazka13,$datum);
  		mysqli_stmt_execute($stmt);
      header("Location: ../phpStranky/mojeZadosti.php?zadost=odeslana");
  		exit();
  	  }
    }
	}
?>
