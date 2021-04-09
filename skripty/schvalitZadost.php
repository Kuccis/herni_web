<?php
session_start();
include_once 'dtb.php';

if(isset($_POST['schvalitZadost'])){

    $id=$_POST['schvalitZadostValue'];
	  $datum = date("Y-m-d");

	  $sql="UPDATE zadostwhitelist SET datum=? WHERE id=$id";
	  $stmt = mysqli_stmt_init($pripojeni);
	  if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../index.php?error=sqlerror");
			exit();
	  }
	  else{
		mysqli_stmt_bind_param($stmt, "s",$datum);
		mysqli_stmt_execute($stmt);

    $sqli = "UPDATE zadostwhitelist SET schvaleno=2 WHERE id=$id;";
	  $vysi=mysqli_query($pripojeni,$sqli); //provedeme prikaz

    header("Location: ../index.php?zadost=schvalena");
		exit();
	  }
	}
  if(isset($_POST['zamitnoutZadost'])){

      $id=$_POST['schvalitZadostValue'];
  	  $datum = date("Y-m-d");

  	  $sql="UPDATE zadostwhitelist SET datum=? WHERE id=$id";
  	  $stmt = mysqli_stmt_init($pripojeni);
  	  if(!mysqli_stmt_prepare($stmt,$sql)){
  			header("Location: ../index.php?error=sqlerror");
  			exit();
  	  }
  	  else{
  		mysqli_stmt_bind_param($stmt, "s",$datum);
  		mysqli_stmt_execute($stmt);

      $sqli = "UPDATE zadostwhitelist SET schvaleno=1 WHERE id=$id;";
  	  $vysi=mysqli_query($pripojeni,$sqli); //provedeme prikaz

      header("Location: ../index.php?zadost=neschvalena");
  		exit();
  	  }
  	}
?>
