<?php

/**
 * Main First Index File
 *
 * Checking Input & Output methords
 *
 * @category     Global{M} - TEST PROJECT 
 * @author       Shahbaz Ali <shahbaz.pucit@gmail.com>
 */
require './Transportation.php';
$boardingCardStack = array();
// Checking Input Method 
$inputMethod = (isset($_REQUEST['input'])) ? $_REQUEST['input'] : false;
switch ($inputMethod) {
    case 'array':
        echo "<h1>Reading Input Data from PHP Array</h1>";
        include './input_files/trip_array.php';
        break;
    case 'json':
//        echo "<h1>Reading Input Data from JSON File</h1>";
        $jsonString = file_get_contents("./input_files/newjson.json");
        $boardingCardStack = json_decode($jsonString, true);
        break;
    case 'api':
        echo "<h1>Reading Input Data from API Request</h1>";
        include './input_files/api_request.php';
        break;
    default :
        echo "<h1>No Input Method Defined, Reading from PHP Array</h1>";
        include './input_files/trip_array.php';
}
// Check if there is any Card as Input
if (sizeof($boardingCardStack) > 0) {
    $transporationObj = new Transportation($boardingCardStack);
    $boardingCardStack = $transporationObj->processCards(); // Processing Card
    if ($response = $transporationObj->showMessage()) {
        if (isset($_REQUEST['output']) && $_REQUEST['output'] == 'json') {
            echo json_encode($response);
        } else {
            foreach ($response as $oneCard) {
                echo $oneCard . "\n";
            }
        }
    } else {
        echo "No Data Found";
    }
} else {
    echo "Invalid Input";
}
?>
