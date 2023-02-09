<pre>
    <?php
    try{
        include_once '../../../model/class.book.php';
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
    $book = new book();
    // $bookdata = ["isbn"=>"test","bookname"=>"test","booktype"=>"test","author"=>"test","price"=>"100"];
    // $book->add_book($bookdata);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = file_get_contents("php://input");
        $bookdata = json_decode($data, true);
        if ($book->add_book($bookdata)) {
            echo json_encode([
                "status" => "ok",
                "message" => "Insert {$bookdata["bookname"]} Success"
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Insert {$bookdata["bookname"]} Fail"
            ]);
        }
    }
    ?>
</pre>