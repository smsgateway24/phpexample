<?php

/* Method  to create a single sms according to the documentation at the link. Curl is used */
/* https://smsgateway24.com/en/docs/apidocumentation */

$baseUrl = "https://smsgateway24.com";
$endpoint = "/getdata/savetag";
$url = $baseUrl.$endpoint;
$paramsArr = [];

/* Required fields */
$paramsArr['token'] = "1f0e86f9fe7ee6b52724fd5fd3511225"; // put here your token
$paramsArr['title'] = "Nesletter for all my Colleagues";  // Title of newsletter.
$paramsArr['device_id'] = "260";
$paramsArr['sim'] = "0";
$paramsArr['body'] = "Hello guys! I invite everyone to join me for a drink to celebrate the release of the library phpexample ";
$paramsArr['tags'] = "1009,1010";  // use response from `savetag`.

$ch = curl_init();

curl_setopt($ch, \CURLOPT_URL, $url);
curl_setopt($ch, \CURLOPT_POST, 1);
curl_setopt($ch, \CURLOPT_POSTFIELDS, $paramsArr);
curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close($ch);

/* Example of good answer: */
/* {"error":0,"message":"Ok","tag_id":1011} */

/* you can check result here */
/* https://smsgateway24.com/en/paket/list */

/* if you prefer array: */
$responceArr  = json_decode($server_output);
echo $server_output;
?>
