<?php


namespace Src;

use Src\SimpleRest;
use Src\Greeting;

class GreetingHandler extends SimpleRest {

private $db;

public function __construct($db)
{
$this->db = $db;
}

function getAllGreetings() {

$greeting = new Greeting($this->db);
$rawData = $greeting->getAllGreetings();

if(empty($rawData)) {
$statusCode = 404;
$rawData = array('error' => 'Aucune salutations trouvées!');
} else {
$statusCode = 200;
}

$this->buildResponse($rawData, $statusCode);
}

public function buildResponse($data, $statusCode) {
$requestContentType = $_SERVER['HTTP_ACCEPT'];
$this ->setHttpHeaders($requestContentType, $statusCode);

if(strpos($requestContentType,'application/json') !== false){
$response = $this->encodeJson($data);
echo $response;
} else if(strpos($requestContentType,'text/html') !== false){
$response = $this->encodeHtml($data);
echo $response;
} else if(strpos($requestContentType,'application/xml') !== false){
$response = $this->encodeXml($data);
echo $response;
}
}

public function encodeHtml($responseData) {

$htmlResponse = "<table border='1'>";
    foreach($responseData as $key=>$value) {
    $htmlResponse .= "<tr><td>". $key. "</td><td>". $value. "</td></tr>";
    }
    $htmlResponse .= "</table>";
return $htmlResponse;
}

public function encodeJson($responseData) {
$jsonResponse = json_encode($responseData);
return $jsonResponse;
}

public function encodeXml($responseData) {
// creating object of SimpleXMLElement
$xml = new SimpleXMLElement('<?xml version="1.0"?><mobile></mobile>');
foreach($responseData as $key=>$value) {
$xml->addChild($key, $value);
}
return $xml->asXML();
}
}
?>