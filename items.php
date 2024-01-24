<?php

include('connect.php');
 $item_name=$_POST['action'];
//$itmsec=$_POST['wingsec'];

 $b = array();

 $sql = "SELECT * FROM `item` WHERE `itemName`='$item_name';";
  $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
     // output data of each row
   while($row = mysqli_fetch_assoc($result)) {
        array_push($b,$row['id'],$row['itemHSN']);
     }
 }

 echo json_encode($b);

//echo $vender_name;
?>