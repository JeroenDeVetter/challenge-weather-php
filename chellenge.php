<?php


  function click() {

      $json = json_decode(file_get_contents('http://api.openweathermap.org/data/2.5/forecast?'+ $_GET['subject']  +'&APPID=d02ba4169b2ac4f0d179b1e84c341147'));
  }

?>
<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <input type="button" name="Release" onclick="document.write('<?php hello() ?>');" value="Click to Release">
  <button></button>
</body>
</html>