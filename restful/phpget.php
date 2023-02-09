<?php
if(isset($_GET["data1"])&&isset($_GET["data2"])){
    echo "Your input:<u>{$_GET["data1"]}</u> and <u>{$_GET["data2"]}</u>";
}
?>
<?php
$method = $_SERVER["REQUEST_METHOD"];
switch($method){
    case 'POST':
        // $data = $_POST;
        echo "POST";
        break;
    case 'GET':
        // $data = $_GET;
        echo "GET";
        break;
    case 'PUT':
        // $data = $_PUT;
        echo "PUT";
        break;
    case 'DELETE':
        // $data = $_DELETE;
        echo "DELETE";
        break;
    case 'NEW':
        // $data = $_NEW;
        echo "NEW";
        break;
    default:
        echo "not support {$method} now";
}
?></