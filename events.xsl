<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">
<xsl:template match="/">
  <html>
  <head><link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css"/></head>
  <body><div id='events'>
   <p><input class="search" placeholder="Search" /></p>
    <table class="pure-table pure-table-striped pure-table-bordered">
     <thead>
      <tr>
        <th>Event</th>
        <th>Start</th>
        <th>End</th>
      </tr>
     </thead>
     <tbody class="list">
      <xsl:for-each select="Occurrences/Occurrence">
      <tr>
        <td class="Event"><xsl:value-of select="Name"/></td>
	<td class="Start"><xsl:value-of select="OccurrenceStartTime"/></td>
        <td class="End"><xsl:value-of select="OccurrenceEndTime"/></td>
        <!-- <td><xsl:element name="a"><xsl:attribute name="href"><xsl:value-of select="ContactEmail"/></xsl:attribute><xsl:value-of select="ContactName"/>@<xsl:value-of select="ContactPhone"/></xsl:element></td> -->
      </tr>
      </xsl:for-each>
     </tbody>
    </table>
  </div>
  <script src="http://listjs.com/no-cdn/list.js"></script>
  <script type="text/javascript">
    var options = {
      valueNames: [ 'Event', 'Start', 'End' ]
    }
    var MyList = new List('events', options);
    var n = new Date();
    MyList.filter(function(item) {
     var d = new Date(item.values().End); 
     if ( d.getTime() > n.getTime()) {
        return true;
      } else { 
        return false;
      }
    });
  </script>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>
