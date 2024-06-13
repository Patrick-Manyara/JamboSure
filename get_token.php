<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://accounts.jambopay.com/v2/auth/token?grant_type=client_credentials&client_id=a12e01ff4bf99c97de376bd32ecd9e698582c25c5b4a65bdd13e0ba7e324f99e&client_secret=YTEyZTAxZmY0SkFNQk9iZjk5Yzk3ZGUzNzZiZDNiNDQwNzlQUk9ELTEwMTctNDE0ZS1iOWJkLTYzMTA2OTU5MDhhNjMyZUNIRUNLT1VUY2Q5ZTY5ODU4SU5TVVJFMmMyNWM1YjREQVZJRGE2NWJkZDEzZTBiYTdlMzI0Zjk5ZQ%3D%3D',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'client_id=a12e01ff4bf99c97de376bd32ecd9e698582c25c5b4a65bdd13e0ba7e324f99e&client_secret=YTEyZTAxZmY0SkFNQk9iZjk5Yzk3ZGUzNzZiZDNiNDQwNzlQUk9ELTEwMTctNDE0ZS1iOWJkLTYzMTA2OTU5MDhhNjMyZUNIRUNLT1VUY2Q5ZTY5ODU4SU5TVVJFMmMyNWM1YjREQVZJRGE2NWJkZDEzZTBiYTdlMzI0Zjk5ZQ%3D%3D&grant_type=client_credentials',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
