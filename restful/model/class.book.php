<?php
include_once 'db.php';
class book extends db{
    public function get_book_all(){
        $sql = "SELECT * FROM bookinfo";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updateBookData($opt){
        $sql = "UPDATE `bookinfo` SET `isbn`=:isbn,`bookname`=:bookname,`booktype`=:booktype,`author`=:author,`price`=:price ,`createdate`= NOW() WHERE bookid = :id";
        $stmt = $this->db->prepare($sql);
        $data = [   ":id" => $opt["bookid"],
                    ":isbn" => $opt["isbn"],
                    ":bookname" => $opt["bookname"],
                    ":booktype" => $opt["booktype"],
                    ":author" => $opt["author"],
                    ":price" => $opt["price"]
                ];
        return ($stmt->execute($data)?1:0);
    }
    public function get_book_by_id($id){
        $sql = "SELECT * FROM bookinfo WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $data = [":id" => $id];
        $stmt->execute($data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
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
    public function delete_book($opt){
        $sql = "DELETE FROM `bookinfo` WHERE bookid = :id";
        $stmt = $this->db->prepare($sql);
        $data = [":id" => $opt["bookid"]];
        return ($stmt->execute($data)?1:0);
    }
}
    // echo "<script>console.log('class.book.php')</>";
    // $book = new book();
    // $bookdata = ["bookid"=>"1","isbn"=>"test","bookname"=>"test","booktype"=>"test","author"=>"test","price"=>"100"];
    // $book->updateBookData($bookdata);
    // $bookdata = ["bookid"=>"9"];
    // $book->delete_book($bookdata);
    // print_r($book->get_book_all());
?>