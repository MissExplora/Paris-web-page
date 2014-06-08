var req;
window.map =  L.map('karta').setView([45,16], 13);


function provjeriStatus(){
	if (req.readyState == 4){
		if (req.status == 200){
			// kod uspješnog odgovora
		} else {
			alert("Nije primljen 200 OK, nego:\n" + req.statusText);
		}
	}
}

function loadXMLDoc(url,fc){
    if (window.XMLHttpRequest){
        req = new XMLHttpRequest();
    } else if (window.ActiveXObject){
        req = new ActiveXObject("Microsoft.XMLHTTP");
    }
    if (req){
        req.onloadend = function (){  document.getElementById('detaljici').innerHTML = req["response"]; 
		document.getElementById('tablicica').style["top"] = "-500px";}
        req.open("GET", url, true);
        req.send();
        return req;
    }
}



function promijeniBoju(red){
	red.style.backgroundColor = "#FAAC58";
	return true;
}

function vratiNatrag(red){
	red.style.backgroundColor = "#FFFFF0";
	return true;
}

function vratiDetalje(id){
	var url = "detalji.php?id="+id;
	var rezultat = loadXMLDoc(url);
	
	
}

/*var retkic = document.getElementsByTagName('tr');
if (retkic == null){
	alert("Nema tr-ova!");
}
else{
	for (var i = 0, len = retkic.length; i < len; i++){
		retkic.item(i).onmouseover = promijeniBoju(retkic.item(i));
		if (retkic.item(i) == null){
			alert("Nema tr-ova!");
		}
	}
}
*/

/*
var map = L.map('karta').setView([45,16], 13);
L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by- sa/2.0/"> CC-BY-SA</a>'
}).addTo(map);
var popup = L.popup();

var koordinate = eval(document.getElementById("skriveni").textContent);

popup.setLatLng(koordinate).setContent("Naziv, koordinate i sajt!").openOn(map);

function loadXMLDoc(url){
    if (window.XMLHttpRequest){
        req = new XMLHttpRequest();
    } else if (window.ActiveXObject){
        req = new ActiveXObject("Microsoft.XMLHTTP");
    }
    if (req){
        req.onloadstart = function(){
                a = document.getElementById(url.substring(url.length - 2,url.length));
                var detalji = a.children[0];
                var slika = a.children[1];
				
                slika.style["display"] = "inline";
                detalji.style["display"]="None";}
            }
        req.onloadend = function (){  document.getElementById('detaljici').innerHTML = req["response"]; 
        document.getElementById('tablicica').style["top"] = "-500px";
        a = document.getElementById(url.substring(url.length - 2,url.length));
        var detalji = a.children[0];
        var slika = a.children[1];
		
        slika.style["display"] = "None";
        detalji.style["display"]="inline";
		var mapa = document.getElementById("karta");
		console.log(mapa);
		mapa.style["display"] = "inherit";
		}
        req.open("GET", url, true);
        req.send();
		
		var mapa = document.getElementById("karta");
		console.log(mapa);
		mapa.style["display"] = "none";
        return req;
}
*/

function loadXMLDoc(url){
    if (window.XMLHttpRequest){
        req = new XMLHttpRequest();
    } else if (window.ActiveXObject){
        req = new ActiveXObject("Microsoft.XMLHTTP");
    }
    if (req){

        req.onloadstart = function(){
                a = document.getElementById(url.substring(url.length - 2,url.length));
                var detalji = a.children[0];
                var slika = a.children[1];

                slika.style["display"] = "inline";
                detalji.style["display"]="None";}
            }

        req.onloadend = function (){  document.getElementById('detaljici').innerHTML = req["response"]; 
                document.getElementById('tablicica').style["top"] = "-500px";

				window.map.remove();
                a = document.getElementById(url.substring(url.length - 2,url.length));
                var detalji = a.children[0];
                var slika = a.children[1];

                slika.style["display"] = "None";
                detalji.style["display"]="inline";
                var koordinate = eval(document.getElementById("skriveni").textContent);
		
				
				
				window.map = L.map('karta').setView(koordinate, 13);
				
				L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
					attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by- sa/2.0/"> CC-BY-SA</a>'
				}).addTo(map);
				var popup = L.popup();
				popup.setLatLng(koordinate).setContent("Naziv, koordinate i sajt!").openOn(map);
				

                mapa.style["display"] = "inherit";
                
        }
        req.open("GET", url, true);
        req.send();
				
        mapa.style["display"] = "none";
        return req;
}
