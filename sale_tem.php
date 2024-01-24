<?php 
include("connect.php");

	$edit=$_POST['edit'];

	$item_name=$_POST['item_name'];
	$item_hsn=$_POST['item_hsn'];
	$pur_rate=$_POST['pur_rate'];
	$sale_rate=$_POST['sale_rate'];
	$qty=$_POST['qty'];
	$total=$_POST['total'];
	if($edit==0)
	{
		mysqli_query($conn,"UPDATE `sale_tem` SET `itemName`='$item_name',`itemHSN`='$item_hsn',`qty`='$qty',`rate`='$sale_rate',`value`='$total' WHERE `itemHSN`='$item_hsn'");
		echo 1;
	}else
	{
		$query="INSERT INTO `sale_tem`(`itemName`, `itemHSN`, `qty`, `rate`, `value`) VALUES ('$item_name','$item_hsn','$qty','$sale_rate','$total')";
		$confirm=mysqli_query($conn,$query)or die(mysqli_error());
		echo 1;
	}
	

    
?>