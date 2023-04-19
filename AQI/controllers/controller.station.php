<?php
require_once "../classes/class.station.php";
header("Content-Type: application/json; charset=UTF-8");

$stationid = @$_GET["stationid"];
$method = @$_SERVER["REQUEST_METHOD"];

$station = new Station();

if ($method == "GET") {
    if ($stationid == null && !isset($_GET['admin'])) {
        $stations = $station->getStations();
        echo json_encode($stations);
    } elseif (isset($_GET['admin'])) {
        $stations = $station->getStationsByAdmin();
        echo json_encode($stations);
    } else {
        $station = $station->getStation($stationid);
        echo json_encode([]);
    }
}

//update status
if ($method == "PUT") {
    $data = json_decode(file_get_contents("php://input"));
    $stationid = $data->stationid;
    $status = $data->status;
    $pm = $data->pm;
    $station = $station->updateStationStatus($stationid, $status, $pm);
    echo json_encode($station);
}
