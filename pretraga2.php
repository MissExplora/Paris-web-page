<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>
    <title>Vodič kroz Pariz</title>
    <link rel="stylesheet" type="text/css" href="dizajn.css">
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

foreach ($n as $k => $v){
echo "
    <br>
            <table summary=>
                <tr>
                    <td>Naziv</td>
                    <td>" . $v["NAZIV"] . "</td>
                </tr>
                <tr>
                    <td>Ulica</td>
                    <td>" . $v["ULICA"] . "</td>
                </tr>
                <tr>
                    <td>Arrondissement</td>
                    <td>" . $v["KVART"] . "</td>
                </tr>
                <tr>
                    <td>Telefon</td>
                    <td>" . $v["TEL"] . "</td>
                </tr>
                <tr>
                    <td>Web stranica</td>
                    <td>" . $v["WEB"] . "</td>
                </tr>
                <tr>
                    <td rowspan='2'>Radno vrijeme</td>
                    <td>" . $v["DANI"] . "</td>
                </tr>
                <tr>
                    <td>" . $v["VRIJEME"] . "
                    </td>
                </tr>
                <tr>
                    <td>Tip znamenitosti</td>
                    <td>
                        " . $v["TIP"] . "
                    </td>
                </tr>
                <tr>
                    <td>Cijena ulaznice (u eurima)</td>
                    <td>
                        " . $v["CIJENA"] . "
                    </td>
                </tr>
                <tr>";
                foreach ($v["PRISTUP"] as $p){
                    echo "
                    <td>Pristup</td>
                    <td>
                    " . $p->getAttribute("vrsta")  . ", Linija " . $p->getElementsByTagName("linija")->item(0)->textContent . 
                    ", Stanica ". $p->getElementsByTagName("stanica")->item(0)->textContent . "
                    </td>
                </tr>";
                }
                echo "
            </table>
            <br>
            "; }} ?>
    </div>
    
    <div id="podnozje">
        <p>Autor stranice: Dora Budić, FER
            <a href="http://validator.w3.org/check?uri=referer"><img
              src="http://www.w3.org/Icons/valid-html401" alt="Valid HTML 4.01 Strict" height="31" width="88"></a>
        </p>
    </div>
    
</body>


</html>
