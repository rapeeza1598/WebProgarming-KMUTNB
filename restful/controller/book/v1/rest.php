<?php
include_once '../../../model/class.book.php';
header('Content-Type: application/json; charset=utf-8');
$book = new book();
// $bookdata = ["isbn"=>"test","bookname"=>"test","booktype"=>"test","author"=>"test","price"=>"100"];
// $book->add_book($bookdata);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = file_get_contents("php://input");
    $bookdata = json_decode($data, true);
    if ($book->add_book($bookdata)) {
        echo json_encode([
            "status" => "ok",
            "message" => "Insert {$bookdata["bookname"]} Success",
            "data" => $data
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Insert {$bookdata["bookname"]} Fail"
        ]);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {
        $bookdata = $book->get_book_by_id($_GET["id"]);
        // echo json_encode([
        //     "status" => "ok",
        //     "message" => "Get {$bookdata["bookname"]} Success",
        //     "data"=>$bookdata
        // ]);
        echo json_encode($bookdata);
    } else {
        $bookdata = $book->get_book_all();
        // echo json_encode([
        //     "status" => "ok",
        //     "message" => "Get All Success",
        //     "data"=>$bookdata
        // ]);
        echo json_encode($bookdata);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    $data = file_get_contents("php://input");
    $bookdata = json_decode($data, true);
    if ($book->updateBookData($bookdata)) {
        // echo json_encode([
        //     "status" => "ok",
        //     "message" => "Update {$bookdata["bookname"]} Success",
        //     "data" => $data
        // ]);
        echo json_encode($bookdata);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Update {$bookdata["bookname"]} Fail"
        ]);
    }
}
else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $data = file_get_contents("php://input");
    $bookdata = json_decode($data, true);
    if ($book->delete_book($bookdata)) {
        // echo json_encode([
        //     "status" => "ok",
        //     "message" => "Delete {$bookdata["bookname"]} Success",
        //     "data" => $data
        // ]);
        echo json_encode($bookdata);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Delete {$bookdata["bookname"]} Fail"
        ]);
    }
}
else {
    echo json_encode([
        "status" => "error",
        "message" => "Method Not Allowed"
    ]);
}