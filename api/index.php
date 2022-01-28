<?php
/*
api/index.php
*/

require("../bootstrap.php");

use Src\GreetingHandler;

// Récupération des paramêtres de la requête
$view = $_GET["view"] ?? "";
$random = $_GET["random"] ?? 0;
$greetingId = $_GET["id"] ?? 0;

// Mappage selon les paramtes de l'url
switch($view){

    case "all":
        // Pour le endpoint /greetings/list
        $mobileRestHandler = new GreetingHandler($dbConnection);
        $mobileRestHandler->getAllGreetings();
        break;

    // ...
}
?>