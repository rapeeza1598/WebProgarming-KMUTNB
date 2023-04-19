<?php
require_once "class.db.php";

class Station extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getStations()
    {
        $sql = "SELECT * FROM station_info WHERE status = 1";
        $stmt = $this->query($sql, []);
        return $stmt->fetchAll();
    }

    public function getStationsByAdmin()
    {
        $sql = "SELECT * FROM station_info";
        $stmt = $this->query($sql, []);
        return $stmt->fetchAll();
    }

    public function getStation($stationid)
    {
        $sql = "SELECT * FROM station_info WHERE stationid = ?";
        $stmt = $this->query($sql, [$stationid]);
        return $stmt->fetch();
    }

    public function updateStationStatus($stationid, $status,$value)
    {
        $sql = "UPDATE station_info SET status = ? WHERE location_id  = ?";
        $stmt = $this->query($sql, [$status, $stationid]);
        return $stmt->rowCount();
    }
}
