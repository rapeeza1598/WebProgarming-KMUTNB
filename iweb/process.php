<?php include 'conn.php';?>
<?php
        $station_name = $_POST['Name_sta'];
        $station_lat = $_POST['lat_sta'];
        $station_lon = $_POST['lon_sta'];
        $time_update = date("Y-m-d H:i:s");
        // $sql = "INSERT INTO `station`(`Name_sta`, `Lat_sta`, `Lon_sta`, `Water_sta`) 
        //                  VALUES ('$station_name','$station_lat','$station_lon','$water')";
        // $result = $conn->query($sql);
    mysqli_query($conn,"INSERT INTO station(Name_sta, Lat_sta, Lon_sta, Water_sta) 
                        VALUES ('$station_name','$station_lat','$station_lon','$water')");


    if (mysqli_affected_rows($conn) > 0) {
        echo '<p>station is Added successfully</p>';
        echo '<a href="main.php>Back</a>';

    }else {
        echo '<p>station is not Added</p>';
        echo mysqli_error($conn);
    }

    header( "refresh: 1; url= index.php" );
    exit(0);
?>