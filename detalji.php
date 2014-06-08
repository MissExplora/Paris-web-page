<?php 
include("funkcije.php");

$podaci = nadjiSamoJedan($_GET["id"])->item(0);



$telefon = $podaci->getElementsByTagName("telefon")->item(0)->textContent;
$tip_znamenitosti = $podaci->getAttribute("tip_znamenitosti");
$cijena_ulaznice = $podaci->getAttribute("cijena_ulaznice");
$dani = $podaci->getElementsByTagName("radno_vrijeme")->item(0)->getAttribute("dani");
$radno_vrijeme = $podaci->getElementsByTagName("radno_vrijeme")->item(0)->getElementsByTagName("vrijeme")->item(0)->textContent;
$ulica = $podaci->getElementsByTagName("adresa")->item(0)->getElementsByTagName("ulica")->item(0)->textContent;
$xml = new SimpleXMLElement(file_get_contents("http://nominatim.openstreetmap.org/search?q=" . urlencode($ulica) . "&format=xml")); 
$lon = $xml->children()[0]['lon'];
$lat = $xml->children()[0]['lat'];

//sleep(3);


echo "
	<h3>Detalji</h3>
	<p>
		Telefon: " . $telefon . " <br>
		Tip znamenitosti: " . $tip_znamenitosti . " <br>
		Cijena ulaznice: " . $cijena_ulaznice . " <br>
		Radno vrijeme: <br>
		
			Dani: " . $dani . " <br>
			Sati: " . $radno_vrijeme . " <br>
	</p>
	<div id='skriveni' style='display:none'> [" . $lat . ", " . $lon . "]</div>
		
	";
?>