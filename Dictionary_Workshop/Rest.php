<?php
class restAPI
{
    protected $db = null;

    const DB_HOST = 'localhost';
    const DB_NAME = 'fitm_dic';
    const DB_USER = 'user_6506021421200';
    const DB_PASS = '1200';

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        try {
            $this->db = new PDO("mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . ";charset=utf8", self::DB_USER, self::DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function get_all_vocab()
    {
        $sql = "SELECT * FROM vocab";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function get_vocab_by_vocab($word){
        $sql = "SELECT * FROM vocab WHERE VOCAB = :word";
        $stmt = $this->db->prepare($sql);
        $data = [":word" => $word];
        $stmt->execute($data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function add_vocab($opt)
    {
        $sql = "INSERT INTO `vocab`(`VOCAB`, `TYPE_CODE`, `MEAN`) VALUES (:word,:type_code,:mean)";
        $stmt = $this->db->prepare($sql);
        $data = [
            ":word" => $opt["word"],
            ":type_code" => $opt["type_code"],
            ":mean" => $opt["mean"]
        ];
        return ($stmt->execute($data) ? 1 : 0);
    }
    public function update_vocab($opt)
    {
        $sql = "UPDATE `vocab` SET `VOCAB`=':word',`TYPE_CODE`=':type_code',`MEAN`=':mean' WHERE DIC_ID = :id";
        $stmt = $this->db->prepare($sql);
        $data = [
            ":id" => $opt["id"],
            ":word" => $opt["word"],
            ":type_code" => $opt["type_code"],
            ":mean" => $opt["mean"]
        ];
        return ($stmt->execute($data) ? 1 : 0);
    }
    public function delete_vocab($opt)
    {
        $sql = "DELETE FROM `vocab` WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $data = [":id" => $opt["id"]];
        return ($stmt->execute($data) ? 1 : 0);
    }
}

$test = new restAPI();
// $testData = ["word"=>"vocab2","type_code"=>"2","mean"=>"22"];
// $test->add_vocab($testData);

$server_req = $_SERVER["REQUEST_METHOD"];
switch ($server_req) {
    case 'GET':
        $result = $test->get_all_vocab();
        echo json_encode($result);
        break;
    case 'POST':
        $data = file_get_contents("php://input");
        $opt = json_decode($data, true);
        $result = $test->add_vocab($opt);
        echo json_encode($result);
        break;
    case 'PUT':
        $data = file_get_contents("php://input");
        $opt = json_decode($data, true);
        $result = $test->update_vocab($opt);
        echo json_encode($result);
        break;
    case 'DELETE':
        $data = file_get_contents("php://input");
        $opt = json_decode($data, true);
        $result = $test->delete_vocab($opt);
        echo json_encode($result);
        break;
    default:
        echo json_encode([
            "status" => "error",
            "message" => "Method Not Allowed"
        ]);
        break;
}
