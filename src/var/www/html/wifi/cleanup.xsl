<?xml version="1.0"?>
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:html="http://www.w3.org/1999/xhtml"
                exclude-result-prefixes="html">

<xsl:output method="html" indent="yes" encoding="MacRoman"/>

<xsl:template match="wlan_devices">
	<xsl:element name="table">
		<xsl:element name="thead">
			<xsl:element name="tr">
			<th>Name</th><th>Freq</th><th>Qual</th><th>Level</th><th>Encoded</th>
			</xsl:element>
		</xsl:element>
		<xsl:element name="tbody">
		<xsl:apply-templates/>  
		</xsl:element>
	</xsl:element>
</xsl:template>

<xsl:template match="device">
	<xsl:element name="tr">
		<xsl:element name="td"><xsl:element name="a">
			<xsl:attribute name="href">setWep.php?ssid=<xsl:value-of select="./ssid"/></xsl:attribute>
			<xsl:value-of select="./ssid"/></xsl:element></xsl:element>
		<xsl:element name="td"><xsl:value-of select="./freq"/></xsl:element>
		<xsl:element name="td"><xsl:value-of select="./qual"/></xsl:element>
		<xsl:element name="td"><xsl:value-of select="./level"/></xsl:element>
		<xsl:element name="td"><xsl:value-of select="./encoding"/></xsl:element>
	</xsl:element>
</xsl:template>

</xsl:stylesheet>
