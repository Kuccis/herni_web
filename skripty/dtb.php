<?php
	$pripojeni=mysqli_connect("md85.wedos.net", "a246525_unitrp", "h6qumEcn","d246525_unitrp");

	if(!$pripojeni){
        die("Připojení selhalo: ".mysqli_connect_error());
    }
?>
