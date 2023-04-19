<?php include 'conn.php';?>
<?php 
    $sqlQuery = 'SELECT * FROM station';
    $result = mysqli_query($conn, $sqlQuery);

    $dataname = array();
    foreach ($result as $row) {
        $dataname[] = $row['Name_sta'];        
        while ($dataname !=  0) {
            $datavalue = rand(0,100);
        }
    }
    mysqli_close($conn);
    // echo print_r($dataname);
    // echo print_r($datavalue);
    
?>