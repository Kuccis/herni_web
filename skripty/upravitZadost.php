<?php
session_start();
include_once 'dtb.php';

$id = $_POST['id'];
$titulekNovy = $_POST['textNazev'];
$diskuzeNovy = $_POST['content'];

if(isset($_POST['submitUpravit']))
{
	if(empty($titulekNovy)){
		header("Location: ../phpStranky/forumEditorUpravit.php?error=nezadanytitulek");
		exit();	//dokud neopravi chybu, kod pod timto ifem se neprovede
	}
	else if(empty($diskuzeNovy)){
		header("Location: ../phpStranky/forumEditorUpravit.php?error=nevyplnenytext");
		exit();
	}
	else {
		$sql = "UPDATE prispevkyForum SET titulek=?,text=? WHERE id = '$id';";
		$stmt = mysqli_stmt_init($pripojeni);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../phpStranky/forum.php?zmenaFormulare=neuspesna");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt,"ss",$titulekNovy,$diskuzeNovy);
			mysqli_stmt_execute($stmt);
			header("Location: ../phpStranky/forum.php?diskuze".$id);
		}
    }
}
?>
