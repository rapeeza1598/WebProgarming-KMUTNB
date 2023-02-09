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
        echo $_SERVER["REQUEST_METHOD"];
        break;
    case 'GET':
        // $data = $_GET;
        echo $_SERVER["REQUEST_METHOD"];
        break;
    case 'PUT':
        // $data = $_PUT;
        echo $_SERVER["REQUEST_METHOD"];
        break;
    case 'DELETE':
        // $data = $_DELETE;
        echo $_SERVER["REQUEST_METHOD"];
        break;
    default:
        echo "not support {$method} now";
}
?></