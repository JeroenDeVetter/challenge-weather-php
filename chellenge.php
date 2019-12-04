<?php
      $input = $_GET['input'];
      $json = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/forecast?q=$input&units=metric&APPID=d02ba4169b2ac4f0d179b1e84c341147"));
function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/weather-icons-wind.css">
    <link rel="stylesheet" href="css/weather-icons.css">
    <title>Document</title>
</head>
<body>
  <h1>Weather App Jeroen PHP</h1>
  <form method="get">
    <input type="text" name="input" placeholder="City"><br>
    <button type="submit" value="Submit">Click here</button>
</form>

<div id="weather">
    <h1><?php echo $json->city->name?></h1>
 <?php
     for ($i = 0; $i < count($json->list) ; $i += 8) {
         echo '<div class ="card">';

         $date = date(l ,strtotime($json->list[$i]->dt_txt ));
         $currentDate = date(l);
           if( $date == $currentDate){
               echo '<h2>';
               echo 'Today';
               echo '</h2>';
           } else {
               echo '<h2>';
               echo $date;
               echo '</h2>';
           }
         echo '<p class="description">';
         echo $json->list[$i]->weather[0]->description;
         echo '</p>';



         echo "<p class='percent_cloudDek'>";
         echo $json->list[$i]->clouds->all;
         echo '% clouds in the sky';
         echo "</p>";

         echo "<p class='max_temp'>";
         echo 'Max Temp = ';
         echo $json->list[$i]->main->temp_max;
         echo '°C';
         echo '</p>';

         echo "<p class='min_temp'>";
         echo 'Min Temp = ';
         echo $json->list[$i]->main->temp_min;
         echo '°C';
         echo '</p>';

         echo "<p class='pressure'>";
         echo 'Pressure = ';
         echo $json->list[$i]->main->pressure;
         echo "</p>";

         echo "<p class='wind-speed'>";
         echo 'KMPH ';
         echo intval($json->list[$i]->wind->speed * 3.6);
         echo "</p>";

         $degrades = $json->list[$i]->wind->deg;
         echo "<p>wind direcrion</p>";
         echo "<p id='icons' class='wi wi-wind towards-$degrades-deg'></p>";


         echo '</div>';
     }


    ?>

</div>
</body>
</html>