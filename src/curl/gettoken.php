<?php

/* Method  to get token according to the documentation at the link. Curl is used */
/* https://smsgateway24.com/en/docs/apidocumentation */

$baseUrl = "https://smsgateway24.com";
$endpoint = "/getdata/gettoken";
$url = $baseUrl.$endpoint;
$paramsArr = [];

/* Required fields */
$paramsArr['email'] = "support@smsgateway24.com"; // put here your email
$paramsArr['pass'] = "aAY8fWG589xkC3cK";  // put here your password

$ch = curl_init();

curl_setopt($ch, \CURLOPT_URL, $url);
curl_setopt($ch, \CURLOPT_POST, 1);
curl_setopt($ch, \CURLOPT_POSTFIELDS, $paramsArr);
curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close($ch);

/* Example of good answer: */
/* {"error":0,"token":"1f0e86f9fe7ee6b52724fd5fd3511225","message":"OK"} */

/* if you prefer array: */
$responceArr  = json_decode($server_output);
echo $server_output;

?>
