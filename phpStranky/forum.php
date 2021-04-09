<?php
	session_start();
	include_once '../skripty/dtb.php';
	$_SESSION['otazka1']="";
	$_SESSION['otazka3']="";
	$_SESSION['otazka4']="";
	$_SESSION['otazka5']="";
	$_SESSION['otazka6']="";
	$_SESSION['otazka7']="";
	$_SESSION['otazka8']="";
	$_SESSION['otazka9']="";
	$_SESSION['otazka10']="";
	$_SESSION['otazka11']="";
	$_SESSION['otazka12']="";
?>
<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Rajdhani&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../Bootstrap/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src='https://www.google.com/recaptcha/api.js?hl=cs'></script>
	<script src="https://cdn.tiny.cloud/1/eoj1vdl030re3i765qa6n3j57jqfnns3nr0518tqoi0f9cvl/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <link rel="shortcut icon" href="../foto/favicon.ico" type="image/x-icon">
  <link rel="icon" href="../foto/favicon.ico" type="image/x-icon">
<title>Unit Roleplay - Fórum</title>
</head>
<body style="font-family: 'Rajdhani', sans-serif !important;">
	<script>	//bezne dostupny skript fb developers (mam ho z overflow)
		function fbshareCurrentPage()
		{window.open("https://www.facebook.com/sharer/sharer.php?u="+escape(window.location.href)+"&t="+document.title, '',
		'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
		return false; }
	</script>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#c3cdd7;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" id="menuUvodLogo" href="../index.php"><img src="../foto/UNIT_PNG.png" class="logoNavbar" alt="navbar logo"></a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0" id="menuUvod">
          <li class="nav-item">
            <a class="nav-link" href="oprojektu.php"><i class="fas fa-clipboard-list" style="margin-right:7px;"></i>O projektu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ateam.php"><i class="fas fa-address-book" style="margin-right:7px;"></i>A-team</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-info-circle" style="margin-right:7px;"></i>
              Pravidla
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="zakprav.php">Základní pravidla</a>
              <a class="dropdown-item" href="frakprav.php">Frakční pravidla</a>
							<a class="dropdown-item" href="police.php">Police Department</a>
							<a class="dropdown-item" href="zakony.php">Zákony</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="twitch.php"><i class="fab fa-twitch" style="margin-right:7px;"></i>Twitch</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="forum.php"><i class="fas fa-book" style="margin-right:7px;"></i>Fórum</a>
          </li>
					<li class="nav-item">
            <a class="nav-link" href="donate.php"><i class="fas fa-donate" style="margin-right:7px;"></i>Donate</a>
          </li>
        </ul>
        <div class="ml-auto" id="profilLinky">
					<a href="https://www.youtube.com/channel/UCMqicaPkmGkEmu9b4QvciJA" target="_blank"><i class="fab fa-youtube" id="youtubeLogo"></i></a>
          <a href="https://discord.gg/CQp2HRT" target="_blank"><i class="fab fa-discord" id="discordLogo"></i></a>
          <a href="https://www.instagram.com/unitrp_/" target="_blank"><i class="fab fa-instagram" id="instagramLogo"></i></a>
					<?php
						if(!isset($_SESSION['idUzivatele'])){
          		echo '<button type="submit" class="btn btn-light btn-lg" data-toggle="modal" data-target="#modalLogin" style="margin-top: -5px;float:right;">Login</button>';
						}
						else{
							echo '<form action="../skripty/odhlaseni.php" method="post" style="float:right;">
								  		 <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
											 if(isset($_SESSION['idUzivatele'])){
		 									 		if($_SESSION['statusUzivatele'] == 0){
														$filename="../profilovka/profile".$_SESSION['idUzivatele']."*";
														$fileinfo=glob($filename);
														$fileext=explode(".",$fileinfo[0]);
														echo '<img src="../profilovka/profile'.$_SESSION['idUzivatele'].'.'.$fileext[3].'" id="profilFoto" style="width:50px!important;height:48px!important;" alt="Profilová fotka"></a>';
											 		}
													else{
														echo '<img src="../profilovka/default.jpg" id="profilFoto" style="width:50px!important;height:48px!important;" alt="Profilová fotka"></a>';
													}
											}
							echo	  '<a id="jmenoUzivateleNavbar" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$_SESSION['jmenoUzivatele'].'</a>

											 <!--DROPDOWN MENU PROFILOVKA-->
											 <div class="dropdown-menu" id="dropMenu">';
												 if($_SESSION['stavBan'] == 0 && $_SESSION['whitelist']== 0)
												 {
													 echo '<button class="dropdown-item" style="cursor:pointer;text-align: center; background-color: #fcdf9f;font-weight: bold;color:black;font-size: 20px;" disabled>Non-Whitelisted</button>';
												 }
												 else if($_SESSION['stavBan'] == 1)
												 {
													 echo '<button class="dropdown-item" style="cursor:pointer; text-align: center; background-color: #e8a49b;font-weight: bold;color:black;font-size: 20px;" disabled>Banned</button>';
												 }
												 else if($_SESSION['stavBan'] == 2)
												 {
													 echo '<button class="dropdown-item" style="cursor:pointer; text-align: center; background-color: #f58273;font-weight: bold;color:black;font-size: 20px;" disabled>Blacklisted</button>';
												 }
												 else if($_SESSION['whitelist']==1)
												 {
													 echo '<button class="dropdown-item" style="cursor:pointer; text-align: center; background-color: #a5cc9f;font-weight: bold;color:black;font-size: 20px;" disabled>Whitelisted</button>';
												 }
								 echo	 '<a class="dropdown-item" href="nastaveni.php">Nastavení</a>
		 										    <a class="dropdown-item" href="mojeZadosti.php">Moje žádosti</a>';
														$emailU=$_SESSION['emailUzivatele'];
														$sql= "SELECT * FROM zadostwhitelist WHERE email='$emailU' ORDER BY id DESC";
						            	  $vys= mysqli_query($pripojeni,$sql);
														$row = mysqli_fetch_assoc($vys);
														$pocetZadosti=mysqli_num_rows ($vys);
														if($pocetZadosti >= 0 && $pocetZadosti <= 3){
															if($_SESSION['whitelist']==0 && $_SESSION['stavBan'] == 0){
																	if($row['schvaleno']==1 || $pocetZadosti == 0){
							 											echo	'<a class="dropdown-item" href="zadost.php">Žádost o Whitelist</a>';
																	}
															}
														}
														if($_SESSION['adminStav'] > 3){
				 											echo	'<a class="dropdown-item" href="zadostiWhitelist.php">Žadatelé o whitelist</a>';
															echo	'<a class="dropdown-item" href="editorPravidel.php">[EDIT] základní pravidla</a>';
                              echo	'<a class="dropdown-item" href="editorFrakPravidel.php">[EDIT] frakční pravidla</a>';
															echo	'<a class="dropdown-item" href="editorPolice.php">[EDIT] Police Department</a>';
															echo	'<a class="dropdown-item" href="editorZakonu.php">[EDIT] zákony</a>';
															echo	'<a class="dropdown-item" href="amenu.php"><i class="fas fa-user-cog" style="margin-right:5px;"></i>Admin list<i class="fas fa-user-cog" style="margin-left:5px;"></i></a>';
														}
														else if($_SESSION['adminStav'] == 1){
															echo	'<a class="dropdown-item" href="zadostiWhitelist.php">Žadatelé o whitelist</a>';
														}
				 							echo			   '<div class="dropdown-divider"></div>
				 										    <button class="dropdown-item" type="submit" style="cursor:pointer;">Odhlásit se</button>
				 										  </div>
			 										<!--KONEC DROPDOWN MENU PROFILOVKA-->
												</form>';
						}
					?>
      </div>
    </div>
  </nav>
  <!--MODAL MODAL MODAL MODAL MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->


			<div class="modal fade seminor-login-modal" data-backdrop="static" id="modalRegistr">
		      <div class="modal-dialog modal-dialog-centered modal-lg">
		        <div class="modal-content">
		          <div class="modal-header">
		           <h5 class="modal-title">Zaregistrujte se</h5>
		          </div>
		          <br>
		          <form class="modal-body seminor-login-form" method="post" action="../skripty/registrace.php">
		            <div class="form-group">
		              <input type="text" class="form-control" name="jmeno">
		              <label class="form-control-placeholder">Uživatelské jméno</label>
		            </div>
		            <div class="form-group">
		              <input type="email" class="form-control" name="email">
		              <label class="form-control-placeholder">E-mail</label>
		            </div>
		            <div class="form-group">
		              <input type="password" class="form-control" name="heslo1">
		              <label class="form-control-placeholder">Heslo (min. 8 znaků)</label>
		            </div>
		            <div class="form-group">
		              <input type="password" class="form-control" name="heslo2">
		              <label class="form-control-placeholder">Potvrzení hesla</label>
		            </div>
								<div class="form-group" style="background-color:unset!important;border:unset!important;height:unset!important;width: 308px;">
								  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="souhlasim_se_zpracovanim_udaju" name="gdprCheck">
								  <label class="form-check-label" for="inlineCheckbox1">Seznámil/a jsem se s <a href="gdpr.php">informacemi o zpracování osobních údajů</a></label>
								</div>
								<div class="g-recaptcha" data-sitekey="6Ldd7fwUAAAAAPCU09wt00lbvnBU6cJxbFoAIdbu" style="display: table;margin-left:auto;margin-right:auto;"></div>
		            <br>
		            <input type="submit" name="registrace" class="loginButton" value="Registrovat se">
		          </form>
		          <br>
		          <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřít</button>
		            </div>
		        </div>
		      </div>
		    </div>

		  <div class="modal fade seminor-login-modal" id="modalLogin" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		      <div class="modal-content">
		        <div class="modal-header">
		          <h5 class="modal-title" id="exampleModalLabel">Přihlásit se</h5>
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span>
		          </button>
		        </div>
		        <div class="modal-body">
							<form class="modal-body" method="post" action="../skripty/login.php">
		                <div class="form-group">
		                  <input type="email" class="form-control" name="email">
		                  <label class="form-control-placeholder">E-mail</label>
		                </div>
		                <div class="form-group">
		                  <input type="password" class="form-control" name="heslo1">
		                  <label class="form-control-placeholder">Heslo</label>
		                </div>
										<div class="create-new-fau text-center pt-3">
											<a href="zapomenuteHeslo.php" class="text-primary-fau">Zapomenuté heslo</a>
		                </div>
		                <input type="submit" name="login" class="loginButton" value="Login">
		                <div class="create-new-fau text-center pt-3">
		                    <a href="#" class="text-primary-fau"><span data-toggle="modal" data-target="#modalRegistr" data-dismiss="modal">Nejste zaregistrovaný? Zaregistrujte se zde!</span></a>
		                </div>
		                <br>
		          </form>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřít</button>
		        </div>
		      </div>
		    </div>
		  </div>

  <!--KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL-->
	<?php
	  $celaURL="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if(strpos($celaURL,"login=uspesny") == true){
			echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Úspěšně jste se přihlásil/a!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"zmenaFormulare=neuspesna") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Něco je špatně! Kontaktujte administrátora!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=recaptcha") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Nevyplnil jste reCAPTCHA ověření! Jste robot?!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=nespravneheslo") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Zadal/a jste špatné heslo!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=nevyplnenepole") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Nezadali jste údaje k přihlášení!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=ucetneexistuje") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Účet s těmito údaji neexistuje!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=gdprproblem") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Pro úspěšnou registraci je třeba souhlasit se zpracováním údajů!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=prazdnekolonky") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Nezadal/a jste žádné údaje k přihlášení!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"finalreg=jeUzPotvrzena") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Vaše adresa byla již potvrzena!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"finalreg=problemStokenem") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Problém s tokenem, kontaktujte správce (MarravinCZ)!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=heslojekratke") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Zadal/a jste příliš krátké heslo!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"login=overteEmail") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Pro přihlášení je třeba ověřit e-mail!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}


		else if(strpos($celaURL,"error=spatnezadejmeno") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Zadané jméno má špatný tvar!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=spatnezadanyemail") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Zadaný e-mail má špatný tvar!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=spatnezadanyemailajmeno") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Zadaný e-mail i jméno má špatný tvar!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}

		else if(strpos($celaURL,"registraceuspesna=success") == true){
			echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Potvrďte si registraci na vašem e-mailu!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"finalreg=uspesna") == true){
			echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Registrace je kompletní, nyní se můžete přihlásit!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"zadost=neschvalena") == true){
			echo	'<div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorMess">
							  Žádost byla úspěšně zamítnuta!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"zadost=schvalena") == true){
			echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Žádost byla úspěšně schválena!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
	?>
  <div class="container" id="textUvod" style="text-align:left;">
    <div class="row">
      <h1 class="uvodVety" style="font-size: 70px;font-weight:bold;">Fórum</h1>
    </div>
    <div class="row">
      <h2 class="uvodVety" style="font-style: italic;">Roleplay is yours…</h2>
    </div>
		<br>
    <div class="row">
			<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<?php
							$celaURL="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
							if($celaURL == "http://unitrp.eu/phpStranky/forum.php" || $celaURL=="http://unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne" || $celaURL == "http://www.unitrp.eu/phpStranky/forum.php" || $celaURL=="http://www.unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne"){

							echo	'<div class="wrapper wrapper-content animated fadeInRight">

										<div class="ibox-content m-b-sm border-bottom">
												<div class="p-xs">
														<div class="pull-left m-r-md">
																<i class="fas fa-book text-navy mid-icon" style="float:left;margin-right:15px;margin-top:5px;"></i>
														</div>
														<h2>Vytvořit příspěvek</h2>
														<span>';
															echo 'Pro přidání libovolného příspěvku k tématu klikněte na tlačítko: <a href="forumEditor.php"><button class="btn btn-light" type="submit" style="margin-left:15px;">Přidat příspěvek</button></a>';
															}
															?>
														</span>
												</div>
										</div>

			<?php
			$celaURL="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if($celaURL == "http://unitrp.eu/phpStranky/forum.php" || $celaURL=="http://unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne" || $celaURL == "http://www.unitrp.eu/phpStranky/forum.php" || $celaURL=="http://www.unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne"){
			$sql = "SELECT *  FROM `prispevkyForum` WHERE `zarazeni` = 1 ORDER BY id DESC"; 	//limit - max int
			$vys= mysqli_query($pripojeni,$sql);
			$pocetZivotopisu=mysqli_num_rows($vys);
			$row = mysqli_fetch_assoc($vys);
			$datum = strtotime($row['datumPridani']);

			echo'
										<div class="ibox-content forum-container">

												<div class="forum-title">
														<div class="pull-right forum-desc">
																<small>Počet životopisů celkem: '.$pocetZivotopisu.'</small>
														</div>
														<h3>Životopisy</h3>
												</div>

												<div class="forum-item active">
														<div class="row">
																<div class="col-md-9">
																		<div class="forum-icon">
																				<i class="fas fa-user-tie fa-2x" style="padding-top:7px;"></i>
																		</div>
																		<a href="vypisZivotopisu.php" class="forum-item-title">Výpis životopisů</a>
																		<div class="forum-sub-title">Zde naleznete vše co se týká životopisů postav!</div>
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																		<span class="views-number">
																				'.$pocetZivotopisu.'
																		</span>
																		<div>
																				<small>Příspěvků</small>
																		</div>
																</div>
														</div>
												</div>';
												if($pocetZivotopisu > 0){
														echo '<div class="forum-item">
					                    <div class="row">
					                        <div class="col-md-9">
					                            <div class="forum-icon">
					                                <i class="fa fa-bolt"></i>
					                            </div>
					                            <a href="forum.php?diskuze'.$row['id'].'" class="forum-item-title">'.$row['titulek'].'</a>
					                            <div class="forum-sub-title">Nejnovější životopis</div>
					                        </div>
					                        <div class="col-md-1 forum-info">
					                     				<span class="views-number">
					                                '.date('d.m.Y', $datum).'
					                            </span>
					                            <div>
					                                <small>Založeno</small>
					                            </div>
					                        </div>
					                        <div class="col-md-1 forum-info">
					                        </div>
					                        <div class="col-md-1 forum-info">
					                            <span class="views-number">';
																				if($row['uzamceno'] == 0){
																					echo '<i class="fas fa-lock-open"></i>';
																				}
																				else if($row['uzamceno'] == 1){
																					echo '<i class="fas fa-lock"></i>';
																				}

					                      echo   '</span>
					                            <div>
					                                <small>Stav</small>
					                            </div>
					                        </div>
					                    </div>';
												}
			         echo   '</div>
										</div>';
								}
		  ?>
			<?php
			$celaURL="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if($celaURL == "http://unitrp.eu/phpStranky/forum.php" || $celaURL=="http://unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne" || $celaURL == "http://www.unitrp.eu/phpStranky/forum.php" || $celaURL=="http://www.unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne"){
			$sql = "SELECT *  FROM `prispevkyForum` WHERE `zarazeni` = 2 ORDER BY id DESC"; 	//limit - max int
			$vys= mysqli_query($pripojeni,$sql);
			$pocetZivotopisu=mysqli_num_rows($vys);
			$row = mysqli_fetch_assoc($vys);
			$datum = strtotime($row['datumPridani']);

			echo'
										<div class="ibox-content forum-container">

												<div class="forum-title">
														<div class="pull-right forum-desc">
																<small>Počet schválených legalních frakcí celkem: '.$pocetZivotopisu.'</small>
														</div>
														<h3>Schvalené legalní frakce</h3>
												</div>

												<div class="forum-item active">
														<div class="row">
																<div class="col-md-9">
																		<div class="forum-icon">
																				<i class="fas fa-briefcase fa-2x" style="padding-top:7px;"></i>
																		</div>
																		<a href="vypisLegals.php" class="forum-item-title" style="color:#007bff!important;">Výpis schválených legálních frakcí</a>
																		<div class="forum-sub-title">Zde naleznete seznam schválených legálních frakcí!</div>
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																		<span class="views-number">
																				'.$pocetZivotopisu.'
																		</span>
																		<div>
																				<small>Příspěvků</small>
																		</div>
																</div>
														</div>
												</div>';
												if($pocetZivotopisu > 0){
													echo '<div class="forum-item">
							                    <div class="row">
							                        <div class="col-md-9">
							                            <div class="forum-icon">
							                                <i class="fa fa-bolt"></i>
							                            </div>
							                            <a href="forum.php?diskuze'.$row['id'].'" class="forum-item-title">'.$row['titulek'].'</a>
							                            <div class="forum-sub-title">Nejnovější schválená legální frakce</div>
							                        </div>
							                        <div class="col-md-1 forum-info">
							                     				<span class="views-number">
							                                '.date('d.m.Y', $datum).'
							                            </span>
							                            <div>
							                                <small>Založeno</small>
							                            </div>
							                        </div>
							                        <div class="col-md-1 forum-info">
							                        </div>
							                        <div class="col-md-1 forum-info">
							                            <span class="views-number">';
																						if($row['uzamceno'] == 0){
																							echo '<i class="fas fa-lock-open"></i>';
																						}
																						else if($row['uzamceno'] == 1){
																							echo '<i class="fas fa-lock"></i>';
																						}

			                      echo   '</span>
			                            <div>
			                                <small>Stav</small>
			                            </div>
			                        </div>
			                    </div>';
												}
			        echo     '</div>
										</div>';
									}
		  ?>
			<?php
			$celaURL="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if($celaURL == "http://unitrp.eu/phpStranky/forum.php" || $celaURL=="http://unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne" || $celaURL == "http://www.unitrp.eu/phpStranky/forum.php" || $celaURL=="http://www.unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne"){
			$sql = "SELECT *  FROM `prispevkyForum` WHERE `zarazeni` = 3 ORDER BY id DESC"; 	//limit - max int
			$vys= mysqli_query($pripojeni,$sql);
			$pocetZivotopisu=mysqli_num_rows($vys);
			$row = mysqli_fetch_assoc($vys);
			$datum = strtotime($row['datumPridani']);

			echo'
										<div class="ibox-content forum-container">

												<div class="forum-title">
														<div class="pull-right forum-desc">
																<small>Počet schválených nelegalních frakcí celkem: '.$pocetZivotopisu.'</small>
														</div>
														<h3>Schvalené nelegalní frakce</h3>
												</div>

												<div class="forum-item active">
														<div class="row">
																<div class="col-md-9">
																		<div class="forum-icon">
																				<i class="fas fa-user-secret fa-2x" style="padding-top:7px;"></i>
																		</div>
																		<a href="vypisNelegals.php" class="forum-item-title" style="color:#f06565!important;">Výpis schválených nelegálních frakcí</a>
																		<div class="forum-sub-title">Zde naleznete seznam schválených nelegálních frakcí!</div>
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																		<span class="views-number">
																				'.$pocetZivotopisu.'
																		</span>
																		<div>
																				<small>Příspěvků</small>
																		</div>
																</div>
														</div>
												</div>';
												if($pocetZivotopisu > 0){
												echo '<div class="forum-item">
			                    <div class="row">
			                        <div class="col-md-9">
			                            <div class="forum-icon">
			                                <i class="fa fa-bolt"></i>
			                            </div>
			                            <a href="forum.php?diskuze'.$row['id'].'" class="forum-item-title">'.$row['titulek'].'</a>
			                            <div class="forum-sub-title">Nejnovější schválená nelegální frakce</div>
			                        </div>
			                        <div class="col-md-1 forum-info">
			                     				<span class="views-number">
			                                '.date('d.m.Y', $datum).'
			                            </span>
			                            <div>
			                                <small>Založeno</small>
			                            </div>
			                        </div>
			                        <div class="col-md-1 forum-info">
			                        </div>
			                        <div class="col-md-1 forum-info">
			                            <span class="views-number">';
																		if($row['uzamceno'] == 0){
																			echo '<i class="fas fa-lock-open"></i>';
																		}
																		else if($row['uzamceno'] == 1){
																			echo '<i class="fas fa-lock"></i>';
																		}

			                      echo   '</span>
			                            <div>
			                                <small>Stav</small>
			                            </div>
			                        </div>
			                    </div>';
												}
			          echo    '</div>
										</div>';
									}
		  ?>
			<?php

			$celaURL="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if($celaURL == "http://unitrp.eu/phpStranky/forum.php" || $celaURL=="http://unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne" || $celaURL == "http://www.unitrp.eu/phpStranky/forum.php" || $celaURL=="http://www.unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne"){
			$sql = "SELECT *  FROM `prispevkyForum` WHERE `zarazeni` = 4 ORDER BY id DESC"; 	//limit - max int
			$vys= mysqli_query($pripojeni,$sql);
			$pocetZivotopisu=mysqli_num_rows($vys);
			$row = mysqli_fetch_assoc($vys);
			$datum = strtotime($row['datumPridani']);

			echo'
										<div class="ibox-content forum-container">

												<div class="forum-title">
														<div class="pull-right forum-desc">
																<small>Počet žádostí o legální frakce: '.$pocetZivotopisu.'</small>
														</div>
														<h3>Žádosti o legální frakce</h3>
												</div>

												<div class="forum-item active">
														<div class="row">
																<div class="col-md-9">
																		<div class="forum-icon">
																				<i class="fas fa-briefcase fa-2x" style="padding-top:7px;"></i>
																		</div>
																		<a href="vypisLegal.php" class="forum-item-title" style="color:#007bff!important;">Výpis žádostí o legální frakce</a>
																		<div class="forum-sub-title">Zde naleznete seznam žádostí o legální frakce!</div>
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																		<span class="views-number">
																				'.$pocetZivotopisu.'
																		</span>
																		<div>
																				<small>Příspěvků</small>
																		</div>
																</div>
														</div>
												</div>';
												if($pocetZivotopisu > 0){
												 echo  '<div class="forum-item">
							                    <div class="row">
							                        <div class="col-md-9">
							                            <div class="forum-icon">
							                                <i class="fa fa-bolt"></i>
							                            </div>
							                            <a href="forum.php?diskuze'.$row['id'].'" class="forum-item-title">'.$row['titulek'].'</a>
							                            <div class="forum-sub-title">Nejnovější žádost o legální frakci</div>
							                        </div>
							                        <div class="col-md-1 forum-info">
							                     				<span class="views-number">
							                                '.date('d.m.Y', $datum).'
							                            </span>
							                            <div>
							                                <small>Založeno</small>
							                            </div>
							                        </div>
							                        <div class="col-md-1 forum-info">
							                        </div>
							                        <div class="col-md-1 forum-info">
							                            <span class="views-number">';
																						if($row['uzamceno'] == 0){
																							echo '<i class="fas fa-lock-open"></i>';
																						}
																						else if($row['uzamceno'] == 1){
																							echo '<i class="fas fa-lock"></i>';
																						}

							                      echo   '</span>
																						<div>
																							<small>Stav</small>
																						</div>
																			</div>
							                        </div>
							                    </div>';
																}

			               echo  '
										 </div>';
									}
		  ?>
			<?php
			$celaURL="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if($celaURL == "http://unitrp.eu/phpStranky/forum.php" || $celaURL=="http://unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne" || $celaURL == "http://www.unitrp.eu/phpStranky/forum.php" || $celaURL=="http://www.unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne"){
			$sql = "SELECT *  FROM `prispevkyForum` WHERE `zarazeni` = 5 ORDER BY id DESC"; 	//limit - max int
			$vys= mysqli_query($pripojeni,$sql);
			$pocetZivotopisu=mysqli_num_rows($vys);
			$row = mysqli_fetch_assoc($vys);
			$datum = strtotime($row['datumPridani']);

			echo'
										<div class="ibox-content forum-container">

												<div class="forum-title">
														<div class="pull-right forum-desc">
																<small>Počet žádostí o nelegální frakce: '.$pocetZivotopisu.'</small>
														</div>
														<h3>Žádosti o nelegální frakce</h3>
												</div>

												<div class="forum-item active">
														<div class="row">
																<div class="col-md-9">
																		<div class="forum-icon">
																				<i class="fas fa-user-secret fa-2x" style="padding-top:7px;"></i>
																		</div>
																		<a href="vypisNelegal.php" class="forum-item-title" style="color:#f06565!important;">Výpis žádostí o nelegální frakce</a>
																		<div class="forum-sub-title">Zde naleznete seznam žádostí o nelegální frakce!</div>
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																		<span class="views-number">
																				'.$pocetZivotopisu.'
																		</span>
																		<div>
																				<small>Příspěvků</small>
																		</div>
																</div>
														</div>
												</div>';
												if($pocetZivotopisu > 0){
													echo '<div class="forum-item">
							                    <div class="row">
							                        <div class="col-md-9">
							                            <div class="forum-icon">
							                                <i class="fa fa-bolt"></i>
							                            </div>
							                            <a href="forum.php?diskuze'.$row['id'].'" class="forum-item-title">'.$row['titulek'].'</a>
							                            <div class="forum-sub-title">Nejnovější žádost o nelegální frakci</div>
							                        </div>
							                        <div class="col-md-1 forum-info">
							                     				<span class="views-number">
							                                '.date('d.m.Y', $datum).'
							                            </span>
							                            <div>
							                                <small>Založeno</small>
							                            </div>
							                        </div>
							                        <div class="col-md-1 forum-info">
							                        </div>
							                        <div class="col-md-1 forum-info">
							                            <span class="views-number">';
																						if($row['uzamceno'] == 0){
																							echo '<i class="fas fa-lock-open"></i>';
																						}
																						else if($row['uzamceno'] == 1){
																							echo '<i class="fas fa-lock"></i>';
																						}

							                      echo   '</span>
							                            <div>
							                                <small>Stav</small>
																					</div>
									                     </div>
																	 </div>';
															}
							         echo  '</div>
											 	</div>';
									}
		  ?>
			<?php
			$celaURL="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if($celaURL == "http://unitrp.eu/phpStranky/forum.php" || $celaURL=="http://unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne" || $celaURL == "http://www.unitrp.eu/phpStranky/forum.php" || $celaURL=="http://www.unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne"){
			$sql = "SELECT *  FROM `prispevkyForum` WHERE `zarazeni` = 6 ORDER BY id DESC"; 	//limit - max int
			$vys= mysqli_query($pripojeni,$sql);
			$pocetZivotopisu=mysqli_num_rows($vys);
			$row = mysqli_fetch_assoc($vys);
			$datum = strtotime($row['datumPridani']);

			echo'<div class="ibox-content forum-container">

												<div class="forum-title">
														<div class="pull-right forum-desc">
																<small>Počet žádostí o druhou postavu: '.$pocetZivotopisu.'</small>
														</div>
														<h3>Žádosti o druhou postavu</h3>
												</div>

												<div class="forum-item active">
														<div class="row">
																<div class="col-md-9">
																		<div class="forum-icon">
																				<i class="fas fa-book fa-2x" style="padding-top:7px;"></i>
																		</div>
																		<a href="vypisPostava.php" class="forum-item-title" style="color:#d1a930!important;">Výpis žádostí o druhou postavu</a>
																		<div class="forum-sub-title">Zde naleznete seznam žádostí o druhou postavu!</div>
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																		<span class="views-number">
																				'.$pocetZivotopisu.'
																		</span>
																		<div>
																				<small>Příspěvků</small>
																		</div>
																</div>
														</div>
												</div>';
												if($pocetZivotopisu > 0){
												echo '<div class="forum-item">
				                    <div class="row">
				                        <div class="col-md-9">
				                            <div class="forum-icon">
				                                <i class="fa fa-bolt"></i>
				                            </div>
				                            <a href="forum.php?diskuze'.$row['id'].'" class="forum-item-title">'.$row['titulek'].'</a>
				                            <div class="forum-sub-title">Nejnovější žádost o druhou postavu</div>
				                        </div>
				                        <div class="col-md-1 forum-info">
				                     				<span class="views-number">
				                                '.date('d.m.Y', $datum).'
				                            </span>
				                            <div>
				                                <small>Založeno</small>
				                            </div>
				                        </div>
				                        <div class="col-md-1 forum-info">
				                        </div>
				                        <div class="col-md-1 forum-info">
				                            <span class="views-number">';
																			if($row['uzamceno'] == 0){
																				echo '<i class="fas fa-lock-open"></i>';
																			}
																			else if($row['uzamceno'] == 1){
																				echo '<i class="fas fa-lock"></i>';
																			}

				                      echo   '</span>
				                            <div>
				                                <small>Stav</small>
				                            </div>
				                        </div>
				                    </div>';
												}
			              echo '
											</div>
										</div>';
									}
		  ?>
			<?php
			$celaURL="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if($celaURL == "http://unitrp.eu/phpStranky/forum.php" || $celaURL=="http://unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne" || $celaURL == "http://www.unitrp.eu/phpStranky/forum.php" || $celaURL=="http://www.unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne"){
			$sql = "SELECT *  FROM `prispevkyForum` WHERE `zarazeni` = 7 ORDER BY id DESC"; 	//limit - max int
			$vys= mysqli_query($pripojeni,$sql);
			$pocetZivotopisu=mysqli_num_rows($vys);
			$row = mysqli_fetch_assoc($vys);
			$datum = strtotime($row['datumPridani']);

			echo'
										<div class="ibox-content forum-container">

												<div class="forum-title">
														<div class="pull-right forum-desc">
																<small>Počet formulářů se zákony: '.$pocetZivotopisu.'</small>
														</div>
														<h3>Zákony</h3>
												</div>

												<div class="forum-item active">
														<div class="row">
																<div class="col-md-9">
																		<div class="forum-icon">
																				<i class="fas fa-gavel fa-2x" style="padding-top:7px;"></i>
																		</div>
																		<a href="vypisZakony.php" class="forum-item-title" style="color:#6cd130!important;">Výpis zákonů</a>
																		<div class="forum-sub-title">Zde naleznete seznam zákonů!</div>
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																		<span class="views-number">
																				'.$pocetZivotopisu.'
																		</span>
																		<div>
																				<small>Příspěvků</small>
																		</div>
																</div>
														</div>
												</div>';
												if($pocetZivotopisu > 0){
												echo '<div class="forum-item">
				                    <div class="row">
				                        <div class="col-md-9">
				                            <div class="forum-icon">
				                                <i class="fa fa-bolt"></i>
				                            </div>
				                            <a href="forum.php?diskuze'.$row['id'].'" class="forum-item-title">'.$row['titulek'].'</a>
				                            <div class="forum-sub-title">Nejnovější zákony</div>
				                        </div>
				                        <div class="col-md-1 forum-info">
				                     				<span class="views-number">
				                                '.date('d.m.Y', $datum).'
				                            </span>
				                            <div>
				                                <small>Založeno</small>
				                            </div>
				                        </div>
				                        <div class="col-md-1 forum-info">
				                        </div>
				                        <div class="col-md-1 forum-info">
				                            <span class="views-number">';
																			if($row['uzamceno'] == 0){
																				echo '<i class="fas fa-lock-open"></i>';
																			}
																			else if($row['uzamceno'] == 1){
																				echo '<i class="fas fa-lock"></i>';
																			}

																			echo   '</span>
																						<div>
																								<small>Stav</small>
																						</div>
																				</div>
																		</div>';
													}
											 echo '</div>
											</div>';
										}
		  ?>
			<?php
			$celaURL="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if($celaURL == "http://unitrp.eu/phpStranky/forum.php" || $celaURL=="http://unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne" || $celaURL == "http://www.unitrp.eu/phpStranky/forum.php" || $celaURL=="http://www.unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne"){
			$sql = "SELECT *  FROM `prispevkyForum` WHERE `zarazeni` = 8 ORDER BY id DESC"; 	//limit - max int
			$vys= mysqli_query($pripojeni,$sql);
			$pocetZivotopisu=mysqli_num_rows($vys);
			$row = mysqli_fetch_assoc($vys);
			$datum = strtotime($row['datumPridani']);

			echo'
										<div class="ibox-content forum-container">

												<div class="forum-title">
														<div class="pull-right forum-desc">
																<small>Počet formulářů se žádostí o unban: '.$pocetZivotopisu.'</small>
														</div>
														<h3>Žádosti o unban</h3>
												</div>

												<div class="forum-item active">
														<div class="row">
																<div class="col-md-9">
																		<div class="forum-icon">
																				<i class="fas fa-ban fa-2x" style="padding-top:7px;"></i>
																		</div>
																		<a href="vypisBan.php" class="forum-item-title" style="color:#e93748!important;">Výpis žádostí o unban</a>
																		<div class="forum-sub-title">Zde naleznete seznam žádostí o unban!</div>
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																</div>
																<div class="col-md-1 forum-info">
																		<span class="views-number">
																				'.$pocetZivotopisu.'
																		</span>
																		<div>
																				<small>Příspěvků</small>
																		</div>
																</div>
														</div>
												</div>';
												if($pocetZivotopisu > 0){
												echo '<div class="forum-item">
				                    <div class="row">
				                        <div class="col-md-9">
				                            <div class="forum-icon">
				                                <i class="fa fa-bolt"></i>
				                            </div>
				                            <a href="forum.php?diskuze'.$row['id'].'" class="forum-item-title">'.$row['titulek'].'</a>
				                            <div class="forum-sub-title">Nejnovější žádosti o unban</div>
				                        </div>
				                        <div class="col-md-1 forum-info">
				                     				<span class="views-number">
				                                '.date('d.m.Y', $datum).'
				                            </span>
				                            <div>
				                                <small>Založeno</small>
				                            </div>
				                        </div>
				                        <div class="col-md-1 forum-info">
				                        </div>
				                        <div class="col-md-1 forum-info">
				                            <span class="views-number">';
																			if($row['uzamceno'] == 0){
																				echo '<i class="fas fa-lock-open"></i>';
																			}
																			else if($row['uzamceno'] == 1){
																				echo '<i class="fas fa-lock"></i>';
																			}

																			echo   '</span>
																						<div>
																								<small>Stav</small>
																						</div>
																				</div>
																		</div>';
													}
											 echo '</div>
											 </div>';
										}
		  ?>
		</div>
		</div>
	</div>
		</div>
	</div>

	<?php
		$celaURL="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$idClanku = substr($celaURL, strrpos($celaURL, 'e')+1);
		if($celaURL == "http://unitrp.eu/phpStranky/forum.php" || $celaURL == "http://www.unitrp.eu/phpStranky/forum.php"){
			echo '<footer id="sticky-footer" class="page-footer py-4 bg-light">
		    <div class="container text-center">
		      <small>Vytvořil Luboš "MarravinCZ" Kučera<br>Copyright &copy; 2020. Všechna práva vyhrazena</small>
		    </div>
		  </footer>';
		}
		if($celaURL == "http://unitrp.eu/phpStranky/forum.php?diskuze".$idClanku || $celaURL=="http://unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne" || $celaURL == "http://www.unitrp.eu/phpStranky/forum.php?diskuze".$idClanku || $celaURL=="http://www.unitrp.eu/phpStranky/forum.php?smazaniDiskuze=uspesne"){
			//************VYPIS DISKUZE***********************************************************************************************************
			$idClanku = substr($celaURL, strrpos($celaURL, 'e')+1);	//tímto beru všechny znaky po posledním znaku "e" diskuze - e na konci

			$sqlZobraz = "SELECT * FROM prispevkyForum WHERE id='$idClanku';";
			$vysZobraz = mysqli_query($pripojeni,$sqlZobraz);

			if(strpos($celaURL,"diskuze".$idClanku."") == true){//zjistuji jestli URL obsahuje clanek s ID, na které uživatel klikne, když chce zobrazit přispěvek
				if($row = mysqli_fetch_assoc($vysZobraz)){
					//***
					$idcko=$row['idUziv'];
					$sqli = "SELECT * FROM uzivatele WHERE id=$idcko"; 	//limit - max int
					$vysi = mysqli_query($pripojeni,$sqli);
					$rowUzivatel = mysqli_fetch_assoc($vysi);
					//**ZDE BERU VSE POTREBNE K ZOBRAZENI FOTKY - ID,CESTU,KONCOVKU(png,jpg...)
					$sessionid=$row['idUziv'];
					$filename="../profilovka/profile".$sessionid."*";
					$fileinfo=glob($filename);
					$fileext=explode(".",$fileinfo[0]);
					$fileactualext=$fileext[3];
					//**VYPIS FOTKY A JMENA

					//****VYPIS TEXTU
					$datumik = strtotime($row['datumPridani']);
					$_SESSION['idDiskuze'] = $row['id'];
					$_SESSION['titulekDiskuze'] = $row['titulek'];
					$_SESSION['textDiskuze'] = $row['text'];

    				echo '<div class="card gedf-card" style="margin-right: 2.7%;margin-left: 2.7%;margin-bottom:20px;margin-top:50px;color:black;">
							<div class="card-header">
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex justify-content-between align-items-center">
										<div class="mr-2">';
											if($rowUzivatel['profilovka'] == 0){
												echo '<img src="../profilovka/profile'.$sessionid.'.'.$fileext[3].'" class="rounded-circle" style="width:45px!important;height:45px!important;" alt="Profilová fotka">';
											}else if($rowUzivatel['profilovka'] == 1){
												echo '<img src="../profilovka/default.jpg" class="rounded-circle" style="width:45px!important;height:45px!important;" alt="Profilová fotka">';
											}
								echo   '</div>
										<div class="ml-2">
											<div class="h4 m-0" style="font-weight:bold;">'.$rowUzivatel['jmeno'].'</div>
											<div class="h7 text-muted"><i class="far fa-calendar-alt" style="margin-right:5px;"></i>'.date('d.m.Y', $datumik).'</div>
										</div>
									</div>';
								if($row['idUziv'] == $_SESSION['idUzivatele'] || $_SESSION['adminStav'] > 3){
								echo  '<div>
										<div class="dropdown">
											<button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="fas fa-cog"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
												<div class="h6 dropdown-header">Konfigurace</div>
												<form action="../skripty/smazatDiskuzi.php" method="post">
													 <button class="dropdown-item" type="submit" style="border:0;" name=smazatDiskuzi>
														 <i class="far fa-trash-alt" style="margin-right:5px;"></i>
														 Odstranit příspěvek
													 </button>
												 </form>
												 <form action="../phpStranky/forumEditorUpravit.php" method="post">
													 <button class="dropdown-item" type="submit" style="border:0;" name=upravitDiskuzi>
														<i class="far fa-edit" style="margin-right:5px;"></i>
														Upravit příspěvek
													 </button>
											  	</form>';
												if($row['zarazeni']==4 && $_SESSION['adminStav'] >=4){
													echo '<form action="../skripty/schvalitZadostForum.php" method="post">
															 <button class="dropdown-item" type="submit" style="border:0;" name=schvalitZadost1>
																<i class="fas fa-thumbs-up" style="margin-right:5px;"></i>
																Schválit žádost
															 </button>
															 	<input type="hidden" name="id" value="'.$row['id'].'">
														  </form>';
												}
												if($row['zarazeni']==5 && $_SESSION['adminStav'] >=4){
													echo '<form action="../skripty/schvalitZadostForum.php" method="post">
															 <button class="dropdown-item" type="submit" style="border:0;" name=schvalitZadost2>
																<i class="fas fa-thumbs-up" style="margin-right:5px;"></i>
																Schválit žádost
															 </button>
															 	<input type="hidden" name="id" value="'.$row['id'].'">
														  </form>';
												}
												if($row['uzamceno']==0){
												echo '<form action="../skripty/uzamknoutDiskuzi.php" method="post">
														 <button class="dropdown-item" type="submit" style="border:0;" name=uzamknoutDiskuzi>
															<i class="fas fa-lock" style="margin-right:5px;"></i>
															Uzamknout příspěvek
														 </button>
													  </form>';
												}
												if ($row['uzamceno'] == 1 && $_SESSION['adminStav'] >= 4){
													echo '<form action="../skripty/odemknoutDiskuzi.php" method="post">
															 <button class="dropdown-item" type="submit" style="border:0;" name=odemknoutDiskuzi>
																<i class="fas fa-lock" style="margin-right:5px;"></i>
																Odemknout příspěvek
															 </button>
															</form>';
												}
												if($_SESSION['adminStav'] >= 4){
													echo '<form action="../skripty/ban.php" method="post">
																<button class="dropdown-item" type="submit" name="ban" style="border:0;">
																	<i class="fas fa-user-times" style="color:#c12e1b;margin-right:5px;"></i>
																	BAN
																</button>
																<input type="hidden" name="idUzivatele" value="'.$row['idUziv'].'">
														  </form>';
												}
									echo '</div>
										</div>
									</div>';
									}
							echo '</div>
							</div>
							<div class="card-body" style="margin-top: 10px;margin-bottom: 10px;margin-left:15px;margin-right:15px;word-break: break-all;">
								<style>
									img{
										width:40%;
										height:30%;
									}
								</style>
								<p class="card-text">'.$row['text'].'
								</p>
							</div>
							<div class="card-footer">';
								if($row['uzamceno']==0){
								echo '<a href="#textAreaKoment" class="card-link"><i class="far fa-comment" style="margin-right:5px;"></i> Komentář</a>';
								}
						  echo '<a href="javascript:fbshareCurrentPage()" target="_blank" alt="Sdílet na Facebooku" class="card-link"><i class="fas fa-share" style="margin-right:5px;"></i>Sdílet</a>
							</div>
						</div>';










				$idClanku = substr($celaURL, strrpos($celaURL, 'e')+1);	//tímto beru všechny znaky po posledním znaku "e" diskuze - e na konci

				$sqlKoment = "SELECT * FROM komentarePrispevku WHERE id_diskuze='$idClanku' order by id;";
				$vysKoment = mysqli_query($pripojeni,$sqlKoment);
				if(mysqli_num_rows($vysKoment)>0){	//pokud sql tabulka neco obsahuje tak se if provede
					while($rowKom = mysqli_fetch_assoc($vysKoment)){	//pomoci tohoto vlastne muzeme pouzit prikaz row. Protože si do něj bereme data z tabulky
						$iduziva = $rowKom['idUzivateleKomentar'];
						$sqlJmeno = "SELECT * FROM uzivatele WHERE id='$iduziva';";
						$vysJmeno = mysqli_query($pripojeni,$sqlJmeno);
						$rowJmeno = mysqli_fetch_assoc($vysJmeno);

						$idcko=$rowKom['idUzivateleKomentar'];
						$filejmeno="../profilovka/profile".$idcko."*";
						$fileinf=glob($filejmeno);
						$filext=explode(".",$fileinf[0]);


						$_SESSION['idKomentare']=$rowKom['id'];


						echo '<div class="container" id="komentForum" style="margin-left:5%; margin-bottom: 20px;">
									 <div class="media comment-box">
										<div class="media-left">';
											if($rowJmeno['profilovka'] == 0){
											echo '<img src="../profilovka/profile'.$rowKom['idUzivateleKomentar'].'.'.$filext[3].'" style="width:50px!important;height:50px!important;" alt="Profilová fotka">';

											}else{
											echo '<img src="../profilovka/default.jpg" style="width:50px!important;height:50px!important;" alt="Profilová fotka">';
											}
						echo		   '</div>
										<div class="media-body" style="word-break: break-all;">';

												  if(isset($_SESSION['idUzivatele']) && $row['uzamceno'] == 0 && $_SESSION['idUzivatele']==$rowKom['idUzivateleKomentar']){
														echo '<h4 class="media-heading" style="font-weight:bold;">'.$rowJmeno['jmeno'].'
																<div class="dropdown" style="float:right;margin-top:-4px;">
																	<button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																	</button>
																	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">';
																		echo	'<form action="../skripty/odstranitKomentar.php" method="post" style="margin-bottom:5px;">
																						 <button class="dropdown-item" type="submit" name="odstranitKomentar" style="margin-right:5px;outline:none;border:0;">
																							<i class="fas fa-trash-alt"></i>
																							Odstranit komentář
																						 </button>
																						 <input type="hidden" name="komentid" value="'.$rowKom['id'].'">
																					  </form>';
																		echo	'<form action="#textAreaKoment" method="post" style="margin-bottom:5px;">
																					<button class="dropdown-item" type="submit" name="upravitKomentar" style="margin-right:5px;outline:none;border:0;">
																						<i class="fas fa-edit"></i>
																						Upravit komentář
																					</button>
																					<input type="hidden" name="idKomentare" value="'.$rowKom['id'].'">
																				</form>';
															echo '</div>
																</div>
															</h4>';
													}
													else if($_SESSION['adminStav'] == 4 || $_SESSION['adminStav'] == 5){
														echo '<h4 class="media-heading" style="font-weight:bold;">'.$rowJmeno['jmeno'].'
														<div class="dropdown" style="float:right;margin-top:-4px;">
															<button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															</button>
															<div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">';
																	echo '<form action="../skripty/ban.php" method="post" style="margin-bottom:5px;">
																				<button class="dropdown-item" type="submit" name="ban" style="border:0;">
																					<i class="fas fa-user-times" style="color:#c12e1b;margin-right:5px;"></i>
																					BAN
																				</button>
																				<input type="hidden" name="idUzivatele" value="'.$rowKom['idUzivateleKomentar'].'">
																		  </form>';
																	echo '<form action="../skripty/odstranitKomentar.php" method="post" style="margin-bottom:5px;">
																				 <button class="dropdown-item" type="submit" name="odstranitKomentar" style="margin-right:5px;outline:none;border:0;">
																					<i class="fas fa-trash-alt"></i>
																					Odstranit komentář
																				 </button>
																				 <input type="hidden" name="komentid" value="'.$rowKom['id'].'">
																			  </form>';
													echo '</div>
														</div>
													</h4>';
													}
													else{
														echo '<h4 class="media-heading">'.$rowJmeno['jmeno'].'</h4>';
													}

											echo '<div style="background-color:white;border: 1px solid #ddd;padding: 10px;">'.$rowKom['komentar'].'</div>';
										echo '</div>
									</div>
							</div>';
					}
				}
			}
				if(isset($_SESSION['idUzivatele']) && $row['uzamceno'] == 0 && $_SESSION['stavBan'] == 0 && $_SESSION['whitelist']==1){
					echo '<div style="margin-left: 8.5%;margin-top:40px;">';
					echo '<p style="font-size:18px;color:white;"><strong>Vložit komentář k tématu</strong></p>';
					if(!isset($_POST['upravitKomentar'])){
					echo '<form id="textAreaKoment" method="post" action="../skripty/pridejKomentar.php">
						  	<textarea name="content" style="width:70%;float:left;">
							</textarea>
							<script>
				        tinymce.init({
				          selector: "textarea",
				          height: 200,
				          plugins: "advlist autolink lists link image charmap print preview hr anchor pagebreak",
				          toolbar_mode: "floating",
				        });
				      </script>
							<button name="submitKomentar" class="btn btn-light btn-lg" type="submit" style="margin-top:10px;float:left;clear:left;margin-bottom:50px;">Přidat komentář</button>
						  </form>';
					}
					else{
					$idDotKom=$_POST['idKomentare'];
					$sqlDotKom="SELECT * FROM komentarePrispevku WHERE id=$idDotKom;";
					$vysDotKom=mysqli_query($pripojeni,$sqlDotKom);
					$rowDotKom=mysqli_fetch_assoc($vysDotKom);
					echo '<form id="textAreaKoment" method="post" action="../skripty/upravitKomentar.php">
						  	<textarea name="content" style="width:70%;float:left;">
							'.$rowDotKom['komentar'].'
							</textarea>
							<script>
				        tinymce.init({
				          selector: "textarea",
				          height: 200,
				          plugins: "advlist autolink lists link image charmap print preview hr anchor pagebreak",
				          toolbar_mode: "floating",
				        });
				      </script>
							<input type="hidden" name="komentid" value="'.$rowDotKom['id'].'">
							<input type="hidden" name="diskuzeid" value="'.$rowDotKom['id_diskuze'].'">
							<button name="sumbitKomentar" style="margin-top:10px;float:left;clear:left;margin-bottom:50px;">Upravit komentář</button>
						  </form>';
					}
					echo '</div>';
				}else if($row['uzamceno'] == 1){
					echo '<div class="container" style="margin-left: 8.5%;color:white;width:unset!important;">';
					echo '<p style="font-size:18px;margin-right:2.7%;"><strong>Diskuze byla uzavřena!</strong></p>';
					echo '</div>';
				}
				else if($_SESSION['stavBan'] == 1){
					echo '<div class="container" style="margin-left: 8.5%;color:white;width:unset!important;">';
					echo '<p style="font-size:18px;margin-right:2.7%;"><strong>Byl jste zabanován tudíž nemůžete komentovat!</strong></p>';
					echo '</div>';
				}
				else if($_SESSION['stavBan'] == 2){
					echo '<div class="container" style="margin-left: 8.5%;color:white;width:unset!important;">';
					echo '<p style="font-size:18px;margin-right:2.7%;"><strong>Jste na blacklistu projektu UnitRP, nemáte možnost komentovat!</strong></p>';
					echo '</div>';
				}
				else if($_SESSION['whitelist'] == 0){
					echo '<div class="container" style="margin-left: 8.5%;color:white;width:unset!important;">';
					echo '<p style="font-size:18px;margin-right:2.7%;"><strong>Bez whitelistu nelze přidávat komentáře!</strong></p>';
					echo '</div>';
				}
				else{
					echo '<div class="container" style="margin-left: 8.5%;color:white;width:unset!important;">';
					echo '<p style="font-size:18px;margin-right:2.7%;"><strong>Pro přidání komenáře je třeba být přihlášen!</strong></p>';
					echo '</div>';
				}
			}
		}
		//***********************************************************************************************************************
		?>
</body>
</html>
