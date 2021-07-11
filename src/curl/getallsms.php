<?php

/* Method  to get All SMS by Filter according to the documentation at the link. Curl is used */
/* https://smsgateway24.com/en/docs/apidocumentation */

$baseUrl = "https://smsgateway24.com";
$endpoint = "/getdata/getallsms";
$url = $baseUrl.$endpoint;
$paramsArr = [];

/* Required fields */
$paramsArr['token'] = "1f0e86f9fe7ee6b52724fd5fd3511225"; // put here your token

/* Optional fields */
$paramsArr['device_id'] = "260"; // put here your token
/*
1 - New
2 - Taken from Server
5 - Income
6 - Sent by Phone
7 - Delivered
8 - Sms Not Delivered
9 - Not SENT - Generic failure
10 - Not sent - No service
11 - Not Sent - Null PDU
12 - Not Sent - Radio off
100 - not sent - NOT ALLOWED
101 - not sent - Not Allowed At all
*/
$paramsArr['status'] = "1";  // to get all new SMS
$paramsArr['begindate'] = "2018-07-01";
$paramsArr['enddate'] = "2021-09-01";
$paramsArr['sim'] = "0";
//$paramsArr['customerid'] = "999";  // internal customer ID. You can use this field in addsms request.
$paramsArr['onlycount'] = "0";
//$paramsArr['phone'] = "+49 157 52982212";  // specify phone if you want to find SMS by phone
$paramsArr['orderbydesc'] = "1";



$ch = curl_init();

curl_setopt($ch, \CURLOPT_URL, $url);
curl_setopt($ch, \CURLOPT_POST, 1);
curl_setopt($ch, \CURLOPT_POSTFIELDS, $paramsArr);
curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close($ch);

/* Example of good answer: */
/*
{"error":0,"smss":{"22074698":{"id":22074698,"sendto":"+4915752982212","body":"Test message from API","customerid":null,"status":1,"statustitle":"New","deviceid":260,"urgent":null,"created":{"date":"2021-07-11 12:59:26.000000","timezone_type":1,"timezone":"+02:00"},"senttime":null,"timetosend":{"date":"2021-07-11 12:59:26.000000","timezone_type":1,"timezone":"+02:00"},"sim":0,"paketid":null,"pakettitle":null,"paketbody":null},"22074718":{"id":22074718,"sendto":"+4915752982212","body":"Test message from API","customerid":null,"status":1,"statustitle":"New","deviceid":260,"urgent":null,"created":{"date":"2021-07-11 12:59:57.000000","timezone_type":1,"timezone":"+02:00"},"senttime":null,"timetosend":{"date":"2021-07-11 12:59:57.000000","timezone_type":1,"timezone":"+02:00"},"sim":0,"paketid":null,"pakettitle":null,"paketbody":null},"22074722":{"id":22074722,"sendto":"+4915752982212","body":"Test message from API","customerid":null,"status":1,"statustitle":"New","deviceid":260,"urgent":null,"created":{"date":"2021-07-11 13:00:07.000000","timezone_type":1,"timezone":"+02:00"},"senttime":null,"timetosend":{"date":"2021-07-11 13:00:07.000000","timezone_type":1,"timezone":"+02:00"},"sim":0,"paketid":null,"pakettitle":null,"paketbody":null},"22074938":{"id":22074938,"sendto":"+4915752982212","body":"Test message from API","customerid":19921,"status":1,"statustitle":"New","deviceid":260,"urgent":true,"created":{"date":"2021-07-11 13:04:46.000000","timezone_type":1,"timezone":"+02:00"},"senttime":null,"timetosend":{"date":"2021-08-01 14:00:00.000000","timezone_type":1,"timezone":"+02:00"},"sim":0,"paketid":null,"pakettitle":null,"paketbody":null},"22078325":{"id":22078325,"sendto":"+4915752982212","body":"test message 1","customerid":0,"status":1,"statustitle":"New","deviceid":260,"urgent":true,"created":{"date":"2021-07-11 14:06:50.000000","timezone_type":1,"timezone":"+02:00"},"senttime":null,"timetosend":{"date":"2019-07-02 01:50:00.000000","timezone_type":1,"timezone":"+02:00"},"sim":0,"paketid":null,"pakettitle":null,"paketbody":null},"22078326":{"id":22078326,"sendto":"+4915752982212","body":"test message 2 ","customerid":0,"status":1,"statustitle":"New","deviceid":260,"urgent":true,"created":{"date":"2021-07-11 14:06:50.000000","timezone_type":1,"timezone":"+02:00"},"senttime":null,"timetosend":{"date":"2019-07-02 01:50:00.000000","timezone_type":1,"timezone":"+02:00"},"sim":0,"paketid":null,"pakettitle":null,"paketbody":null}},"count":6,"message":"Ok"}
*/

/* you can check result here */
/* https://smsgateway24.com/en/sms/list */

/* if you prefer array: */
$responceArr  = json_decode($server_output);
echo $server_output;

?>
