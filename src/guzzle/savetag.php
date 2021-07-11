<?php

use GuzzleHttp\Client;
require dirname(__DIR__).'/../vendor/autoload.php';


/* Method  to create a single sms according to the documentation at the link. Curl is used */
/* https://smsgateway24.com/en/docs/apidocumentation */
$timeout = 2.0;
$baseUrl = "https://smsgateway24.com";
$endpoint = "/getdata/savetag";
$url = $baseUrl.$endpoint;
$paramsArr = [];

/* Required fields */
$paramsArr['token'] = "123286f9fe7ee6b52724fd5fd3516865"; // put here your token
$paramsArr['title'] = "Colleagues";  // our Support number :) Text us to WhatsApp Or Telegram if you need help!

$formParams = [
    'form_params' => $paramsArr,
];

$client = new Client([
    'base_uri' => $baseUrl,
    'timeout' => $timeout,
]);

$response = $client->request('POST', $endpoint, $formParams);

/* Example of good answer: */
/* {"error":0,"message":"Ok","tag_id":1009} */

/* you can check result here */
/* https://smsgateway24.com/en/tag/list */

echo $response->getBody();
?>
