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
	<script src="https://cdn.tiny.cloud/1/eoj1vdl030re3i765qa6n3j57jqfnns3nr0518tqoi0f9cvl/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <link rel="shortcut icon" href="../foto/favicon.ico" type="image/x-icon">
  <link rel="icon" href="../foto/favicon.ico" type="image/x-icon">
<title>Unit Roleplay - Editor</title>
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
	<?php
	  $celaURL="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if(strpos($celaURL,"nevplneno==Zarazeni") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Nevyplnil jste za??azen?? ????dosti!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"nevplnen==Titulek") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Nevyplnil jste titulek u ????dosti!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"nevplnen==Text") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Nevyplnil jste text u ????dosti!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
	?>
	<?php
	if(isset($_SESSION['idUzivatele'])){
		if($_SESSION['stavBan'] == 0 && $_SESSION['whitelist']==1){
		echo '<div class="container" id="textUvod">
		    <div class="row">
		      <h1 class="uvodVety" style="font-size: 70px;font-weight: bold;">Editor formul??????</h1>
		    </div>
		    <br>
				<div class="row">
		      <h5 class="uvodVety">Pro p??id??n?? obr??zku pou??ijte webovou str??nku <a href="https://imgbb.com/upload" target="_blank" style="color:white;text-decoration: underline;">imgbb.com</a>. Po nahr??n?? fotografie nastavte dobu smaz??n?? na NIKDY. Po nahr??n?? obr??zku jej rozklikn??te, klikn??te prav??m tla????tkem a zvolte zkop??rovat adresu obr??zku. Po zkop??rov??n?? odkazu p??ejd??te zp??t do editoru, kde vyberete polo??ku INSERT - IMAGE a zde vlo????te odkaz do ????dku s n??pisem SOURCE:<br>Pot?? co vlo????te odkaz m??te mo??nost vyplnit pole "Alternative description", kter?? je v??dy doporu??eno vyplnit tak aby vypln??n?? text odpov??dal popisu obr??zku (nap??. jablko, pes apod.). Po stisknut?? tla????tka "SAVE" by se V??m m??l obr??zek p????mo zobrazit v editoru.</h5>
		    </div>
				<br>
		    <form class="editorPravidel" action="../skripty/pridatZadost.php" method="post">
        <input type="text" placeholder="Titulek" name="textNazev" class="form-control" style="width:50%;margin-left:auto;margin-right:auto;margin-bottom:25px;">
        <select class="custom-select" style="margin-bottom:25px;width:50%;" name="zarazeniPrispevku">
          <option selected value="nic">Vyberte kategorii</option>
          <option value="1">??ivotopisy</option>
          <option value="4">????dost o leg??ln?? frakci</option>
          <option value="5">????dost o neleg??ln?? frakci</option>
          <option value="6">????dost o druhou postavu</option>';
          if($_SESSION['adminStav'] == 4 || $_SESSION['adminStav'] == 5){
            echo '<option value="7">Z??kony</option>';
          }
  echo  '</select>';
  echo '<textarea name="content">';
  echo  '</textarea>
      <script>
        tinymce.init({
          selector: "textarea",
          height: 530,
          plugins: "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          toolbar_mode: "floating",
        });
      </script>
      <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="submitPridej" style="margin-top: 15px;">P??idat na f??rum</button>
  </form>
  </div>
	<footer id="sticky-footer" class="page-footer py-4 bg-light text-white-50">
    <div class="container text-center">
      <small>Vytvo??il Lubo?? "MarravinCZ" Ku??era<br>Copyright &copy; 2020. V??echna pr??va vyhrazena</small>
    </div>
  </footer>';
	}
	else if($_SESSION['stavBan'] == 0 && $_SESSION['whitelist']==0)
	{
		echo '<div class="container" id="textUvod">
						<div class="row">
							<h1 class="uvodVety" style="font-size: 70px;font-weight: bold;color:white;">Pro p??id??n?? p????sp??vku mus??te m??t whitelist!</h1>
						</div>
					</div>';
	}
	else if($_SESSION['stavBan'] >0)
	{
	  echo '<div class="container" id="textUvod">
		    <div class="row">
		      <h1 class="uvodVety" style="font-size: 70px;font-weight: bold;">Editor formul??????</h1>
		    </div>
		    <br>
				<div class="row">
		      <h5 class="uvodVety">Pro p??id??n?? obr??zku pou??ijte webovou str??nku <a href="https://imgbb.com/upload" target="_blank" style="color:white;text-decoration: underline;">imgbb.com</a>. Po nahr??n?? fotografie nastavte dobu smaz??n?? na NIKDY. N??sledn?? jej rozklikn??te p????mo na str??nce, klikn??te prav??m tla????tkem a zvolte zkop??rovat adresu obr??zku. Po zkop??rov??n?? odkazu p??ejd??te zp??t do editoru, kde vyberete polo??ku INSERT - IMAGE a zde vlo????te odkaz do ????dku s n??pisem SOURCE:<br>Pot?? co vlo????te odkaz m??te mo??nost vyplnit pole "Alternative description", kter?? je v??dy doporu??eno vyplnit tak aby vypln??n?? text odpov??dal popisu obr??zku (nap??. jablko, pes apod.). Po stisknut?? tla????tka "SAVE" by se V??m m??l obr??zek p????mo zobrazit v editoru.</h5>
		    </div>
				<br>
		    <form class="editorPravidel" action="../skripty/pridatZadost.php" method="post">
        <input type="text" placeholder="Titulek" name="textNazev" class="form-control" style="width:50%;margin-left:auto;margin-right:auto;margin-bottom:25px;">
        <select class="custom-select" style="margin-bottom:25px;width:50%;" name="zarazeniPrispevku">
          <option selected value="nic">Vyberte kategorii</option>
          <option value="8">????dost o unban</option>';
  echo  '</select>';
  echo '<textarea name="content">';
  echo  '</textarea>
      <script>
        tinymce.init({
          selector: "textarea",
          height: 530,
          plugins: "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          toolbar_mode: "floating",
        });
      </script>
      <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="submitPridej" style="margin-top: 15px;">P??idat na f??rum</button>
  </form>
  </div>
	<footer id="sticky-footer" class="page-footer py-4 bg-light text-white-50">
    <div class="container text-center">
      <small>Vytvo??il Lubo?? "MarravinCZ" Ku??era<br>Copyright &copy; 2020. V??echna pr??va vyhrazena</small>
    </div>
  </footer>';
	}
}
else if(!isset($_SESSION['idUzivatele'])){
	echo '<div class="container" id="textUvod">
					<div class="row">
						<h1 class="uvodVety" style="font-size: 70px;font-weight: bold;color:white;">Pro p??id??n?? p????sp??vku mus??te b??t p??ihl????en!</h1>
					</div>
				</div>';
}

	?>


</body>
</html>
