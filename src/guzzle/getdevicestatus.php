<?php

use GuzzleHttp\Client;
require dirname(__DIR__).'/../vendor/autoload.php';


/* Method  to get Devices according to the documentation at the link. Curl is used */
/* https://smsgateway24.com/en/docs/apidocumentation */
$timeout = 2.0;
$baseUrl = "https://smsgateway24.com";
$endpoint = "/getdata/getdevicestatus";
$url = $baseUrl.$endpoint;
$paramsArr = [];

/* Required fields */
$paramsArr['token'] = "123286f9fe7ee6b52724fd5fd3516865"; // put here your token
$paramsArr['device_id'] = "260"; // put here your token

$formParams = [
    'form_params' => $paramsArr,
];

$client = new Client([
    'base_uri' => $baseUrl,
    'timeout' => $timeout,
]);

$response = $client->request('POST', $endpoint, $formParams);

/* Example of good answer: */
/* {"online":false,"error":0,"message":"OK","device_id":260,"lastseen":{"date":"2020-08-11 16:09:53.000000","timezone_type":1,"timezone":"+02:00"},"diffseconds":28851900,"title":"SM-F NIK!"}%    */

echo $response->getBody();

?>
