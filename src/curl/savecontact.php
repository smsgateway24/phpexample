<?php

/* Method  to create a single sms according to the documentation at the link. Curl is used */
/* https://smsgateway24.com/en/docs/apidocumentation */

$baseUrl = "https://smsgateway24.com";
$endpoint = "/getdata/savecontact";
$url = $baseUrl.$endpoint;
$paramsArr = [];

/* Required fields */
$paramsArr['token'] = "1f0e86f9fe7ee6b52724fd5fd3511225"; // put here your token
$paramsArr['phone'] = "+49 157 52982212";  // our real number
$paramsArr['tag_id'] = "1009";  // use response from `savetag` reaquest


/* Optional fields */
$paramsArr['fullname'] = "Support Team SmsGateWay24";

$ch = curl_init();

curl_setopt($ch, \CURLOPT_URL, $url);
curl_setopt($ch, \CURLOPT_POST, 1);
curl_setopt($ch, \CURLOPT_POSTFIELDS, $paramsArr);
curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close($ch);

/* Example of good answer: */
/* {"error":0,"message":"Ok","contact_id":566706} */

/* if you prefer array: */
$responceArr  = json_decode($server_output);
echo $server_output;
?>
