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
			<h1 style="color:white;">Informace o zpracování osobních údajů</h1>
			<p id="uvodTexto">
				<div style="text-align:left!important;margin-left:15px;margin-right:15px;">
				<p>Při zpracování osobních údajů našich klientů postupujeme v souladu s nařízením Evropského parlamentu a Rady (EU) 2016/679 ze dne 27. dubna 2016 o ochraně fyzických osob v souvislosti se zpracováním osobních údajů a o volném pohybu těchto údajů a o zrušení směrnice 95/46/ES (obecné nařízení o ochraně osobních údajů; dále jen „GDPR“) a dále v souladu s příslušnými vnitrostátními předpisy upravujícími ochranu osobních údajů.
				Rádi bychom Vás, jako hráče projektu UnitRoleplay, informovali o podrobnostech zpracování Vašich osobních údajů a o Vašich právech.</p>
				<h4>Jaké informace zde naleznete?</h4>
				1.	Identifikační a kontaktní údaje správce osobních údajů<br>
				2.	Rozsah zpracování – osobní údaje<br>
				3.	Účely zpracování - registrace,login, ovládání fóra (psaní příspěvků atd.), odlišení od uživatelů (role whitelisted,non whitelisted,ban..)<br>
				4.	Zákonnost zpracování<br>
				5.	Příjemci osobních údajů - databáze pod vlastnictvím Henry,PlayManElit<br>
				6.	Doba uchování - po dobu nezbytně nutnou<br>
				7.	Vaše práva<br>
				8.	Způsob uplatnění práv<br>
				9.	Okolnosti neposkytnutí osobních údajů<br>
				<br><br>

				<h4>1 Identifikační a kontaktní údaje správce osobních údajů</h4>
				Název subjektu:<br>
				IČO:<br>
				Adresa:<br>
				Telefonní číslo: +<br>
				ID datové schránky:<br>
				E-mailová adresa:<br>

				<br><h4>2 Rozsah zpracování – zpracovávané osobní údaje</h4>
				Zpracováváme pouze ty osobní údaje, které od Vás získáme jejich vyplněním na webu správce pro účely Vašeho pozdějšího kontaktování. Přitom se jedná o následující osobní údaje:<br>
				•	 jméno<br>
				•	emailová adresa<br>
				<br><h4>3 Účely zpracování</h4>
				Účely zpracování se rozumí důvody, proč Vaše osobní údaje zpracováváme. Vaše výše uvedené osobní údaje zpracováváme k následujícím účelům:<br>
				a) prihlásení na web stránku<br>
				b) whitelist dotazník<br>
				Za jinými účely Vaše osobní údaje nezpracováváme. Nepoužíváme je k marketingu, ani nad nimi nejsou prováděny další operace zpracování, jako profilování či automatizované rozhodování apod.<br>
				<br><h4>4 Příjemci osobních údajů</h4>
				Vaše osobní údaje nejsou předávány mimo společnost správce. V ojedinělých případech mohou být předány osobám, které vykonávají činnosti pro správce na základě smluvního vztahu obdobného s pracovním poměrem (WL TESTER, ADMIN). V takovém případě je těmto osobám zakázáno zpracovávat Vaše údaje pro vlastní účely a/nebo mimo účely zde uvedené. Tyto osoby jsou vázány povinnosti mlčenlivosti.<br><br>

				Vaše osobní údaje nepředáváme do třetích zemí nebo mezinárodním organizacím.<br>


				<br><h4>6 Doba uchování</h4>
				Vaše osobní údaje zpracováváme vždy po dobu nezbytnou pro naplnění účelu jejich zpracování. Jedná se o dobu, kdy lze rozumně očekávat uzavření smluvního vztahu, sjednání schůzky či požadovaného kontaktování správcem. Vaše osobní údaje jsou tak zpracovávány nejdéle po dobu 1 roku.
<br>
				<br><h4>7 Vaše práva</h4>
				Přísluší Vám několik práv souvisejících s ochranou osobních údajů, která můžete v souladu s podmínkami vymezenými v GDPR uplatňovat.<br>
				<br><h5>7.1 Právo na přístup</h5>
				Máte právo požadovat od nás potvrzení, zda dochází ke zpracování Vašich osobních údajů či nikoliv. Pokud k jejich zpracování dochází, máte právo získat přístup ke svým osobním údajům a k dalším informacím souvisejícím s jejich zpracováním, jako jsou účely zpracování, příjemci osobních údajů, doba uchování apod.
				<br>
				<h5>7.2 Právo na opravu</h5>
				Máte právo požadovat opravu nepřesných osobních údajů nebo doplnění neúplných osobních údajů.<br><br>
				<h5>7.3 Právo na výmaz</h5>
				Máte právo na výmaz osobních údajů, kromě případů, kdy nám v tom brání právní povinnosti nebo pokud jsou splněny jiné výjimky.<br><br>
				<h5>7.4 Právo na omezení zpracování</h5>
				Máte právo na omezení zpracování, a to v následujících případech:<br>
				•	popíráte-li přesnost osobních údajů; zpracování osobních údajů je pak omezeno na dobu potřebnou k tomu, aby mohla být přesnost osobních údajů ověřena;<br>
				•	zpracování je protiprávní a Vy odmítáte výmaz osobních údajů a žádáte místo toho o omezení jejich použití;<br>
				•	osobní údaje již nejsou potřeba pro účely zpracování, ale Vy je požadujete pro určení, výkon nebo obhajobu právních nároků;<br>
				•	vznášíte námitku proti zpracování osobních údajů na základě oprávněného zájmu; zpracování osobních údajů je pak omezeno, dokud nebude ověřeno, zda naše oprávněné důvody převažují nad těmi Vašimi.<br><br>
				<h5>7.5 Právo na přenositelnost</h5>
				V případě automatizovaného zpracování osobních údajů, které probíhá na základě uděleného souhlasu nebo uzavření smlouvy, máte právo získat své osobní údaje ve strukturovaném, běžně používaném a strojově čitelném formátu. Bude-li to technicky proveditelné, zašleme na Vaši žádost osobní údaje v daném formátu přímo jinému správci.
				<br><br><h5>7.6 Právo podat stížnost</h5>
				Pokud se domníváte, že zpracování Vašich osobních údajů je v rozporu s GDPR, máte právo podat stížnost u dozorového úřadu. V České republice vykonává funkci dozorového úřadu Úřad pro ochranu osobních údajů, se sídlem Pplk. Sochora 727/27, 170 00 Praha 7 – Holešovice.
				<br><br>
				<h4>8 Způsob uplatnění práv</h4>
				Uplatňovat svá práva související s ochranou osobních údajů můžete podáním žádosti adresované správci. Obsahem žádosti musí být vždy alespoň údaje žadatele uvedené výše (které jste vyplňovaly na webu správce) a specifikace uplatňovaných práv.
				<br>
				Pro podání žádosti máte několik možností. Abychom zabránili neoprávněnému přístupu třetích osob k Vašim osobním údajům, je každá z možností spojena s určitým způsobem ověření Vaší totožnosti. Žádost můžete podat následovně:<br>
				•	Písemně – Žádost opatřete svým úředně ověřeným podpisem, vložte do obálky nadepsané „Žádost dle GDPR“ a zašlete na adresu správce.<br>
				•	E-mailovou zprávou – Žádost opatřete svým zaručeným elektronickým podpisem a odešlete na e-mailovou adresu sales@ngss.cz s předmětem „Žádost dle GDPR“.<br>
				•	Datovou zprávou – Žádost odešlete ze své datové schránky do datové schránky správce a do pole Věc uveďte „Žádost dle GDPR“.<br>
				<br>
				<h4>9 Neposkytnutí osobních údajů.</h4>
				Obecně jste oprávněn své osobní údaje neposkytnout. V případě, že nám své údaje neposkytnete, nebudeme Vás moci kontaktovat.<br>
				***<br>
				Neváhejte se na nás kdykoliv obrátit s jakýmkoliv dotazem, přáním či podnětem souvisejícím se zpracováním osobních údajů. Kontaktujte nás pomocí kontaktních údajů uvedených v úvodu.
				<br>
			</div>
			</p>
		</div>
    </div>
  </div>

  <footer id="sticky-footer" class="page-footer py-4 bg-light text-white-50">
    <div class="container text-center">
      <small>Vytvořil Luboš "MarravinCZ" Kučera<br>Copyright &copy; 2020. Všechna práva vyhrazena</small>
    </div>
  </footer>

</body>
</html>
