<?php
require_once "class.db.php";

class Record extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getRecords()
    {
        $sql = "SELECT recorddata.*, station_info.* FROM recorddata INNER JOIN station_info ON recorddata.location_id = station_info.location_id WHERE station_status = 1 ORDER BY recorddata.location_id DESC";
        $stmt = $this->query($sql, []);
        return $stmt->fetchAll();
    }

    public function getRecord($id)
    {
        $sql = "SELECT recorddata.*, station_info.* FROM recorddata INNER JOIN station_info ON recorddata.location_id = station_info.location_id WHERE station_info.location_id = ?";
        $stmt = $this->query($sql, [$id]);
        return $stmt->fetch();
    }


}
