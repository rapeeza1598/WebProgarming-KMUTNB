<?php
include_once 'db.php';
class book extends db{
    public function get_book(){
        $sql = "SELECT * FROM book";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function add_book($opt){
        $sql = "INSERT INTO `bookinfo`(`isbn`, `bookname`, `booktype`, `author`, `price`) VALUES (:isbn,:bookname,:booktype,:author,:price)";
        $stmt = $this->db->prepare($sql);
        $data = [   ":isbn" => $opt["isbn"],
                    ":bookname" => $opt["bookname"],
                    ":booktype" => $opt["booktype"],
                    ":author" => $opt["author"],
                    ":price" => $opt["price"]
                ];
        return ($stmt->execute($data)?1:0);
    }
}
    echo "<script>console.log('class.book.php')</script>";
    // $book = new book();
    // $bookdata = ["isbn"=>"test","bookname"=>"test","booktype"=>"test","author"=>"test","price"=>"100"];
    // $book->add_book($bookdata);
?>