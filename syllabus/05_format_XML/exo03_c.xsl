<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet 
	version="1.0" 
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
>
<xsl:template match="/">
  <html>
	<head>
		<title>Contenu de ma bibliothèque</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<link rel="stylesheet" type="text/css" href="library.css" />
    </head>
    <body>
		<h1>Contenu de ma bibliothèque</h1>
		<div class="recap"> <table>
		<tr>
			<th>Titre</th>
			<th>Auteur</th>
			<th>Nombre de tomes</th>
			<th>Langue</th>
		</tr>
		<xsl:for-each select="biblio/livre">
			<tr>
			<td>"<xsl:value-of select="./titre" />"</td>
			<td>
				<xsl:for-each select="./auteur">
					<xsl:value-of select="."/><br />
				</xsl:for-each>
			</td>
			<td>
				<xsl:choose>
				  <xsl:when test="./nb_tomes">
					<xsl:value-of select="./nb_tomes/@value" /> 
				  </xsl:when>
				  <xsl:otherwise>
					1
				  </xsl:otherwise>
				</xsl:choose>
			</td>
			<td>
				<xsl:value-of select="./@lang" />
			</td>			
		</tr></xsl:for-each>
		</table></div>
    </body>
  </html>
</xsl:template>
</xsl:stylesheet>