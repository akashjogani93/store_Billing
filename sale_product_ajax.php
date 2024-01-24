<?php 
include("connect.php");

	$gtotal=$_POST['gtotal'];
	$ntotal=$_POST['ntotal'];
    $gstamt=$_POST['gstamt'];

	$client_name=$_POST['client_name'];
	$party_gst=$_POST['party_gst'];
	$date=$_POST['date'];

    $q="INSERT INTO `sale_tot`(`bill_no`, `partyName`, `partyGST`, `saleDate`, `gross_amt`, `gst`, `gstamt`, `net_tot`, `payment`) VALUES ('','$client_name','$party_gst','$date','$gtotal','5','$gstamt','$ntotal','none')";
    $c=mysqli_query($conn,$q)or die(mysqli_error());
    if($c)
    {
        $q2 = "SELECT MAX(bill_no) AS bill_no FROM sale_tot";
        $result = mysqli_query($conn, $q2);
        $row = mysqli_fetch_assoc($result);
        $bill_no = $row['bill_no'];

        $q3="INSERT INTO `sale_data`(`itemName`, `itemHSN`, `qty`, `rate`, `value`, `bill_no`) SELECT `itemName`, `itemHSN`, `qty`, `rate`, `value`,'$bill_no' FROM `sale_tem` ORDER BY slno";
        $c2 = mysqli_query($conn, $q3);


        $q4="SELECT * FROM `sale_tem` ORDER BY `slno`";
        $c4=mysqli_query($conn,$q4);
        while($r1=mysqli_fetch_assoc($c4))
        {
            $itemName=$r1['itemName'];
            $itemHSN=$r1['itemHSN'];
            $qty=$r1['qty'];
            $rate=$r1['rate'];
            $value=$r1['value'];
            $q5="SELECT * FROM `stocks` WHERE `itemName`='$itemName' AND `itemHSN`='$itemHSN' ORDER BY `slno`";
            $c5=mysqli_query($conn,$q5);
            if (mysqli_num_rows($c5) > 0)
            {
                while($r2=mysqli_fetch_assoc($c5))
                {
                    $qtynew=$r2['qty']-$qty;

                    if($qtynew==0)
                    {
                        mysqli_query($conn,"DELETE FROM `stocks` WHERE `itemName`='$itemName' AND `itemHSN`='$itemHSN'");
                    }else
                    {
                        mysqli_query($conn,"UPDATE `stocks` SET `qty`='$qtynew' WHERE `itemName`='$itemName' AND `itemHSN`='$itemHSN' ");
                    }   
                }
            }

        }
        mysqli_query($conn,"TRUNCATE TABLE `sale_tem`;");

        echo $bill_no;
        mysqli_close($conn);
    }


    // $query="INSERT INTO `purchase_tem`(`slno`, `itemName`, `itemHSN`, `qty`, `purRate`, `saleRate`, `purTotal`) VALUES ('','$item_name','$item_hsn','$item_quant','$item_rate','$sale_rate','$item_value')";
    // $confirm=mysqli_query($conn,$query)or die(mysqli_error());
    // echo "sucess";
    