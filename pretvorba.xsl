<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="xml" indent="yes" doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN" />
  <xsl:template match="/">
	  <html xmlns="http://www.w3.org/1999/xhtml">

	  <head>
	  	<title>Vodič kroz Pariz</title>
	  	<link rel="stylesheet" type="text/css" href="dizajn.css"/>
	  	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	  	<meta name="keywords" content="Pariz, Vodič"/>
	  	<meta name="description" content="Vodič kroz Pariz i njegove znamenitosti"/>
	  	<meta name="author" content="Dora Budić"/>
	  </head>

	  <body>
	  	<div id="zaglavlje">
	  		<h1 class="naslovniTekst">Vodič kroz Pariz</h1>
	  		<a href="index.html">
	  			<img src="parisss.jpg" alt="Slika Eiffelovog tornja" class="naslovnaSlika"/>
	  		</a>
	  	</div>
	
	  	<div id="navigacija">
	  		<ul class="listaNavigacija">
	  			<li><br /></li>
	  			<li><a href="index.html">Početna stranica</a></li>
	  			<li><a href="obrazac.html">Pretraživanje</a></li>
	  			<li><a href="http://www.fer.hr/predmet/or">Otvoreno računarstvo</a></li>
	  			<!-- <li><a href="http://www.fer.unizg.hr" target="_blank">FER</a></li> -->
	  			<li><a href="http://www.fer.unizg.hr" onclick="window.open(this.href, '_blank');return false;">FER</a></li>
				<li><a href="podaci.xml">XML datoteka</a></li>
	  			<li>
					<a>
					 	<xsl:attribute name="href">
							mailto:
							dora.budic@fer.hr
						</xsl:attribute>
						Kontaktiraj autora
				 	</a>
				</li>
	  		</ul>
	  	</div>
	
	  	<div id="tijelo">
	  		<h2>Popis znamenitosti</h2>
	  		
	  		<table class="tablicica" summary="">
	  			<tr>
	  				<th>Naziv</th>
					<th>Adresa</th>
					<th>Radno vrijeme</th>
					<th>Cijena ulaznice</th>
					<th>Pristup</th>
	  			</tr>
				<xsl:for-each select="/vodic/znamenitost">
	  				<tr>
	  					<td>
							<xsl:value-of select="naziv" />
						</td>
	  					<td>
							<xsl:value-of select="adresa/ulica" />
						</td>
	  					<td>
							<xsl:value-of select="radno_vrijeme/dani" /><br />
							<xsl:value-of select="radno_vrijeme/vrijeme" />
						</td>
	  					<td>
							<xsl:value-of select="@cijena_ulaznice" />
						</td>
	  					<td>
							<xsl:for-each select="pristup"> 
								<xsl:value-of select="vrsta" />, 
								<xsl:value-of select="linija" />,
								<xsl:value-of select="stanica" /><br />
							</xsl:for-each>
						</td>
	  				</tr>
				</xsl:for-each>
	  		</table>
	  	</div>
	
	  	<div id="podnozje">
	  		<p>Autor stranice: Dora Budić, FER
	  			<a href="http://validator.w3.org/check?uri=referer"><img
	  		      src="http://www.w3.org/Icons/valid-html401" alt="Valid HTML 4.01 Strict" height="31" width="88"/></a>
	  		</p>
	  	</div>
	
	  </body>


	  </html>
	  
	  
  </xsl:template>
</xsl:stylesheet>