<?php
	session_start();
	include_once 'skripty/dtb.php';
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
  <link rel="stylesheet" type="text/css" href="Bootstrap/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src='https://www.google.com/recaptcha/api.js?hl=cs'></script>

  <link rel="shortcut icon" href="foto/favicon.ico" type="image/x-icon">
  <link rel="icon" href="foto/favicon.ico" type="image/x-icon">
<title>Unit Roleplay</title>
</head>
<body>
	<script>
		(function ($) {
			$.fn.countTo = function (options) {
				options = options || {};

				return $(this).each(function () {
					// set options for current element
					var settings = $.extend({}, $.fn.countTo.defaults, {
						from:            $(this).data('from'),
						to:              $(this).data('to'),
						speed:           $(this).data('speed'),
						refreshInterval: $(this).data('refresh-interval'),
						decimals:        $(this).data('decimals')
					}, options);

					// how many times to update the value, and how much to increment the value on each update
					var loops = Math.ceil(settings.speed / settings.refreshInterval),
						increment = (settings.to - settings.from) / loops;

					// references & variables that will change with each update
					var self = this,
						$self = $(this),
						loopCount = 0,
						value = settings.from,
						data = $self.data('countTo') || {};

					$self.data('countTo', data);

					// if an existing interval can be found, clear it first
					if (data.interval) {
						clearInterval(data.interval);
					}
					data.interval = setInterval(updateTimer, settings.refreshInterval);

					// initialize the element with the starting value
					render(value);

					function updateTimer() {
						value += increment;
						loopCount++;

						render(value);

						if (typeof(settings.onUpdate) == 'function') {
							settings.onUpdate.call(self, value);
						}

						if (loopCount >= loops) {
							// remove the interval
							$self.removeData('countTo');
							clearInterval(data.interval);
							value = settings.to;

							if (typeof(settings.onComplete) == 'function') {
								settings.onComplete.call(self, value);
							}
						}
					}

					function render(value) {
						var formattedValue = settings.formatter.call(self, value, settings);
						$self.html(formattedValue);
					}
				});
			};

			$.fn.countTo.defaults = {
				from: 0,               // the number the element should start at
				to: 0,                 // the number the element should end at
				speed: 1000,           // how long it should take to count between the target numbers
				refreshInterval: 10,  // how often the element should be updated
				decimals: 0,           // the number of decimal places to show
				formatter: formatter,  // handler for formatting the value before rendering
				onUpdate: null,        // callback method for every time the element is updated
				onComplete: null       // callback method for when the element finishes updating
			};

			function formatter(value, settings) {
				return value.toFixed(settings.decimals);
			}
			}(jQuery));

			jQuery(function ($) {
			// custom formatting example
			$('.count-number').data('countToOptions', {
			formatter: function (value, options) {
				return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
			}
			});

			// start all the timers
			$('.timer').each(count);

			function count(options) {
			var $this = $(this);
			options = $.extend({}, options || {}, $this.data('countToOptions') || {});
			$this.countTo(options);
			}
			});
	</script>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#c3cdd7;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" id="menuUvodLogo" href="index.php"><img src="foto/UNIT_PNG.png" class="logoNavbar" alt="navbar logo"></a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0" id="menuUvod">
          <li class="nav-item">
            <a class="nav-link" href="phpStranky/oprojektu.php"><i class="fas fa-clipboard-list" style="margin-right:7px;"></i>O projektu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="phpStranky/ateam.php"><i class="fas fa-address-book" style="margin-right:7px;"></i>A-team</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-info-circle" style="margin-right:7px;"></i>
              Pravidla
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="phpStranky/zakprav.php">Z??kladn?? pravidla</a>
              <a class="dropdown-item" href="phpStranky/frakprav.php">Frak??n?? pravidla</a>
							<a class="dropdown-item" href="phpStranky/police.php">Police Department</a>
							<a class="dropdown-item" href="phpStranky/zakony.php">Z??kony</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="phpStranky/twitch.php"><i class="fab fa-twitch" style="margin-right:7px;"></i>Twitch</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="phpStranky/forum.php"><i class="fas fa-book" style="margin-right:7px;"></i>F??rum</a>
          </li>
					<li class="nav-item">
            <a class="nav-link" href="phpStranky/donate.php"><i class="fas fa-donate" style="margin-right:7px;"></i>Donate</a>
          </li>
        </ul>
        <div class="ml-auto" id="profilLinky">
					<a href="https://www.youtube.com/channel/UCMqicaPkmGkEmu9b4QvciJA" target="_blank"><i class="fab fa-youtube" id="youtubeLogo"></i></a>
          <a href="https://discord.gg/3yNzRUK" target="_blank"><i class="fab fa-discord" id="discordLogo"></i></a>
          <a href="https://www.instagram.com/unitrp_/" target="_blank"><i class="fab fa-instagram" id="instagramLogo"></i></a>
					<?php
						if(!isset($_SESSION['idUzivatele'])){
          			echo '<button type="submit" class="btn btn-light btn-lg" data-toggle="modal" data-target="#modalLogin" style="margin-top: -5px;float:right;">Login</button>';
						}
						else{
							echo '<form action="skripty/odhlaseni.php" method="post" style="float:right;">
								  		 <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
		 									 		if($_SESSION['statusUzivatele'] == 0){
														$filename="profilovka/profile".$_SESSION['idUzivatele']."*";
														$fileinfo=glob($filename);
														$fileext=explode(".",$fileinfo[0]);
														echo '<img src="profilovka/profile'.$_SESSION['idUzivatele'].'.'.$fileext[1].'" id="profilFoto" width="50" height="45" alt="Profilov?? fotka"></a>';
											 		}
													else{
														echo '<img src="profilovka/default.jpg" id="profilFoto" width="50" height="48" alt="Profilov?? fotka"></a>';
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
		 					echo				'<a class="dropdown-item" href="phpStranky/nastaveni.php">Nastaven??</a>
		 										    <a class="dropdown-item" href="phpStranky/mojeZadosti.php">Moje ????dosti</a>';
														$emailU=$_SESSION['emailUzivatele'];
														$sql= "SELECT * FROM zadostwhitelist WHERE email='$emailU' ORDER BY id DESC";
						            	  $vys= mysqli_query($pripojeni,$sql);
														$row = mysqli_fetch_assoc($vys);
														$pocetZadosti=mysqli_num_rows ($vys);
														if($pocetZadosti >= 0 && $pocetZadosti <= 3){
															if($_SESSION['whitelist']==0 && $_SESSION['stavBan'] == 0){
																	if($row['schvaleno']==1 || $pocetZadosti == 0){
							 											echo	'<a class="dropdown-item" href="phpStranky/zadost.php">????dost o Whitelist</a>';
																	}
															}
														}
														if($_SESSION['adminStav'] > 3){
				 											echo	'<a class="dropdown-item" href="phpStranky/zadostiWhitelist.php">??adatel?? o whitelist</a>';
															echo	'<a class="dropdown-item" href="phpStranky/editorPravidel.php">[EDIT] z??kladn?? pravidla</a>';
															echo	'<a class="dropdown-item" href="phpStranky/editorFrakPravidel.php">[EDIT] frak??n?? pravidla</a>';
															echo	'<a class="dropdown-item" href="phpStranky/editorPolice.php">[EDIT] Police Department</a>';
															echo	'<a class="dropdown-item" href="phpStranky/editorZakonu.php">[EDIT] z??kony</a>';
															echo	'<a class="dropdown-item" href="phpStranky/amenu.php"><i class="fas fa-user-cog" style="margin-right:5px;"></i>Admin list<i class="fas fa-user-cog" style="margin-left:5px;"></i></a>';
														}
														else if($_SESSION['adminStav'] == 1){
															echo	'<a class="dropdown-item" href="phpStranky/zadostiWhitelist.php">??adatel?? o whitelist</a>';
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
		          <form class="modal-body seminor-login-form" method="post" action="skripty/registrace.php">
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
								  <label class="form-check-label" for="inlineCheckbox1">Sezn??mil/a jsem se s <a href="phpStranky/gdpr.php">informacemi o zpracov??n?? osobn??ch ??daj??</a></label>
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
							<form class="modal-body" method="post" action="skripty/login.php">
		                <div class="form-group">
		                  <input type="email" class="form-control" name="email">
		                  <label class="form-control-placeholder">E-mail</label>
		                </div>
		                <div class="form-group">
		                  <input type="password" class="form-control" name="heslo1">
		                  <label class="form-control-placeholder">Heslo</label>
		                </div>
										<div class="create-new-fau text-center pt-3">
											<a href="phpStranky/zapomenuteHeslo.php" class="text-primary-fau">Zapomenut?? heslo</a>
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

		if(strpos($celaURL,"login=uspesny") == true){
			echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>??sp????n?? jste se p??ihl??sil/a!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=recaptcha") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Nevyplnil jste reCAPTCHA ov????en??! Jste robot?!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"zadost=odeslana") == true){
			echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
								<strong>??sp????n?? jste odeslal ????dost o zm??nu hesla! Zkontrolujte svou e-mailovou schr??nku!</strong>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
		}
		else if(strpos($celaURL,"updatehesla=uspesny") == true){
			echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
								<strong>??sp????n?? jste zm??nil/a heslo va??eho ????tu</strong>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
		}
		else if(strpos($celaURL,"zadost=errorsql") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> N??co se pokazilo! Zkuste opakovat akci p????padn?? kontaktujte spr??vce webu!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"updatehesla=zadnazadost") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Pro zm??nu hesla je t??eba znovu zaslat ????dost!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"updatehesla=problemupraveni") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> N??co se pokazilo! Zkuste opakovat akci p????padn?? kontaktujte spr??vce webu!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"updatehesla=problemdelete") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> N??co se pokazilo!	Kontaktujte spr??vce webu!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"updatehesla=notoken") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Pravd??podobn?? jste u?? zm??nil heslo a nebo je t??eba zaslat ????dost o zm??nu znovu!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}


		else if(strpos($celaURL,"error=nespravneheslo") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Zadal/a jste ??patn?? heslo!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=nevyplnenepole") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Nezadali jste ??daje k p??ihl????en??!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=ucetneexistuje") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> ????et s t??mito ??daji neexistuje!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=gdprproblem") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Pro ??sp????nou registraci je t??eba souhlasit se zpracov??n??m ??daj??!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=prazdnekolonky") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Nezadal/a jste ????dn?? ??daje k p??ihl????en??!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"finalreg=jeUzPotvrzena") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Va??e adresa byla ji?? potvrzena!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"finalreg=problemStokenem") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Probl??m s tokenem, kontaktujte spr??vce (MarravinCZ)!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=heslojekratke") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Zadal/a jste p????li?? kr??tk?? heslo!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"login=overteEmail") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Pro p??ihl????en?? je t??eba ov????it e-mail!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}


		else if(strpos($celaURL,"error=spatnezadejmeno") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Zadan?? jm??no m?? ??patn?? tvar!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=spatnezadanyemail") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Zadan?? e-mail m?? ??patn?? tvar!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=spatnezadanyemailajmeno") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Zadan?? e-mail i jm??no m?? ??patn?? tvar!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}

		else if(strpos($celaURL,"registraceuspesna=success") == true){
			echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Potvr??te si registraci na va??em e-mailu!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"finalreg=uspesna") == true){
			echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Registrace je kompletn??, nyn?? se m????ete p??ihl??sit!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"zadost=neschvalena") == true){
			echo	'<div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorMess">
							  ????dost byla ??sp????n?? zam??tnuta!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"zadost=schvalena") == true){
			echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>????dost byla ??sp????n?? schv??lena!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
	  ?>
		<?php


			$sql= "SELECT * FROM uzivatele";
			$vys= mysqli_query($pripojeni,$sql);
			$pocetRegiUzivatelu=mysqli_num_rows ($vys);

			$sqla= "SELECT * FROM uzivatele WHERE whitelist=1";
			$vysa= mysqli_query($pripojeni,$sqla);
			$pocetWhitelisted=mysqli_num_rows ($vysa);

			$sqlc= "SELECT * FROM uzivatele WHERE admin > 3";
			$vysc= mysqli_query($pripojeni,$sqlc);
			$pocetAdminu=mysqli_num_rows ($vysc);


		  echo '<div class="container" id="textUvod">
					    <div class="row">
					      <h1 class="uvodVety" style="font-size: 70px;font-weight: bold;">V??tej na str??nce Unit RP</h1>
					    </div>
					    <div class="row">
					      <h2 class="uvodVety2" style="font-style: italic;">Roleplay is yours???</h2>
					    </div>
					    <br>
					    <div class="row">
								<a href="https://discord.gg/CQp2HRT" style="color:black;margin-left: auto;margin-right: auto;margin-top:20px;" target="_blank"><button type="button" class="btn btn-light btn-lg" id="buttonIndex"><i class="fab fa-discord" style="margin-right: 8px;margin-top: 9px;"></i><strong>P??ipoj se k n??m na discord!</strong></button></a>
					    </div>
							<div class="container" style="margin-top:60px;">
								<div class="row">
								    <br/>
								</div>
									<div class="row text-center">
								        <div class="col">
								        <div class="counter">
										      <i class="fas fa-users fa-2x" style="margin: 0 auto;float: none;display: table;color: #4ad1e5;"></i>
										      <h2 class="timer count-title count-number" data-to="'.$pocetRegiUzivatelu.'" data-speed="1500"></h2>
										       <p class="count-text ">Po??et registrovan??ch u??ivatel??</p>
										    </div>
								        </div>
							              <div class="col">
							               <div class="counter">
													      <i class="fas fa-user-check fa-2x" style="margin: 0 auto;float: none;display: table;color: #4ad1e5;"></i>
													      <h2 class="timer count-title count-number" data-to="'.$pocetWhitelisted.'" data-speed="1500"></h2>
													      <p class="count-text ">Po??et whitelisted u??ivatel??</p>
													    </div>
							              </div>
							              <div class="col">
							                  <div class="counter">
												      <i class="fas fa-signal fa-2x" style="margin: 0 auto;float: none;display: table;color: #4ad1e5;"></i>';
												echo	'<p class="count-text ">Hr?????? online</p>
												    </div></div>
							              <div class="col">
							              <div class="counter">
												      <i class="fas fa-globe-americas fa-2x" style="margin: 0 auto;float: none;display: table;color: #4ad1e5;"></i>
												      <h2 style="font-size: 40px;font-weight: normal;margin-top: 10px;margin-bottom: 0;text-align: center;"></h2>
												      <p class="count-text ">Server status</p>
												    </div>
							              </div>
							         </div>
							</div>
					  </div>';
	?>
</body>
</html>
