<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
  <html>
    <head>
      <title>Contenu de ma bibliothèque</title>
      <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
      <link rel="stylesheet" type="text/css" href="library.css" />
    </head>
    <body>
      <h1>Contenu de ma bibliothèque</h1>
    <xsl:for-each select="biblio/livre">
      <div class="livre">
        <div class="titre">
          "<xsl:value-of select="./titre" />"
        </div>
        <div class="auteur">

		  <div>Auteur(s) : 
			<ul>
			  <xsl:for-each select="./auteur">
			    <li>
				  <xsl:value-of select="."/>
			    </li>
			  </xsl:for-each>
			</ul>
		  </div>

		  <div>Nombre de tomes : 
		    <xsl:choose>
			  <xsl:when test="./nb_tomes">
				<xsl:value-of select="./nb_tomes/@value" /> 
			  </xsl:when>
			  <xsl:otherwise>
				1
			  </xsl:otherwise>
		    </xsl:choose>
		  </div>

		  <xsl:if test="@lang='en'">
            <div class="attention">
              Attention : Ce livre est en Anglais.
            </div>
          </xsl:if>

		</div>
		<hr />
      </div>
    </xsl:for-each>
    </body>
  </html>
</xsl:template>
</xsl:stylesheet>
