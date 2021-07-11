<?php

/* Method  to create a single sms according to the documentation at the link. Curl is used */
/* https://smsgateway24.com/en/docs/apidocumentation */

$baseUrl = "https://smsgateway24.com";
$endpoint = "/getdata/addalotofsms";
$url = $baseUrl . $endpoint;
$paramsArr = [];


/* Required fields */
$paramsArr['token'] = "1f0e86f9fe7ee6b52724fd5fd3511225";
$paramsArr['smsdata'] = [
    [
        "sendto" => "+49 157 52982212",
        "body" => "test message 1",
        "device_id" => "260",
        "sim" => 0,
        "timetosend" => "2019-07-01 23:50:00",
        "urgent" => "1"

    ],[
        "sendto" => "+49 157 52982212",
        "body" => "test message 2 ",
        "device_id" => "260",
        "sim" => 0,
        "timetosend" => "2019-07-01 23:50:00",
        "urgent" => "1"
    ]
];
$json = json_encode($paramsArr);

$arr['datajson'] = $json;


$ch = curl_init();

curl_setopt($ch, \CURLOPT_URL, $url);
curl_setopt($ch, \CURLOPT_POST, 1);
curl_setopt($ch, \CURLOPT_POSTFIELDS, $arr);
curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close($ch);

/* Example of good answer: */
/* {"error":0,"message":"Sms has been saved successfully"}% */

/* if you prefer array: */
$responceArr = json_decode($server_output);
echo $server_output;
?>
