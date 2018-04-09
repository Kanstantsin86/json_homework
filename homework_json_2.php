<?php

header('Content-Type: text/html;charset=UTF-8');

$city = "Brest";
$mode = "json";
$units = "metric";
$lang = "ru";

$url = "http://api.openweathermap.org/data/2.5/weather?q=$city&mode=$mode&units=$units&lang=$lang&APPID=136dd864b3054232fb1d3f1b4fb94af7";

$data = @file_get_contents($url);
$dataJson = json_decode($data);
//print_r($dataJson) . "<br/>";

echo "<hr/>";
echo "Город: " . $dataJson->name . "<br/>";
echo "Страна: " . $dataJson->sys->country . "<br/>";
echo "Сейчас: " . date("j F Y, H:i, P") . "<br/>";
echo "<img src='http://openweathermap.org/img/w/" . $dataJson->weather[0]->icon . ".png' alt='Icon depicting current weather.'>" . "<br/>";
echo "Погода: " . $dataJson->weather[0]->description . "<br/>";
echo "Температура: " . $dataJson->main->temp . "&#8451;" . "<br/>";
echo "Давление: " . $dataJson->main->pressure . " МПа" . "<br/>";
echo "Влажность: " . $dataJson->main->humidity . " %" . "<br/>";
echo "Скорость ветра: " . $dataJson->wind->speed . " м/с" . "<br/>";
echo "Направление ветра: " . $dataJson->wind->deg . "<br/>";
echo "Восход солнца: " . date_sunrise(time(), SUNFUNCS_RET_STRING, 52.09, 23.69, 90, 3) . "<br/>";
echo "Заход солнца: " . date_sunset(time(), SUNFUNCS_RET_STRING, 52.09, 23.69, 90, 3) . "<br/>";
echo "<hr/>";

?>