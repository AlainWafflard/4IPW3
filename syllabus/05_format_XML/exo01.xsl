<?xml version="1.0" encoding="iso-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
	<html>
		<head>
		<style>
		.hello
		{
			text-align:center; 
			font-family:Tahoma; 
			font-size:48pt; 
			color:blue;
		}
		</style>
		</head>
		<body>
			<div class="hello">
				<xsl:value-of select="/hello" />
			</div>
		</body>
		</html>
</xsl:template>

</xsl:stylesheet>