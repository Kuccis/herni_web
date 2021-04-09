<?php
// Checks if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Ldd7fwUAAAAAPcFByGgj2sE-Ogxsvm4jBFqks7I',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
				header("Location: ../index.php?error=recaptcha");
				exit();
    } else {
			if(isset($_POST['registrace'])){

				 require 'dtb.php';

				 $jmenoUzivatele = $_POST['jmeno'];
				 $emailAdresa = $_POST['email'];
				 $hesloJedna = $_POST['heslo1'];
				 $hesloDve=$_POST['heslo2'];
				 $gdpr=$_POST['gdprCheck'];
				 $datum=date("Y-m-d");

				if(empty($jmenoUzivatele) || empty($emailAdresa) || empty($hesloJedna) || empty($hesloDve)){
					header("Location: ../index.php?error=prazdnekolonky&jmeno=".$jmenoUzivatele. "&email".$emailAdresa);
					exit();	//dokud neopravi chybu, kod pod timto ifem se neprovede
				}
				else if(!isset($_POST['gdprCheck']) && $gdpr != 'souhlasim_se_zpracovanim_udaju'){
					header("Location: ../index.php?error=gdprproblem");
					exit();
				}
				else if(!filter_var($emailAdresa,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$jmenoUzivatele)){
					header("Location: ../index.php?error=spatnezadanyemailajmeno");
					exit();
				}
				else if(!filter_var($emailAdresa,FILTER_VALIDATE_EMAIL)){
					header("Location: ../index.php?error=spatnezadanyemail");
					exit();
				}
				else if(!preg_match("/^[a-žA-Ž0-9]*$/",$jmenoUzivatele)){
					header("Location: ../index.php?error=spatnezadejmeno");
					exit();
				}
				else if($hesloJedna !== $hesloDve){
					header("Location: ../index.php?error=heslanejsoustejna&jmeno=".$jmenoUzivatele. "&email".$emailAdresa);
					exit();
				}
				else if(strlen($hesloJedna) < 7){
					header("Location: ../index.php?error=heslojekratke");
					exit();
				}
				else {
					$sql="SELECT * FROM uzivatele WHERE jmeno=? OR email=?;";
					$stmt = mysqli_stmt_init($pripojeni);		//Funkce mysqli_stmt_init () inicializuje příkaz a vrátí objekt vhodný pro mysqli_stmt_prepare ().
					if(!mysqli_stmt_prepare($stmt,$sql)){
						header("Location: ../index.php?error=problemspripojenim");
						exit();
					}else{
						mysqli_stmt_bind_param($stmt, "ss", $jmenoUzivatele, $emailAdresa);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);	//Převede sadu výsledků z posledního dotazu
						$pocet = mysqli_stmt_num_rows($stmt);

						if($pocet > 0){
							header("Location: ../index.php?error=jmenoneboemailjezabrane");
							exit();
						}else{
							$sql="INSERT INTO uzivatele (jmeno,email,heslo,profilovka,gdpr,datumRegistrace) VALUES (?,?,?,1,?,?)";	//ochrana (proti sql injection)
							$stmt = mysqli_stmt_init($pripojeni);
							if(!mysqli_stmt_prepare($stmt,$sql)){
								header("Location: ../index.php?error=sqlerror");
								exit();
							}
							else{
								//odeslani emailu s potvrzením
								$selektor = bin2hex(random_bytes(8)); //pro bezpecnost proti hackerum
								$token = random_bytes(32);

								$url = "http://unitrp.eu/phpStranky/overeniRegistrace.php?selektor=" . $selektor ."&validator=". bin2hex($token);

								$vyprseniPlatnosti = date("U") + 1800; //dnesni datum + 1800 sekund
								$do=$emailAdresa;
								$predmet = 'Potvrzení registrace na stránce UnitRP.eu';
								$zprava='<p>Dostali jsme zprávu, že jste se zaregistroval na stránce unitrp.eu a víme, že jste pouze krok od jeho dokončení. Prosím kliknite na link pod aby jste dokončil registraci!</p>';
								$zprava .= '<p>Link: </br>';
								$zprava .= '<a href="' . $url . '">' . $url . '</a></p>';
								$header = "from: UnitRP.eu bot <www.unitrp.eu>\r\n";
								$header .= "Reply-To<unitrp@seznam.cz>\r\n";
								$header .= "Content-type: text/html\r\n";

								mail($do, $predmet, $zprava, $header);



								$sqlo = "DELETE FROM overeniemail WHERE email=?";    //smazani existujicich tokenu
								$stmto = mysqli_stmt_init($pripojeni); //zjisteni jestli funguje pripojeni a lze vykonat
								if(!mysqli_stmt_prepare($stmto,$sqlo)){
									echo "Error!!";
									exit();
								}else{
									mysqli_stmt_bind_param($stmto,"s",$emailAdresa);   //rekne cim se zameni emailadresa=? pred provedenim stmt
									mysqli_stmt_execute($stmto); // vykona stmt
								}

								$sqlo = "INSERT INTO overeniemail (email,selektor,validator,vyprseni) VALUES (?,?,?,?);";  //zavorky slouzi k upresneni kam presne pridat value
								$stmto = mysqli_stmt_init($pripojeni); //zjisteni jestli funguje pripojeni
								if(!mysqli_stmt_prepare($stmto,$sqlo)){
									echo "Error!!";
									exit();
								}else{
									$hasToken = password_hash($token,PASSWORD_DEFAULT);
									mysqli_stmt_bind_param($stmto,"ssss",$emailAdresa,$selektor,$hasToken,$vyprseniPlatnosti);   //rekne cim se zameni hesloResetEmail=? pred provedenim stmt
									mysqli_stmt_execute($stmto); // vykona stmt
								}



								//registrace ulozeni do databaze
								$hasHesla=password_hash($hesloJedna, PASSWORD_DEFAULT);
								mysqli_stmt_bind_param($stmt, "sssss", $jmenoUzivatele,$emailAdresa,$hasHesla,$gdpr,$datum);
								mysqli_stmt_execute($stmt);
								header("Location: ../index.php?registraceuspesna=success");
								exit();
							}
						}
					}
					}
				mysqli_stmt_close($stmt);
				mysqli_close($pripojeni);
			}
			else {
				header("Location: ../index.php");
				exit();
			}
    }
	}
?>
