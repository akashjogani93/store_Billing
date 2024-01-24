<?php

include('connect.php');
 $item_name=$_POST['action'];
//$itmsec=$_POST['wingsec'];


$b = array();
$sql = "SELECT * FROM `stocks` WHERE `itemName`='$item_name';";
$result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) 
 {

    while($row = mysqli_fetch_assoc($result)) 
    {
        $sql1 = "SELECT * FROM `sale_tem` WHERE `itemName`='$item_name';";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1) > 0) 
        {
            while($row1 = mysqli_fetch_assoc($result1)) 
            {
                $qty=$row1['qty'];
                $rate=$row1['rate'];
                $value=$row1['rate'];
                $data=0;
            }
        }else
        {
                $qty=0;
                $rate=0;
                $value=0;
                $data=1;
        }
        array_push($b,$row['itemHSN'],$row['purRate'],$row['saleRate'],$row['qty'],$data,$qty,$rate,$value,$row['slno']);
    }
 }

 echo json_encode($b);

?>