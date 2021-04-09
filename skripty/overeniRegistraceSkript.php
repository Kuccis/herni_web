<?php
   if(isset($_POST["potvrzeniRegistrace"])){
     $selektor = $_POST["selektor"];
     $validator = $_POST["validator"];

     $dnesniDatum = date("U");
     require 'dtb.php';

     $sql = "SELECT * FROM overeniemail WHERE selektor=? AND vyprseni >= ?";
     $stmt = mysqli_stmt_init($pripojeni); //zjisteni jestli funguje pripojeni a lze vykonat
     if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location: ../index.php?finalreg=problemStokenem");
       exit();
     }else{
       mysqli_stmt_bind_param($stmt,"ss",$selektor,$dnesniDatum);   //rekne cim se zameni hesloResetEmail=? pred provedenim stmt
       mysqli_stmt_execute($stmt); // vykona stmt

       $vys = mysqli_stmt_get_result($stmt);
       if (!$row = mysqli_fetch_assoc($vys)) {  //vezmeme data z vys a pridame je do asociativniho pole
         header("Location: ../index.php?finalreg=jeUzPotvrzena");
         exit();
       }else{

         $tokenBin = hex2bin($validator);
         $tokenCheck = password_verify($tokenBin,$row["validator"]);

         if ($tokenCheck === false) { //kontrolujeme jestli token check je true nebo false
           header("Location: ../index.php?finalreg=problemStokenem");
           exit();
         }else if($tokenCheck === true){//kontrola jestli je true. Kontroluji pomoc else if kdyby se nahodou pokazil kod a vysledek by nebyl true/false.
           $email = $row['email'];
           $sql = "SELECT * FROM uzivatele WHERE email=?;";
           $stmt = mysqli_stmt_init($pripojeni);
           if(!mysqli_stmt_prepare($stmt,$sql)){
             header("Location: ../index.php?finalreg=problemStokenem");
             exit();
           }else{
             mysqli_stmt_bind_param($stmt,"s",$email);
             mysqli_stmt_execute($stmt);
             $vys = mysqli_stmt_get_result($stmt);
             if(!$row = mysqli_fetch_assoc($vys)){
               header("Location: ../index.php?finalreg=problemStokenem");
               exit();
             }else{
                  $sqli = "UPDATE uzivatele SET overeni=1 WHERE email=?";
                  $stmti = mysqli_stmt_init($pripojeni);

                  $sql = "DELETE FROM overeniemail WHERE email=?";
                  $stmt = mysqli_stmt_init($pripojeni);

                  if(!mysqli_stmt_prepare($stmt,$sql) || !mysqli_stmt_prepare($stmti,$sqli)){
                    echo "Error!!!!!!!!!";
                    exit();
                  }else{
                    mysqli_stmt_bind_param($stmti,"s",$email);
                    mysqli_stmt_execute($stmti);

                    mysqli_stmt_bind_param($stmt,"s",$email);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?finalreg=uspesna");
                    exit();
                  }
                }
             }
           }
         }
       }

   }else{
     header("Location: ../index.php");
   }

?>
