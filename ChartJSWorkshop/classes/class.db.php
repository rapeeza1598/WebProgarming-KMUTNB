<?php
class Database
{

    protected $db;

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db_name = "aqi_db";

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        try {
            $this->db = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user, $this->pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query($sql, $arg)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($arg);
        return $stmt;
    }
}
