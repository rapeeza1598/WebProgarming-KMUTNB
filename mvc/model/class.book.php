<?php
class book
{
    private $db = null;
    public function __construct()
    {
        $this->db_connecttion();
    }
    private function db_connecttion()
    {
        define("USER", "rapeepan.m");
        define("PASSWD", "QX8Ba8efRrNc_Tpc");
        define('CONFIG', 'mysql:host=localhost;dbname=bookstore;charset=utf8');

        try {
            $this->db = new PDO(CONFIG, USER, PASSWD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function db_close()
    {
        $this->db = null;
    }

    public function add_NewBook($book)
    {
        $sql = "INSERT INTO `book`(`ISBN`, `name`, `type`, `price`, `qty`)
                VALUES (:ISBN,:BookName,:BookType,:Price,:Qty)";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":ISBN", $book[0], PDO::PARAM_STR);
            $stmt->bindValue(":BookName", $book[1], PDO::PARAM_STR);
            $stmt->bindValue(":BookType", $book[2], PDO::PARAM_STR);
            $stmt->bindValue(":Price", $book[3], PDO::PARAM_INT);
            $stmt->bindValue(":Qty", $book[4], PDO::PARAM_INT);
            // $stmt->debugDumpParams();
            $stmt->execute();
            $status = 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $status = 0;
        }
        return $status;
    }
    public function bookList()
    {
        $sql = "SELECT * FROM book order by ISBN desc";
        $res = $this->db->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removeBook($id)
    {
        $sql = "DELETE FROM book WHERE `ISBN` = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($id);
    }

    public function getBookbyID($id)
    {
        $sql = "SELECT * FROM book WHERE `ISBN` = ?";
        $res = $this->db->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}
