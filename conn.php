<?php
    $uname="root";
    $passwd="";
    $serv="localhost";
    $db="vj";
    $con=mysqli_connect($serv,$uname,$passwd,$db);
	    if(!$con)
		    die("<h2>connection Failed : ".mysqli_connect_error()."</h2>");
?>