<pre>
<?php
include_once './model/class.book.php';
$book_ctrl = new book();
if (isset($show)) {
    $book_data = $book_ctrl->bookList();
} else {
    if (isset($_POST["save"])) {
        $book_val[] = $_POST["ISBN"];
        $book_val[] = $_POST["bookname"];
        $book_val[] = $_POST["Type"];
        $book_val[] = $_POST["Price"];
        $book_val[] = $_POST["Qty"];
        print_r($book_val);
        $book_ctrl->add_NewBook($book_val);
    } else {
        echo "Error Permission Denied";
    }
}
?>
</pre>