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
<html>
<head lang="cs">
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
<title>Unit Roleplay - O projektu</title>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#c3cdd7;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" id="menuUvodLogo" href="../index.php"><img src="../foto/UNIT_PNG.png" class="logoNavbar"></a>
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
              <a class="dropdown-item" href="zakprav.php">Z??kladn?? pravidla</a>
              <a class="dropdown-item" href="frakprav.php">Frak??n?? pravidla</a>
							<a class="dropdown-item" href="police.php">Police Department</a>
							<a class="dropdown-item" href="zakony.php">Z??kony</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="twitch.php"><i class="fab fa-twitch" style="margin-right:7px;"></i>Twitch</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="forum.php"><i class="fas fa-book" style="margin-right:7px;"></i>F??rum</a>
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
														echo '<img src="../profilovka/profile'.$_SESSION['idUzivatele'].'.'.$fileext[3].'" id="profilFoto" width="50" height="45" alt="Profilov?? fotka"></a>';
											 		}
													else{
														echo '<img src="../profilovka/default.jpg" id="profilFoto" width="50" height="48" alt="Profilov?? fotka"></a>';
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
		 								echo	 '<a class="dropdown-item" href="nastaveni.php">Nastaven??</a>
		 										    <a class="dropdown-item" href="mojeZadosti.php">Moje ????dosti</a>';
														$emailU=$_SESSION['emailUzivatele'];
														$sql= "SELECT * FROM zadostwhitelist WHERE email='$emailU' ORDER BY id DESC";
						            	  $vys= mysqli_query($pripojeni,$sql);
														$row = mysqli_fetch_assoc($vys);
														$pocetZadosti=mysqli_num_rows ($vys);
														if($pocetZadosti >= 0 && $pocetZadosti <= 3){
															if($_SESSION['whitelist']==0 && $_SESSION['stavBan'] == 0){
																	if($row['schvaleno']==1 || $pocetZadosti == 0){
							 											echo	'<a class="dropdown-item" href="zadost.php">????dost o Whitelist</a>';
																	}
															}
														}
														if($_SESSION['adminStav'] > 3){
				 											echo	'<a class="dropdown-item" href="zadostiWhitelist.php">??adatel?? o whitelist</a>';
															echo	'<a class="dropdown-item" href="editorPravidel.php">[EDIT] z??kladn?? pravidla</a>';
                              echo	'<a class="dropdown-item" href="editorFrakPravidel.php">[EDIT] frak??n?? pravidla</a>';
															echo	'<a class="dropdown-item" href="editorPolice.php">[EDIT] Police Department</a>';
															echo	'<a class="dropdown-item" href="editorZakonu.php">[EDIT] z??kony</a>';
															echo	'<a class="dropdown-item" href="amenu.php"><i class="fas fa-user-cog" style="margin-right:5px;"></i>Admin list<i class="fas fa-user-cog" style="margin-left:5px;"></i></a>';
														}
														else if($_SESSION['adminStav'] == 1){
															echo	'<a class="dropdown-item" href="zadostiWhitelist.php">??adatel?? o whitelist</a>';
														}
				 							echo			   '<div class="dropdown-divider"></div>
				 										    <button class="dropdown-item" type="submit" style="cursor:pointer;">Odhl??sit se</button>
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
		              <label class="form-control-placeholder">U??ivatelsk?? jm??no</label>
		            </div>
		            <div class="form-group">
		              <input type="email" class="form-control" name="email">
		              <label class="form-control-placeholder">E-mail</label>
		            </div>
		            <div class="form-group">
		              <input type="password" class="form-control" name="heslo1">
		              <label class="form-control-placeholder">Heslo (min. 8 znak??)</label>
		            </div>
		            <div class="form-group">
		              <input type="password" class="form-control" name="heslo2">
		              <label class="form-control-placeholder">Potvrzen?? hesla</label>
		            </div>
								<div class="form-group" style="background-color:unset!important;border:unset!important;height:unset!important;width: 308px;">
								  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="souhlasim_se_zpracovanim_udaju" name="gdprCheck">
								  <label class="form-check-label" for="inlineCheckbox1">Sezn??mil/a jsem se s <a href="gdpr.php">informacemi o zpracov??n?? osobn??ch ??daj??</a></label>
								</div>
								<div class="g-recaptcha" data-sitekey="6Ldd7fwUAAAAAPCU09wt00lbvnBU6cJxbFoAIdbu" style="display: table;margin-left:auto;margin-right:auto;"></div>
		            <br>
		            <input type="submit" name="registrace" class="loginButton" value="Registrovat se">
		          </form>
		          <br>
		          <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">Zav????t</button>
		            </div>
		        </div>
		      </div>
		    </div>

		  <div class="modal fade seminor-login-modal" id="modalLogin" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		      <div class="modal-content">
		        <div class="modal-header">
		          <h5 class="modal-title" id="exampleModalLabel">P??ihl??sit se</h5>
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
											<a href="zapomenuteHeslo.php" class="text-primary-fau">Zapomenut?? heslo</a>
		                </div>
		                <input type="submit" name="login" class="loginButton" value="Login">
		                <div class="create-new-fau text-center pt-3">
		                    <a href="#" class="text-primary-fau"><span data-toggle="modal" data-target="#modalRegistr" data-dismiss="modal">Nejste zaregistrovan??? Zaregistrujte se zde!</span></a>
		                </div>
		                <br>
		          </form>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zav????t</button>
		        </div>
		      </div>
		    </div>
		  </div>

  <!--KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL-->
	<style>
		.row{
				margin-left: unset!important;
				margin-right: unset!important;
		}
		@media (max-width: 451px){
			.row{
				margin-left: 15px!important;
				margin-right: 15px!important;
			}
		}
	</style>
  <div class="container" id="textUvod">
    <div class="row">
			<div class="vypisPravidel">
			<br>
			<h1 style="color:white;">Informace o zpracov??n?? osobn??ch ??daj??</h1>
			<p id="uvodTexto">
				<div style="text-align:left!important;margin-left:15px;margin-right:15px;">
				<p>P??i zpracov??n?? osobn??ch ??daj?? na??ich klient?? postupujeme v souladu s na????zen??m Evropsk??ho parlamentu a Rady (EU) 2016/679 ze dne 27. dubna 2016 o ochran?? fyzick??ch osob v souvislosti se zpracov??n??m osobn??ch ??daj?? a o voln??m pohybu t??chto ??daj?? a o zru??en?? sm??rnice 95/46/ES (obecn?? na????zen?? o ochran?? osobn??ch ??daj??; d??le jen ???GDPR???) a d??le v souladu s p????slu??n??mi vnitrost??tn??mi p??edpisy upravuj??c??mi ochranu osobn??ch ??daj??.
				R??di bychom V??s, jako hr????e projektu UnitRoleplay, informovali o podrobnostech zpracov??n?? Va??ich osobn??ch ??daj?? a o Va??ich pr??vech.</p>
				<h4>Jak?? informace zde naleznete?</h4>
				1.	Identifika??n?? a kontaktn?? ??daje spr??vce osobn??ch ??daj??<br>
				2.	Rozsah zpracov??n?? ??? osobn?? ??daje<br>
				3.	????ely zpracov??n?? - registrace,login, ovl??d??n?? f??ra (psan?? p????sp??vk?? atd.), odli??en?? od u??ivatel?? (role whitelisted,non whitelisted,ban..)<br>
				4.	Z??konnost zpracov??n??<br>
				5.	P????jemci osobn??ch ??daj?? - datab??ze pod vlastnictv??m Henry,PlayManElit<br>
				6.	Doba uchov??n?? - po dobu nezbytn?? nutnou<br>
				7.	Va??e pr??va<br>
				8.	Zp??sob uplatn??n?? pr??v<br>
				9.	Okolnosti neposkytnut?? osobn??ch ??daj??<br>
				<br><br>

				<h4>1 Identifika??n?? a kontaktn?? ??daje spr??vce osobn??ch ??daj??</h4>
				N??zev subjektu:<br>
				I??O:<br>
				Adresa:<br>
				Telefonn?? ????slo: +<br>
				ID datov?? schr??nky:<br>
				E-mailov?? adresa:<br>

				<br><h4>2 Rozsah zpracov??n?? ??? zpracov??van?? osobn?? ??daje</h4>
				Zpracov??v??me pouze ty osobn?? ??daje, kter?? od V??s z??sk??me jejich vypln??n??m na webu spr??vce pro ????ely Va??eho pozd??j????ho kontaktov??n??. P??itom se jedn?? o n??sleduj??c?? osobn?? ??daje:<br>
				???	 jm??no<br>
				???	emailov?? adresa<br>
				<br><h4>3 ????ely zpracov??n??</h4>
				????ely zpracov??n?? se rozum?? d??vody, pro?? Va??e osobn?? ??daje zpracov??v??me. Va??e v????e uveden?? osobn?? ??daje zpracov??v??me k n??sleduj??c??m ????el??m:<br>
				a) prihl??sen?? na web str??nku<br>
				b) whitelist dotazn??k<br>
				Za jin??mi ????ely Va??e osobn?? ??daje nezpracov??v??me. Nepou????v??me je k marketingu, ani nad nimi nejsou prov??d??ny dal???? operace zpracov??n??, jako profilov??n?? ??i automatizovan?? rozhodov??n?? apod.<br>
				<br><h4>4 P????jemci osobn??ch ??daj??</h4>
				Va??e osobn?? ??daje nejsou p??ed??v??ny mimo spole??nost spr??vce. V ojedin??l??ch p????padech mohou b??t p??ed??ny osob??m, kter?? vykon??vaj?? ??innosti pro spr??vce na z??klad?? smluvn??ho vztahu obdobn??ho s pracovn??m pom??rem (WL TESTER, ADMIN). V takov??m p????pad?? je t??mto osob??m zak??z??no zpracov??vat Va??e ??daje pro vlastn?? ????ely a/nebo mimo ????ely zde uveden??. Tyto osoby jsou v??z??ny povinnosti ml??enlivosti.<br><br>

				Va??e osobn?? ??daje nep??ed??v??me do t??et??ch zem?? nebo mezin??rodn??m organizac??m.<br>


				<br><h4>6 Doba uchov??n??</h4>
				Va??e osobn?? ??daje zpracov??v??me v??dy po dobu nezbytnou pro napln??n?? ????elu jejich zpracov??n??. Jedn?? se o dobu, kdy lze rozumn?? o??ek??vat uzav??en?? smluvn??ho vztahu, sjedn??n?? sch??zky ??i po??adovan??ho kontaktov??n?? spr??vcem. Va??e osobn?? ??daje jsou tak zpracov??v??ny nejd??le po dobu 1 roku.
<br>
				<br><h4>7 Va??e pr??va</h4>
				P????slu???? V??m n??kolik pr??v souvisej??c??ch s ochranou osobn??ch ??daj??, kter?? m????ete v souladu s podm??nkami vymezen??mi v GDPR uplat??ovat.<br>
				<br><h5>7.1 Pr??vo na p????stup</h5>
				M??te pr??vo po??adovat od n??s potvrzen??, zda doch??z?? ke zpracov??n?? Va??ich osobn??ch ??daj?? ??i nikoliv. Pokud k jejich zpracov??n?? doch??z??, m??te pr??vo z??skat p????stup ke sv??m osobn??m ??daj??m a k dal????m informac??m souvisej??c??m s jejich zpracov??n??m, jako jsou ????ely zpracov??n??, p????jemci osobn??ch ??daj??, doba uchov??n?? apod.
				<br>
				<h5>7.2 Pr??vo na opravu</h5>
				M??te pr??vo po??adovat opravu nep??esn??ch osobn??ch ??daj?? nebo dopln??n?? ne??pln??ch osobn??ch ??daj??.<br><br>
				<h5>7.3 Pr??vo na v??maz</h5>
				M??te pr??vo na v??maz osobn??ch ??daj??, krom?? p????pad??, kdy n??m v tom br??n?? pr??vn?? povinnosti nebo pokud jsou spln??ny jin?? v??jimky.<br><br>
				<h5>7.4 Pr??vo na omezen?? zpracov??n??</h5>
				M??te pr??vo na omezen?? zpracov??n??, a to v n??sleduj??c??ch p????padech:<br>
				???	pop??r??te-li p??esnost osobn??ch ??daj??; zpracov??n?? osobn??ch ??daj?? je pak omezeno na dobu pot??ebnou k tomu, aby mohla b??t p??esnost osobn??ch ??daj?? ov????ena;<br>
				???	zpracov??n?? je protipr??vn?? a Vy odm??t??te v??maz osobn??ch ??daj?? a ????d??te m??sto toho o omezen?? jejich pou??it??;<br>
				???	osobn?? ??daje ji?? nejsou pot??eba pro ????ely zpracov??n??, ale Vy je po??adujete pro ur??en??, v??kon nebo obhajobu pr??vn??ch n??rok??;<br>
				???	vzn??????te n??mitku proti zpracov??n?? osobn??ch ??daj?? na z??klad?? opr??vn??n??ho z??jmu; zpracov??n?? osobn??ch ??daj?? je pak omezeno, dokud nebude ov????eno, zda na??e opr??vn??n?? d??vody p??eva??uj?? nad t??mi Va??imi.<br><br>
				<h5>7.5 Pr??vo na p??enositelnost</h5>
				V p????pad?? automatizovan??ho zpracov??n?? osobn??ch ??daj??, kter?? prob??h?? na z??klad?? ud??len??ho souhlasu nebo uzav??en?? smlouvy, m??te pr??vo z??skat sv?? osobn?? ??daje ve strukturovan??m, b????n?? pou????van??m a strojov?? ??iteln??m form??tu. Bude-li to technicky provediteln??, za??leme na Va??i ????dost osobn?? ??daje v dan??m form??tu p????mo jin??mu spr??vci.
				<br><br><h5>7.6 Pr??vo podat st????nost</h5>
				Pokud se domn??v??te, ??e zpracov??n?? Va??ich osobn??ch ??daj?? je v rozporu s GDPR, m??te pr??vo podat st????nost u dozorov??ho ????adu. V ??esk?? republice vykon??v?? funkci dozorov??ho ????adu ????ad pro ochranu osobn??ch ??daj??, se s??dlem Pplk. Sochora 727/27, 170 00 Praha 7 ??? Hole??ovice.
				<br><br>
				<h4>8 Zp??sob uplatn??n?? pr??v</h4>
				Uplat??ovat sv?? pr??va souvisej??c?? s ochranou osobn??ch ??daj?? m????ete pod??n??m ????dosti adresovan?? spr??vci. Obsahem ????dosti mus?? b??t v??dy alespo?? ??daje ??adatele uveden?? v????e (kter?? jste vypl??ovaly na webu spr??vce) a specifikace uplat??ovan??ch pr??v.
				<br>
				Pro pod??n?? ????dosti m??te n??kolik mo??nost??. Abychom zabr??nili neopr??vn??n??mu p????stupu t??et??ch osob k Va??im osobn??m ??daj??m, je ka??d?? z mo??nost?? spojena s ur??it??m zp??sobem ov????en?? Va???? toto??nosti. ????dost m????ete podat n??sledovn??:<br>
				???	P??semn?? ??? ????dost opat??ete sv??m ????edn?? ov????en??m podpisem, vlo??te do ob??lky nadepsan?? ???????dost dle GDPR??? a za??lete na adresu spr??vce.<br>
				???	E-mailovou zpr??vou ??? ????dost opat??ete sv??m zaru??en??m elektronick??m podpisem a ode??lete na e-mailovou adresu sales@ngss.cz s p??edm??tem ???????dost dle GDPR???.<br>
				???	Datovou zpr??vou ??? ????dost ode??lete ze sv?? datov?? schr??nky do datov?? schr??nky spr??vce a do pole V??c uve??te ???????dost dle GDPR???.<br>
				<br>
				<h4>9 Neposkytnut?? osobn??ch ??daj??.</h4>
				Obecn?? jste opr??vn??n sv?? osobn?? ??daje neposkytnout. V p????pad??, ??e n??m sv?? ??daje neposkytnete, nebudeme V??s moci kontaktovat.<br>
				***<br>
				Nev??hejte se na n??s kdykoliv obr??tit s jak??mkoliv dotazem, p????n??m ??i podn??tem souvisej??c??m se zpracov??n??m osobn??ch ??daj??. Kontaktujte n??s pomoc?? kontaktn??ch ??daj?? uveden??ch v ??vodu.
				<br>
			</div>
			</p>
		</div>
    </div>
  </div>

  <footer id="sticky-footer" class="page-footer py-4 bg-light text-white-50">
    <div class="container text-center">
      <small>Vytvo??il Lubo?? "MarravinCZ" Ku??era<br>Copyright &copy; 2020. V??echna pr??va vyhrazena</small>
    </div>
  </footer>

</body>
</html>
