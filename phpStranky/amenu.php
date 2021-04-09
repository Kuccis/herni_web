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

  <link rel="shortcut icon" href="../foto/favicon.ico" type="image/x-icon">
  <link rel="icon" href="../foto/favicon.ico" type="image/x-icon">
<title>Unit Roleplay - A-team</title>
</head>
<body>

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
														echo '<img src="../profilovka/profile'.$_SESSION['idUzivatele'].'.'.$fileext[3].'" id="profilFoto" width="50" height="45" alt="Profilová fotka"></a>';
											 		}
													else{
														echo '<img src="../profilovka/default.jpg" id="profilFoto" width="50" height="48" alt="Profilová fotka"></a>';
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

	if(strpos($celaURL,"uzivatel==zabanovan") == true){
		echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							<strong>Úspěšně jste zabanoval uživatele!</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
	}
	else if(strpos($celaURL,"uzivatel==blacklisted") == true){
		echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							<strong>Úspěšně jste přidal uživatele na blacklist!</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
	}
	else if(strpos($celaURL,"uzivatel==unbanned") == true){
		echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							<strong>Úspěšně jste unBANoval uživatele!</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
	}
	else if(strpos($celaURL,"uzivatel==smazan") == true){
		echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							<strong>Úspěšně jste smazal profil uživatele!</strong>
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
	else if(strpos($celaURL,"whitelist=off") == true){
		echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							<strong>Úspěšně jste odebrali roli whitelisted!</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
	}
	else if(strpos($celaURL,"whitelist=on") == true){
		echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							<strong>Úspěšně jste přidali roli whitelisted!</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
	}
	else if(strpos($celaURL,"smazaniProfiloveFotografie=uspesne") == true){
		echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							<strong>Úspěšně jste smazal profilovou fotografii uživatele!</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
	}
	else if(strpos($celaURL,"smazaniProfiloveFotky=neuspesne") == true){
		echo	'<div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorMess">
							<strong>Pozor!</strong> Profilová fotografie uživatele se nesmazala! Kontaktujte administrátora (MarravinCZ)
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
	}

	$celaURL="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$idClanku = substr($celaURL, strrpos($celaURL, 'a')+1);
	if(isset($_SESSION['idUzivatele'])){
	if($_SESSION['adminStav'] == 4 || $_SESSION['adminStav'] == 5){
		if($celaURL == "http://unitrp.eu/phpStranky/amenu.php" || $celaURL == "http://unitrp.eu/phpStranky/amenu.php?uzivatel==zabanovan" || $celaURL == "http://unitrp.eu/phpStranky/amenu.php?uzivatel==unbanned"
			 || $celaURL == "http://unitrp.eu/phpStranky/amenu.php?uzivatel==smazan" || $celaURL == "http://unitrp.eu/phpStranky/amenu.php?smazaniProfiloveFotografie=uspesne" || $celaURL == "http://unitrp.eu/phpStranky/amenu.php?smazaniProfiloveFotky=neuspesne"
			  || $celaURL == "http://unitrp.eu/phpStranky/amenu.php?whitelist=on" || $celaURL == "http://unitrp.eu/phpStranky/amenu.php?whitelist=off" || $celaURL == "http://unitrp.eu/phpStranky/amenu.php?whitelist=off"){
			echo '<div class="container" id="textUvod">
				<div class="row">
					<h1 class="uvodVety" style="font-size: 70px;font-weight: bold;">Výpis všech registrovaných uživatelů</h1>
				</div>
				<div class="row">
					<h2 class="uvodVety" style="font-style: italic;">Roleplay is yours…</h2>
				</div>
				<br>
				<div class="row" style="background-color: rgba(103, 103, 103, 0.74);border-radius: 5px;">';
								$sql= "SELECT * FROM uzivatele ORDER BY id DESC";
								$vys= mysqli_query($pripojeni,$sql);

								echo '<div class="container" style="margin-top:2%;">
										<div class="row">
											<div class="col-md-12">
												<h2>
													Zde naleznete výpis všech žádostí o whitelist
												</h2>
													<h3>
														Výpis:
													</h3>
												<div class="table-responsive">
												<table class="table table-condensed table-hover">
													<thead>
														<tr>
															<th>
																Id
															</th>
															<th>
																Jméno
															</th>
															<th>
																Email
															</th>
															<th>
																Profilová fotografie
															</th>
															<th>
																Úroveň účtu
															</th>
															<th>
															</th>
														</tr>
													</thead>
													<tbody>';
														while($row = mysqli_fetch_assoc($vys)){
															echo	'<tr>
																			<td class="tabFormWl">
																				'.$row['id'].'
																			</td>
																			<td class="tabFormWl">
																				'.$row['jmeno'].'
																			</td>
																			<td class="tabFormWl">
																				'.$row['email'].'
																			</td>
																			<td>';
																				if($row['profilovka'] == 0)
																			  {
																				$fileN="../profilovka/profile".$row['id']."*";
																				$fileI=glob($fileN);
																				$fileE=explode(".",$fileI[0]);
																				echo '<a href="../profilovka/profile'.$row['id'].'.'.$fileE[3].'">
																						<img src="../profilovka/profile'.$row['id'].'.'.$fileE[3].'" width="50" height="45" alt="Profilová fotka">
																					  </a>';
																			  }
																			  else{
																						echo '<a href="../profilovka/default.jpg">
																										<img src="../profilovka/default.jpg" width="50" height="45" alt="Profilová fotka">
																									 </a>';
																			  }
																	echo   '</td>';
																echo	'<td class="tabFormWl">';
																				 if($row['admin'] == 0){
																					 if($row['whitelist'] == 0 && $row['ban']==0)
																					 {
																						 echo 'Non-whitelisted';
																					 }
																					 else if($row['whitelist']==1 && $row['ban']==0)
																					 {
																						 echo 'Whitelisted';
																					 }
																					 else if($row['ban']==1)
																					 {
																						 echo '<div style="color:darkred;">Banned</div>';
																					 }
																					 else if($row['ban']==2)
																					 {
																						 echo '<div style="color:darkred;">Blacklisted</div>';
																					 }
																				 }
																				 else if($row['admin'] == 1 && $row['ban']==0){
																					 echo 'Whitelister';
																				 }
																				 else if($row['admin'] == 2 && $row['ban']==0){
																					 echo 'Grafik';
																				 }
																				 else if($row['admin'] == 3 && $row['ban']==0){
																					 echo 'Developer';
																				 }
																				 else if($row['admin'] == 4 && $row['ban']==0){
																					 echo 'Administrátor';
																				 }
																				 else if($row['admin'] == 5 && $row['ban']==0){
																					 echo 'Majitel';
																				 }
																				 else if($row['ban'] == 1){
																				 	 echo '<div style="color:darkred;">Banned</div>';
																				 }
																				 else if($row['ban'] == 2){
																					 echo '<div style="color:darkred;">Blacklisted</div>';
																				 }
																echo  '</td>
																<td>
																<div class="dropdown" style="margin-top:-7px;">
																		<button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
																			Možnosti
																		</button>
																		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">';
																				if($row['ban']==0){
																					echo '<form action="../skripty/ban.php" method="post" style="margin-bottom:5px;">
																							<button class="dropdown-item" type="submit" name="banNastroj" style="border:0;cursor:pointer;">
																								<i class="fas fa-user-times" style="color:#c12e1b;margin-right:5px;"></i>
																								BAN
																							</button>
																							<input type="hidden" name="idUzivatele" value="'.$row['id'].'">
																						</form>';
																					echo '<form action="../skripty/blacklisted.php" method="post" style="margin-bottom:5px;">
																									<button class="dropdown-item" type="submit" name="blacklistNastroj" style="border:0;cursor:pointer;">
																										<i class="fas fa-address-book" style="color:#c12e1b;margin-right:5px;"></i>
																										Přidat uživatele na blacklist
																									</button>
																									<input type="hidden" name="idUzivatele" value="'.$row['id'].'">
																								</form>';
																				}
																				else{
																				echo '<form action="../skripty/unban.php" method="post" style="margin-bottom:5px;">
																							<button class="dropdown-item" type="submit" name="unBan" style="border:0;cursor:pointer;">
																								<i class="fas fa-user-check" style="margin-right:5px;color:#28a745;"></i>
																								unBAN
																							</button>
																							<input type="hidden" name="idUzivatele" value="'.$row['id'].'">
																						</form>';
																				}
																				if($row['whitelist']==0){
																				echo '<form action="../skripty/whitelistNahodit.php" method="post" style="margin-bottom:5px;">
																							<button class="dropdown-item" type="submit" name="wl" style="border:0;cursor:pointer;">
																								<i class="fas fa-check-circle" style="color:#28a745;;margin-right:5px;"></i>
																								Whitelist ON
																							</button>
																							<input type="hidden" name="idUzivatele" value="'.$row['id'].'">
																						</form>';
																				}
																				else{
																				echo '<form action="../skripty/whitelistSundat.php" method="post" style="margin-bottom:5px;">
																							<button class="dropdown-item" type="submit" name="unwl" style="border:0;cursor:pointer;">
																								<i class="fas fa-times" style="margin-right:5px;color:#c12e1b;"></i>
																								Whitelist OFF
																							</button>
																							<input type="hidden" name="idUzivatele" value="'.$row['id'].'">
																						</form>';
																				}
																				if($row['admin']==0){
																				echo '<form action="../skripty/odstranitUzivatele.php" method="post" style="margin-bottom:5px;">
																							 <button class="dropdown-item" type="submit" name="odstranitUzivatele" style="margin-right:5px;outline:none;border:0;cursor:pointer;">
																								<i class="fas fa-trash-alt" style="margin-right:5px;"></i>
																								Odstranit uživatele
																							 </button>
																							 <input type="hidden" name="idUzivatele" value="'.$row['id'].'">
																							</form>';
																				}
																				echo '<form action="../skripty/smazaniProfilovky.php" method="post" style="margin-bottom:5px;">
																							 <button class="dropdown-item" type="submit" name="odstranitProfilovouFoto" style="margin-right:5px;outline:none;border:0;cursor:pointer;">
																								<i class="fas fa-trash-alt" style="margin-right:5px;"></i>
																								Smazat profilovou fotografii
																							 </button>
																							 <input type="hidden" name="idUzivatele" value="'.$row['id'].'">
																							</form>';
																echo '</div>
																		</td>
																	</tr>';
														}
											 echo '</tbody>
												</table>
												</div>
											</div>
										</div>
									</div>
									</div>
									</div>';
									echo '<footer id="sticky-footer" class="page-footer py-4 bg-light text-white-50">
											    <div class="container text-center">
											      <small>Vytvořil Luboš "MarravinCZ" Kučera<br>Copyright &copy; 2020. Všechna práva vyhrazena</small>
											    </div>
											  </footer>';
					}
				}
			}
			else{
				echo '<div class="container" id="textUvod">
								<div class="row">
									<h1 class="uvodVety" style="font-size: 70px;font-weight: bold;color:white;">Něco se nepovedlo! Vrať se na úvodní stránku!</h1>
								</div>
							</div>';
			}
?>


</body>
</html>
