<?php 
require_once "config.php";
// API Call Example: http://api.serviceu.com/rest/events/occurrences?orgkey={3decaac4-0d4b-45e2-9845-ed62823f3161}&nextDays=1&format=xml&callback=?
if (count($_GET) == 0) {
  //Right now we just have the occurrences api, but we could add the others all wrapped up into one, or modularize it into a different file per call.
  echo <<< EOF
<html>
  <head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css"/>
    <!--[if lte IE 8]><link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css"><![endif]-->
    <!--[if gt IE 8]><!--><link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css"><!--<![endif]-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:200">
  </head><body>
  <form class="pure-form pure-form-stacked" action="" method="get">
    <fieldset>
        <legend>Events Filter</legend>
        <div class="pure-g">
            <div class="pure-u-1 pure-u-md-1-3">
               <label for="startDate">Start Date (mm/dd/yyyy)</label>
                <input name="startDate" id="startDate" class="pure-u-23-24" type="text">
            </div>
            <div class="pure-u-1 pure-u-md-1-3">
               <label for="endDate">End Date (mm/dd/yyyy)</label>
                <input name="endDate" id="endDate" class="pure-u-23-24" type="text">
            </div>
            <div class="pure-u-1 pure-u-md-1-3">
               <label for="eventName">Event Name</label>
                <input name="eventName" id="eventName" class="pure-u-23-24" type="text">
            </div>
            <div class="pure-u-1 pure-u-md-1-3">
               <label for="categoryIds">Category ID</label>
                <input name="categoryIds" id="categoryIds" class="pure-u-23-24" type="text">
            </div>
            <div class="pure-u-1 pure-u-md-1-3">
               <label for="departmentIds">Department ID</label>
                <input name="departmentIds" id="departmentIds" class="pure-u-23-24" type="text">
            </div>
            <div class="pure-u-1 pure-u-md-1-3">
               <label for="nextDays">Future Days from Yesterday</label>
                <input name="nextDays" id="nextDays" class="pure-u-23-24" type="text" value="1">
            </div>
        </div>
        <button type="submit" onClick="submitFunc();" class="pure-button pure-button-primary">Submit</button>
    </fieldset>
  </form>
</body></html>
EOF;
} else {
  if (strlen($_GET['debug']) == 0) {
    echo '<?xml version="1.0" encoding="ISO8859-1" ?><?xml-stylesheet type="text/xsl" href="events.xsl"?>';
  }
  header('Content-type: application/xml');
  //Get the XML
  $url = "http://api.serviceu.com/rest/events/occurrences?orgkey={" . $key . "}";
  $url = strlen($_GET['startDate']) > 0 ? $url = $url . "&startDate=" . $_GET['startDate'] : $url;
  $url = strlen($_GET['endDate']) > 0 ? $url = $url . "&endDate=" . $_GET['endDate'] : $url;
  $url = strlen($_GET['eventName']) > 0 ? $url = $url . "&eventName=" . $_GET['eventName'] : $url;
  $url = strlen($_GET['categoryIds']) > 0 ? $url = $url . "&categoryIds=" . $_GET['categoryIds'] : $url;
  $url = strlen($_GET['departmentIds']) > 0 ? $url = $url . "&departmentIds=" . $_GET['departmentIds'] : $url;
  $url = strlen($_GET['nextDays']) > 0 ? $url = $url . "&nextDays=" . $_GET['nextDays'] : $url;
  $url = $url . "&format=xml&callback=?";
  echo '<xsl:value-of  select="current-dateTime()"/>';
  echo file_get_contents($url);
}
?>
