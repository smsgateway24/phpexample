<?php

use GuzzleHttp\Client;
require dirname(__DIR__).'/../vendor/autoload.php';


/* Method  to create a single sms according to the documentation at the link. Curl is used */
/* https://smsgateway24.com/en/docs/apidocumentation */
$timeout = 2.0;
$baseUrl = "https://smsgateway24.com";
$endpoint = "/getdata/addalotofsms";
$url = $baseUrl . $endpoint;
$paramsArr = [];


/* Required fields */
$paramsArr['token'] = "123286f9fe7ee6b52724fd5fd3516865";
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

$formParams = [
    'form_params' => $arr,
];

$client = new Client([
    'base_uri' => $baseUrl,
    'timeout' => $timeout,
]);

$response = $client->request('POST', $endpoint, $formParams);

/* Example of good answer: */
/* {"error":0,"message":"Sms has been saved successfully"}% */

echo $response->getBody();
?>
