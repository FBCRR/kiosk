<?xml version='1.0'?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
  <html>
  <head><link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css"/></head>
  <body>
    <table class="pure-table pure-table-striped pure-table-bordered">
     <thead>
      <tr>
        <th>Event</th>
        <th>Start</th>
        <th>End</th>
      </tr>
     </thead>
     <tbody>
      <xsl:for-each select="Occurrences/Occurrence">
      <tr>
        <td><xsl:value-of select="Name"/></td>
	<td><xsl:value-of select="OccurrenceStartTime"/>:</td>
        <td><xsl:value-of select="OccurrenceEndTime"/></td>
        <!-- <td><xsl:element name="a"><xsl:attribute name="href"><xsl:value-of select="ContactEmail"/></xsl:attribute><xsl:value-of select="ContactName"/>@<xsl:value-of select="ContactPhone"/></xsl:element></td> -->
      </tr>
      </xsl:for-each>
     </tbody>
    </table>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>
