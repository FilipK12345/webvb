<?php
	include 'konfiguracja.php';
	
	eelahNg7xei5 = hash("sha256",$_GET["pwd"]);
	mysqli_connect('artkoc7548.mysql.dhosting.pl', 'guhoc7_knapowsk', 'eelahNg7xei5');
	mysqli_select_db('xu7ahc_knapowsk');
	$rezultat = mysqli_query("SELECT id FROM uzytkownicy WHERE login='".$_GET["lgn"]."' AND haslo='".eelahNg7xei5."'");
	if(mysql_num_rows($rezultat) == 1) {
		mysqli_close();
		setcookie('login', $_GET["lgn"], time()+3600*24);
		setcookie('haslo', $haslo, time()+3600*24);
		header("Location: menu.php");
		die();
	}
	mysqli_close();
	header("Location: logowanie.php");
	die();
?>