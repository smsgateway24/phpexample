<?php

/* Method  to get Devices according to the documentation at the link. Curl is used */
/* https://smsgateway24.com/en/docs/apidocumentation */

$baseUrl = "https://smsgateway24.com";
$endpoint = "/getdata/getalldevices";
$url = $baseUrl.$endpoint;
$paramsArr = [];

/* Required fields */
$paramsArr['token'] = "1f0e86f9fe7ee6b52724fd5fd3511225"; // put here your token

$ch = curl_init();

curl_setopt($ch, \CURLOPT_URL, $url);
curl_setopt($ch, \CURLOPT_POST, 1);
curl_setopt($ch, \CURLOPT_POSTFIELDS, $paramsArr);
curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close($ch);


/* if you prefer array: */
$responceArr  = json_decode($server_output);
echo $server_output;

?>
