<?php

/* Method  to create a single sms according to the documentation at the link. Curl is used */
/* https://smsgateway24.com/en/docs/apidocumentation */

$baseUrl = "https://smsgateway24.com";
$endpoint = "/getdata/addsms";
$url = $baseUrl.$endpoint;
$paramsArr = [];

/* Required fields */
$paramsArr['token'] = "5f0e86f9fe7ee6b52724fd5fd3511225"; // put here your token
$paramsArr['sendto'] = "+49 157 52982212";  // our Support number :) Text us to WhatsApp Or Telegram if you need help!
$paramsArr['body'] = "Test message from API"; // also you can send long messages
$paramsArr['device_id'] = "260";
$paramsArr['sim'] = "0";  // 0 or 1. try first 0.

/* Optional fields */
$paramsArr['timetosend'] = "2021-08-01 12:00";  // When SMS should go
$paramsArr['customerid'] = "19921"; //  any ID from your internal system.  Then you can use this feature in reports
$paramsArr['urgent'] = "1";
$paramsArr['template_id'] = "12";

$ch = curl_init();

curl_setopt($ch, \CURLOPT_URL, $url);
curl_setopt($ch, \CURLOPT_POST, 1);
curl_setopt($ch, \CURLOPT_POSTFIELDS, $paramsArr);
curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close($ch);

/* Example of good answer: */
/* {"error":0,"sms_id":22074938,"message":"Sms has been saved successfully"} */

/* if you prefer array: */
$responceArr  = json_decode($server_output);

?>
