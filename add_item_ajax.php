<?php 
    include('connect.php');

    $item=$_POST['itemName'];
    $item_hsn=$_POST['item_hsn'];
    $edit=$_POST['edit'];
    $item_id=$_POST['item_id'];

    if($edit==0)
    {
        mysqli_query($conn,"UPDATE `item` SET `itemName`='$item',`itemHSN`='$item_hsn' WHERE `id`='$item_id'");
        echo "Updated";
    }else{
        $q="SELECT * FROM `item` WHERE `itemName`='$item';";
		$conf=mysqli_query($conn,$q)or die(mysqli_error());
		if(mysqli_num_rows($conf)>0)
		{
            echo "Item Already exist";
		}
		else
		{
            $query="INSERT INTO `item`(`id`, `itemName`, `itemHSN`) VALUES('','$item','$item_hsn')";
            mysqli_query($conn,$query);
            echo "Inserted";
        }
    }
?>