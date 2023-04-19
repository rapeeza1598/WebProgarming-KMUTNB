<?php
include_once 'class.db.php';
class sensor extends db
{
    public function get_all_record_data()
    {
        $sql = "SELECT * FROM record_data";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function get_record_data_by_id($id)
    {
        $sql = "SELECT * FROM record_data WHERE ID = :id";
        $stmt = $this->db->prepare($sql);
        $data = [":id" => $id];
        $stmt->execute($data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function add_record_data($opt)
    {
        $sql = "INSERT INTO `record_data`(`sensor`, `location_id`, `pm25`) VALUES (:sensor,:location_id,:pm25)";
        $stmt = $this->db->prepare($sql);
        $data = [
            ":sensor" => $opt["sensor"],
            ":location_id" => $opt["location_id"],
            ":pm25" => $opt["pm25"]
        ];
        return ($stmt->execute($data) ? 1 : 0);
    }
    public function update_record_data($opt)
    {
        $sql = "UPDATE `record_data` SET `sensor`=':sensor',`location_id`=':location_id',`pm25`=':pm25' WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $data = [
            ":id" => $opt["id"],
            ":sensor" => $opt["sensor"],
            ":location_id" => $opt["location_id"],
            ":pm25" => $opt["pm25"]
        ];
        return ($stmt->execute($data) ? 1 : 0);
    }
    public function delete_record_data($id)
    {
        $sql = "DELETE FROM `record_data` WHERE ID = :id";
        $stmt = $this->db->prepare($sql);
        $data = [":id" => $id];
        return ($stmt->execute($data) ? 1 : 0);
    }
}
// $test_sensor = new sensor();
// $test_sensor->add_record_data(["sensor"=>"thai","location_id"=>"1","pm25"=>"30"]);
