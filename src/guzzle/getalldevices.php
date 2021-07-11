<?php

use GuzzleHttp\Client;
require dirname(__DIR__).'/../vendor/autoload.php';


/* Method  to get Devices according to the documentation at the link. Curl is used */
/* https://smsgateway24.com/en/docs/apidocumentation */
$timeout = 2.0;
$baseUrl = "https://smsgateway24.com";
$endpoint = "/getdata/getalldevices";
$url = $baseUrl.$endpoint;
$paramsArr = [];

/* Required fields */
$paramsArr['token'] = "123286f9fe7ee6b52724fd5fd3516865"; // put here your token

$formParams = [
    'form_params' => $paramsArr,
];

$client = new Client([
    'base_uri' => $baseUrl,
    'timeout' => $timeout,
]);

$response = $client->request('POST', $endpoint, $formParams);

echo $response->getBody();

?>
