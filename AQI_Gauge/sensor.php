<?php
require_once 'model.sensor.php';
header('Content-Type: application/json; charset=utf-8');
$server_req = $_SERVER['REQUEST_METHOD'];
$sensor = new sensor();
switch ($server_req) {
    case 'GET';
        $select_id = $_GET['stationid'];
        if ($select_id == null) {
            $result = $sensor->get_all_record_data();
        } else {
            $result = $sensor->get_record_data_by_id($select_id);
        }
        echo json_encode($result);
        break;
    case 'POST';
        $data = file_get_contents("php://input");
        $sensor_data = json_decode($data, true);
        if ($sensor->add_record_data($sensor_data)) {
            echo json_encode($data);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Insert {$sensor_data["stationid"]} Fail"
            ]);
        }
        break;
    case 'PUT';
        $data = file_get_contents("php://input");
        $sensor_data = json_decode($data, true);
        if ($sensor->update_record_data($sensor_data)) {
            echo json_encode($data);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Update {$sensor_data["stationid"]} Fail"
            ]);
        }
        break;
    case 'DELETE';
        $data = file_get_contents("php://input");
        $sensor_data = json_decode($data, true);
        if ($sensor->delete_record_data($sensor_data)) {
            echo json_encode(
                $data
            );
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Delete {$sensor_data["stationid"]} Fail"
            ]);
        }
        break;
}
