<?php
// Start the session
session_start();
include "BarcodeQR.php"; 
// set BarcodeQR object 
			$qr = new BarcodeQR(); 
			//echo $_SESSION["tracknumber"];

			// create URL QR code 
			$qr ->text ($_SESSION["tracknumber"]);
			//echo $_SESSION["tracknumber"];
			//$qr->url("www.shayanderson.com"); 

			//$qr ->text ("andronikos");

			// display new QR code image 
			$qr->draw();
			
?>