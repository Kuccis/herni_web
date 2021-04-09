<?php
session_start();
include_once 'dtb.php';

if(isset($_POST['submitSmazat'])){
		 $id=$_POST['idUzivatele'];
		 $sql = "UPDATE uzivatele SET profilovka=1 WHERE id=?;";
		 $stmt = mysqli_stmt_init($pripojeni);
		 if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../phpStranky/nastaveni.php?smazani=neuspesne");
			exit();
		 }else{
			mysqli_stmt_bind_param($stmt,"s",$id);
			mysqli_stmt_execute($stmt);
			$_SESSION['statusUzivatele']=$row['profilovka'];

			 $jmenoFoto="../profilovka/profile".$id."*";
			 $fotoinfo=glob($jmenoFoto);
			 $fotoext=explode(".",$fotoinfo[0]);
			 $fotoKonc=$fotoext[3];

			 $foto = "../profilovka/profile".$id.".".$fotoKonc;

			 if(!unlink($foto)){
				$_SESSION['statusUzivatele']=1;
			 }else{
				$_SESSION['statusUzivatele']=1;
			 }
			 header("Location: ../phpStranky/nastaveni.php?smazaniFoto=uspesne");
			 exit();
		}
}
if(isset($_POST['odstranitProfilovouFoto'])){

	   $id=$_POST['idUzivatele'];
		 $sql = "UPDATE uzivatele SET profilovka=1 WHERE id=?;";
		 $stmt = mysqli_stmt_init($pripojeni);
		 if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../phpStranky/amenu.php?smazaniProfiloveFotky=neuspesne");
			exit();
		 }else{
			 mysqli_stmt_bind_param($stmt,"s",$id);
			 mysqli_stmt_execute($stmt);
			 $jmenoFoto="../profilovka/profile".$id."*";
			 $fotoinfo=glob($jmenoFoto);
			 $fotoext=explode(".",$fotoinfo[0]);
			 $fotoKonc=$fotoext[3];

			 $foto = "../profilovka/profile".$id.".".$fotoKonc;

			 if(!unlink($foto)){
			 }else{
				 if($_SESSION['idUzivatele'] == $id){
				 	$_SESSION['statusUzivatele']=1;
				 }

			 }
			 header("Location: ../phpStranky/amenu.php?smazaniProfiloveFotografie=uspesne");
			 exit();
		}
	}
?>
