<?php
  session_start();
  include_once 'dtb.php';

  if(isset($_POST['odeslatZadost']))
  {
     $emailUzivatele=$_POST["email"];
     $selektor = bin2hex(random_bytes(8)); //pro bezpecnost proti hackerum
     $token = random_bytes(32);

     $url = "https://unitrp.eu/phpStranky/vytvoreniNovehoHesla.php?selektor=" . $selektor ."&validator=". bin2hex($token);

     $vyprseniPlatnosti = date("U") + 1800; //dnesni datum + 1800 sekund

     if(empty($emailUzivatele)){
       header("Location: ../phpStranky/zapomenuteHeslo.php?resetnevyplnenepole=email");
       exit();
     }
     $sql = "DELETE FROM resethesla WHERE hesloResetEmail=?";    //smazani existujicich tokenu
     $stmt = mysqli_stmt_init($pripojeni); //zjisteni jestli funguje pripojeni a lze vykonat
     if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location: ../index.php?zadost=errorsql");
       exit();
     }else{
       mysqli_stmt_bind_param($stmt,"s",$emailUzivatele);   //rekne cim se zameni hesloResetEmail=? pred provedenim stmt
       mysqli_stmt_execute($stmt); // vykona stmt
     }
     $sql = "INSERT INTO resethesla (hesloResetEmail,hesloResetSelektor,hesloResetToken,hesloResetVyprseni) VALUES (?,?,?,?);";  //zavorky slouzi k upresneni kam presne pridat value
     $stmt = mysqli_stmt_init($pripojeni); //zjisteni jestli funguje pripojeni
     if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location: ../index.php?zadost=errorsql");
       exit();
     }else{
       $hasToken = password_hash($token,PASSWORD_DEFAULT);
       mysqli_stmt_bind_param($stmt,"ssss",$emailUzivatele,$selektor,$hasToken,$vyprseniPlatnosti);   //rekne cim se zameni hesloResetEmail=? pred provedenim stmt
       mysqli_stmt_execute($stmt); // vykona stmt
     }

     mysqli_stmt_close($stmt); //uzavreni $stmt

     $do=$emailUzivatele;
     $predmet = 'Obnovení hesla na UnitRP.eu';

     $zprava='<p>Dostali jsme zprávu, že jste zapomněl/a vaše heslo na stránce UnitRP.eu. Následující link vás zavede na stránku pro obnovení hesla.</p>';
     $zprava .= '<p>Link: </br>';
     $zprava .= '<a href="' . $url . '">' . $url . '</a></p>';

     $header = "from: UnitRP.eu bot <www.unitrp.eu>\r\n";
     $header .= "Reply-To<unitrp@seznam.cz>\r\n";
     $header .= "Content-type: text/html\r\n";

     mail($do, $predmet, $zprava, $header);

     header("Location: ../index.php?zadost=odeslana");
     exit();
  }
?>
