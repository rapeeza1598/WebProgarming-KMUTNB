<?php
require_once "../classes/class.record.php";
header("Content-Type: application/json; charset=UTF-8");

$stationid = $_GET["stationid"];
$method = $_SERVER["REQUEST_METHOD"];

$record = new Record();

if ($method == "GET") {
    if ($stationid == null) {
        $records = $record->getRecords();
        echo json_encode($records);
    } else {
        $record = $record->getRecord($stationid);
        echo json_encode($record);
    }
}