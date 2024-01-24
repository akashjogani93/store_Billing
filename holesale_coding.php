<?php 
include("connect.php");
$action=$_POST['action'];

if($action=="holesale_item")
{ 
	$item_id=$_POST['item_id'];
	$item_name=$_POST['item_name'];
	$item_hsn=$_POST['item_hsn'];
	$item_quant=$_POST['item_quant'];
	$item_rate=$_POST['item_rate'];
	$sale_rate=$_POST['sale_rate'];
	$item_value=$_POST['item_value'];

	$edit=$_POST['edit'];
	if($edit==0)
	{
		mysqli_query($conn,"UPDATE `purchase_tem` SET `qty`='$item_quant',`purRate`='$item_rate',`saleRate`='$sale_rate',`purTotal`='$item_value',`itemName`='$item_name',`itemHSN`='$item_hsn' WHERE `slno`='$item_id'");
		echo 1;
	}else
	{
		$q5="SELECT * FROM `purchase_tem` WHERE `itemName`='$item_name' AND `itemHSN`='$item_hsn'";
		$c5=mysqli_query($conn,$q5);
		if (mysqli_num_rows($c5) > 0) 
		{
			while($r2=mysqli_fetch_assoc($c5))
			{
				$qtynew=$r2['qty']+$item_quant;
				$item_value1=$qtynew*$item_rate;
				mysqli_query($conn,"UPDATE `purchase_tem` SET `qty`='$qtynew',`purRate`='$item_rate',`saleRate`='$sale_rate',`purTotal`='$item_value1' WHERE `itemName`='$item_name' AND `itemHSN`='$item_hsn' ");
				echo 1;
			}
		}else
		{
			$query="INSERT INTO `purchase_tem`(`slno`, `itemName`, `itemHSN`, `qty`, `purRate`, `saleRate`, `purTotal`) VALUES ('','$item_name','$item_hsn','$item_quant','$item_rate','$sale_rate','$item_value')";
			$confirm=mysqli_query($conn,$query)or die(mysqli_error());
			echo 1;
		}
	}
}