<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>
    <title>Vodič kroz Pariz</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="Pariz, Vodič">
    <meta name="description" content="Vodič kroz Pariz i njegove znamenitosti">
    <meta name="author" content="Dora Budić">
</head>

<body>
    
<?php 
include("funkcije.php");
$n = rezultati();
if (empty($n)){
    echo "<h1>Nema rezultata<h1>";
}
else{

echo "<br>
	<table summary=>
		<tr>
			<th>Slika</th>
			<th>Naziv</th>
			<th>Adresa</th>
			<th>Web</th>
			<th>Pristup</th>
		</tr>";
foreach ($n as $k => $v){
echo "
                <tr>
                    <td>Slika</td>
                    <td>" . $v["NAZIV"] . "</td>
					<td>" . $v["ULICA"] . "</td>
					<td>Web</td>
					<td>";
                foreach ($v["PRISTUP"] as $p){
                    echo $p->getAttribute("vrsta")  . ", Linija " . $p->getElementsByTagName("linija")->item(0)->textContent .
                    ", Stanica ". $p->getElementsByTagName("stanica")->item(0)->textContent;
				}
					echo "</td>
                </tr>";
                }
				
				
                echo "
            </table>
            <br>
            "; } ?>
    
</body>


</html>
