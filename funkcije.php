<?php
function makni_prazne($arr){
    $postojeci = array();
    foreach($arr as $key => $value){
        if (!empty($value)){
            $postojeci[$key] = strtolower($value);
        }
    }
    return $postojeci;
}
#translate(., 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz')
#
function tr($n){
    return "translate($n, 'ABCDEFGHIJKLMNOPQRSTUVWXYZŠĐČĆŽ', 'abcdefghijklmnopqrstuvwxyzšđčćž')";
}


#naziv=&ulica=&Arrondissement=&telefon=&web=&radno_vrijeme=&linija=&stanica=
function kreiraj_upite($array_parametara){
    $puni = makni_prazne($array_parametara);
    $upiti = array();
    foreach($puni as $k=>$v){
            switch($k){
                case "naziv":#ok
                    $upiti[]="contains(".tr("naziv").", '$v')";
                    break;
                case "ulica":#ok
                    $upiti[]="contains(".tr("adresa/ulica").",'$v')";
                    break;
                case "arrondissement":#ok
                    $upiti[]="contains(". tr("adresa/ulica/@arrondissement") . ", '$v')";
                    break;
                case "telefon":#ok
                    $upiti[]="contains(telefon, '$v')";
                    break;
                case "web":#ok
                    $upiti[]="contains(".  tr("web") . ", '$v')";
                    break;
                case "vrijeme":#ok
#                    $upiti[]="contains(" . tr("radno_vrijeme/vrijeme") . ", '$v')";
                    $tmp = array();
                    foreach($_REQUEST["vrijeme"] as $vv){
                        $tmp[] = " radno_vrijeme/vrijeme='$vv' ";
                    }
                    $upiti[]="(". implode(" or ", $tmp) . " )";
                    break;
 
                case "linija":#ok
                    $upiti[]="contains(" . tr("pristup/linija") . ", '$v')";
                    break;
                case "dan":#ok
                    $upiti[]="contains(" . tr("radno_vrijeme/@dani") . ", '$v')";
                    break;
                case "stanica":#ok
                    $upiti[]="contains(". tr("pristup/stanica") . ", '$v')";
                    break;
                case "pristup":#ok
                    $tmp = array();
                    foreach($_REQUEST["pristup"] as $vv){
                        $tmp[] = " pristup/@vrsta='$vv' ";
                    }
                    $upiti[]="(". implode(" or ", $tmp) . " )";
                    break;
                case "cijena":#ok
                    $upiti[]=" @cijena_ulaznice='$v'";
                    break;
                case "tip_znamenitosti":#ok
                    $upiti[]=tr("@tip_znamenitosti") . "='$v' ";
                    break;

            }
    }
    if (empty($upiti)) return "/vodic/znamenitost";
    return "/vodic/znamenitost[" . implode(" and ", $upiti) . "]";
}

function nadjisve(){
    $xmlDoc = new DOMDocument();
    $xmlDoc->load("podaci.xml");
    $xp = new DOMXPath($xmlDoc);
	#echo kreiraj_upite($_REQUEST);
    return $xp->query(kreiraj_upite($_REQUEST));
}


function rezultati(){
    $rez = array();
    foreach (nadjisve() as $k => $v){
		$ulica = $v->getElementsByTagName("adresa")->item(0)->getElementsByTagName("ulica")->item(0)->textContent;
		$xml = new SimpleXMLElement(file_get_contents("http://nominatim.openstreetmap.org/search?q=" . urlencode($ulica) . "&format=xml")); 
		$lon = $xml->children()[0]['lon'];
		$lat = $xml->children()[0]['lat'];
		if ($lon == NULL) $lon=$lat="Nema podataka";
		$web = $v->getElementsByTagName("web")->item(0)->textContent;
		if ($web == NULL) $web = "Nema podataka";
		
		
		
        $rez[] = array(
            "NAZIV" => $v->getElementsByTagName("naziv")->item(0)->textContent,
			"ULICA" => $ulica,
			"KOORDINATE" => "lat: " . $lat . " lon: " . $lon,
            "WEB" => $web,
			"PRISTUP" => $v->getElementsByTagName("pristup"),
			"ID" => $v->getAttribute("bla")
        );
    }
    return $rez;
}

function nadjiSamoJedan($argument){
	$xmlDoc = new DOMDocument();
	$xmlDoc->load("podaci.xml");
	$xp = new DOMXPath($xmlDoc);
	$tmp = $xp->query("/vodic/znamenitost[@bla='$argument']");
	return $tmp;
}
?>
