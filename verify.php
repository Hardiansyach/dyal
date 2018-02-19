<?php
$access_token = '9JQUK2JLGt6Zc+iKf15mZ5+UxfaZTsiCXBi/PZPAXmNVv8lF47gZljRMwnaFadIPKkQI6HYakZuW7Svl/Zl85DTfNsYkMFNfziMR6PzGgXVlpvoi9A+NaWNLxcUKe+QHIK0Br41U0o116uMvHOKG2wdB04t89/1O/w1cDnyilFU=';
$url = 'https://api.line.me/v1/oauth/verify';


$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
