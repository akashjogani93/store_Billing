<?php 
include("connect.php");

	$gtotal=$_POST['gtotal'];
	$ntotal=$_POST['ntotal'];
	$date=$_POST['date'];

    $q="INSERT INTO `purchase_tot`(`purchase_date`, `grossTotal`, `netTotal`) VALUES ('$date','$gtotal','$ntotal')";
    $c=mysqli_query($conn,$q)or die(mysqli_error());
    if($c)
    {
        $q2 = "SELECT MAX(bill_no) AS bill_no FROM purchase_tot";
        $result = mysqli_query($conn, $q2);
        $row = mysqli_fetch_assoc($result);
        $bill_no = $row['bill_no'];

        
        $q3="INSERT INTO `purchase_data`(`itemName`, `itemHSN`, `qty`, `purRate`, `saleRate`, `purTotal`, `bill_no`) SELECT `itemName`, `itemHSN`, `qty`, `purRate`, `saleRate`, `purTotal`,'$bill_no' FROM `purchase_tem` ORDER BY slno";
        $c2 = mysqli_query($conn, $q3);

        $q4="SELECT * FROM `purchase_tem` ORDER BY `slno`";
        $c4=mysqli_query($conn,$q4);
        while($r1=mysqli_fetch_assoc($c4))
        {
            $itemName=$r1['itemName'];
            $itemHSN=$r1['itemHSN'];
            $qty=$r1['qty'];
            $purRate=$r1['purRate'];
            $saleRate=$r1['saleRate'];
            $q5="SELECT * FROM `stocks` WHERE `itemName`='$itemName' AND `itemHSN`='$itemHSN' ORDER BY `slno`";
            $c5=mysqli_query($conn,$q5);
            if (mysqli_num_rows($c5) > 0) 
            {
                while($r2=mysqli_fetch_assoc($c5))
                {
                    $qtynew=$r2['qty']+$qty;
                    mysqli_query($conn,"UPDATE `stocks` SET `qty`='$qtynew',`purRate`='$purRate',`saleRate`='$saleRate' WHERE `itemName`='$itemName' AND `itemHSN`='$itemHSN' ");
                }
            }else
            {
                mysqli_query($conn,"INSERT INTO `stocks`(`itemName`, `itemHSN`, `qty`, `purRate`, `saleRate`) VALUES ('$itemName','$itemHSN','$qty','$purRate','$saleRate')");
            }

        }
        mysqli_query($conn,"TRUNCATE TABLE `purchase_tem`;");

        echo 'Product Purchased';
    }


    // $query="INSERT INTO `purchase_tem`(`slno`, `itemName`, `itemHSN`, `qty`, `purRate`, `saleRate`, `purTotal`) VALUES ('','$item_name','$item_hsn','$item_quant','$item_rate','$sale_rate','$item_value')";
    // $confirm=mysqli_query($conn,$query)or die(mysqli_error());
    // echo "sucess";
    