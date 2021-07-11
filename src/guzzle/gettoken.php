<?php

use GuzzleHttp\Client;
require dirname(__DIR__).'/../vendor/autoload.php';


/* Method  to get token according to the documentation at the link. Curl is used */
/* https://smsgateway24.com/en/docs/apidocumentation */
$timeout = 2.0;
$baseUrl = "https://smsgateway24.com";
$endpoint = "/getdata/gettoken";
$url = $baseUrl.$endpoint;
$paramsArr = [];

/* Required fields */
$paramsArr['email'] = "support@smsgateway24.com"; // put here your email
$paramsArr['pass'] = "321321321";  // put here your password
$formParams = [
    'form_params' => $paramsArr,
];

$client = new Client([
    'base_uri' => $baseUrl,
    'timeout' => $timeout,
]);

$response = $client->request('POST', $endpoint, $formParams);

/* Example of good answer: */
/* {"error":0,"token":"1f0e86f9fe7ee6b52724fd5fd3511225","message":"OK"} */

echo $response->getBody();

?>
