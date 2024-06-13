<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://212.22.169.117:8081/api/v1/Accounts/Token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "email": "YLcyFc88JX@IgfW.kwt",
    "password": "commodo mollit proident fu"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Accept: application/json',
    'x-api-key: SkFNQk9QQVk6UlEyMVpGMjA='
  ),
));

$response = curl_exec($curl);

if ($response === false) {
    echo 'cURL error: ' . curl_error($curl);
} else {
    echo $response;
}

curl_close($curl);
