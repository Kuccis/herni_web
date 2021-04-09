<?php
session_start();
include_once 'dtb.php';

$id = $_SESSION['idUzivatele'];
$pravidlaNove = $_POST['content'];
$datum = date("Y.m.d");


if(isset($_POST['submitUpravu']))
{
	if(empty($pravidlaNove)){
		header("Location: ../phpStranky/editorFrakPravidel.php?error=zadnyText");
		exit();	//dokud neopravi chybu, kod pod timto ifem se neprovede
	}
	else {
		$sql = "UPDATE frakcnipravidla SET text=?,datum=?,idUpravujiciho=? WHERE id=1";
		$stmt = mysqli_stmt_init($pripojeni);
  		if(!mysqli_stmt_prepare($stmt,$sql)){	//mysqli_stmt_prepare pripravuje sql prikaz k provedeni ale pokud nelze z nejakeho duvodu provest - vyhodime error
  			header("Location: ../phpStranky/editorFrakPravidel.php?zmenaPravidel=neuspesna");
  			exit();
  		}
      else{
  			mysqli_stmt_bind_param($stmt,"sss",$pravidlaNove,$datum,$id);	//urceni parametru, ktere chceme updatovat
  			mysqli_stmt_execute($stmt);	//provedeni dotazu
  			header("Location: ../phpStranky/editorFrakPravidel.php?zmenaPravidel=uspesna");
  			exit();
  		}
    }
}
