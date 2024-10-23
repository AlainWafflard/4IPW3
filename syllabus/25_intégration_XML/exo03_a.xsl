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
		<xsl:for-each select="biblio/livre"><div class="livre">
			<div>"<xsl:value-of select="./titre" />"</div>
			<div>
				Auteur : <xsl:value-of select="./auteur" />
				<xsl:if test="./nb_tomes">
					<div>
						Nombre de tomes : 
						<xsl:value-of select="./nb_tomes/@value" /> 

					</div>
				</xsl:if>
				<xsl:if test="@lang='en'">
					<div>Attention : livre en Anglais.</div>
				</xsl:if>
				<xsl:if test="@lang='nl'">
					<div>Attention : livre en Néerlandais.</div>
				</xsl:if>
				<div>
					Pays : <xsl:value-of select="./auteur/@country" /> 
				</div>
			</div>
		</div></xsl:for-each>
    </body>
  </html>
</xsl:template>
</xsl:stylesheet>