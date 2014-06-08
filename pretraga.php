<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>
    <title>Vodič kroz Pariz</title>
    <link rel="stylesheet" type="text/css" href="dizajn.css">
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css">
	<script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
	<script type="text/javascript" src="detalji.js"></script>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="Pariz, Vodič">
    <meta name="description" content="Vodič kroz Pariz i njegove znamenitosti">
    <meta name="author" content="Dora Budić">
</head>

<body>
    <div id="zaglavlje">
        <h1 class="naslovniTekst">Vodič kroz Pariz</h1>
        <a href="index.html">
            <img src="parisss.jpg" alt="Slika Eiffelovog tornja" class="naslovnaSlika">
        </a>
    </div>
    
    <div id="navigacija">
        <ul class="listaNavigacija">
            <li><br></li>
            <li><a href="index.html">Početna stranica</a></li>
            <li><a href="obrazac.html">Pretraživanje</a></li>
            <li><a href="http://www.fer.hr/predmet/or">Otvoreno računarstvo</a></li>
            <!-- <li><a href="http://www.fer.unizg.hr" target="_blank">FER</a></li> -->
            <li><a href="http://www.fer.unizg.hr" onclick="window.open(this.href,'_blank');return false;">FER</a></li>
            <li><a href="podaci.xml">XML datoteka</a></li>
            <li><a href="mailto:dora.budic@fer.hr">Kontaktiraj autora</a></li>
        </ul>
		<div id="detaljici"></div>
    </div>
	
	
    
    <div id="tijelo">
       <!-- <h2>Rezultati pretrage</h2> -->
<?php 
include("funkcije.php");
$n = rezultati();
if (empty($n)){
    echo "<h1>Nema rezultata<h1>";
    echo str_repeat("<br>",8);#raspada se css inace :/
}
else{

echo "
	<h2>Rezultati pretrage</h2>
	<br>
	<table class='tablicica' id='tablicica' summary=>
		<tr onmouseover='promijeniBoju(this)' onmouseout='vratiNatrag(this)'>
			<th>Naziv</th>
			<th>Adresa</th>
			<th>Web</th>
			<th>Pristup</th>
			<th>Akcija</th>
		</tr>";
foreach ($n as $k => $v){
echo "
                <tr onmouseover='promijeniBoju(this)' onmouseout='vratiNatrag(this)'>
                    <td>" . $v["NAZIV"] . "</td>
					<td>" . $v["ULICA"] . "</td>
					<td>" . $v["WEB"] . "</td>
					<td>"; 
					foreach ($v["PRISTUP"] as $p){
		            	echo $p->getAttribute("vrsta")  . ", Linija " . $p->getElementsByTagName("linija")->item(0)->textContent . 
		                    ", Stanica ". $p->getElementsByTagName("stanica")->item(0)->textContent;}
					echo "</td>
					<td id='" . $v["ID"] . "'><a href='javascript:void(0)' onclick='vratiDetalje(\"" . $v["ID"] . "\")'>Detalji...</a>
						<img src='/ajax-loader.gif' style='display: none'></td>
                </tr>";
                }
				
				
                echo "
            </table>
            <br>
            "; } ?>
			<div id="karta"></div>
    </div>
    
    <div id="podnozje">
        <p>Autor stranice: Dora Budić, FER
            <a href="http://validator.w3.org/check?uri=referer"><img
              src="http://www.w3.org/Icons/valid-html401" alt="Valid HTML 4.01 Strict" height="31" width="88"></a>
        </p>
    </div>

</body>


</html>
