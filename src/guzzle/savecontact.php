<?php

use GuzzleHttp\Client;
require dirname(__DIR__).'/../vendor/autoload.php';


/* Method  to create a single sms according to the documentation at the link. Curl is used */
/* https://smsgateway24.com/en/docs/apidocumentation */
$timeout = 2.0;
$baseUrl = "https://smsgateway24.com";
$endpoint = "/getdata/savecontact";
$url = $baseUrl.$endpoint;
$paramsArr = [];

/* Required fields */
$paramsArr['token'] = "123286f9fe7ee6b52724fd5fd3516865"; // put here your token
$paramsArr['phone'] = "+49 157 52982212";  // our real number
$paramsArr['tag_id'] = "1009";  // use response from `savetag` reaquest


/* Optional fields */
$paramsArr['fullname'] = "Support Team SmsGateWay24";

$formParams = [
    'form_params' => $paramsArr,
];

$client = new Client([
    'base_uri' => $baseUrl,
    'timeout' => $timeout,
]);

$response = $client->request('POST', $endpoint, $formParams);

/* Example of good answer: */
/* {"error":0,"message":"Ok","contact_id":566706} */

echo $response->getBody();
?>
