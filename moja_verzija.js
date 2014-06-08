var req;
var map = L.map('karta').setView([48.858859,2.3470599], 12);
var Esri_WorldTopoMap = L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by- sa/2.0/"> CC-BY-SA</a>'
});


function promijeniBoju(red){
	red.style.backgroundColor = "#FAAC58";
	return true;
}

function vratiNatrag(red){
	red.style.backgroundColor = "#FFFFF0";
	return true;
}

function vratiDetalje(id){
    if (window.XMLHttpRequest){
        req = new XMLHttpRequest();
    } else if (window.ActiveXObject){
        req = new ActiveXObject("Microsoft.XMLHTTP");
    }
    if (req){
		var url = "http://localhost/detalji.php?id="+id;
		req.open("GET", url, true);
		var detalji = document.getElementById("detaljici");
		req.send(null);
		req.onreadystatechange = function() {
			if (req.readyState == 4) {
				if (req.status == 200){
					detalji.innerHTML = req.responseText;
					document.getElementById('tablicica').style["top"] = "-480px";
					var koordinate = eval(document.getElementById('skriveni').textContent);
					var marker = L.marker(koordinate).addTo(map);
					marker.bindPopup("Bla bla bla").openPopup();
				} else {
					detalji.innerHTML = "Doslo je do pogreske!";
				}
			}
		};
	}	
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
}*/




