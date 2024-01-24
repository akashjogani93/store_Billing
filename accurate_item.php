<?php 
include("connect.php");
if(isset($_POST['itemName']))
{
    $itemName=$_POST['itemName'];
    $edit_name=$_POST['edit_name'];

    $item_hsn=$_POST['item_hsn'];
    $edit_hsn=$_POST['edit_hsn'];
    $edit=$_POST['edit'];

    if($edit==0)
    {
        $query = "SELECT * FROM `item` WHERE `itemName`!='$edit_name' AND `itemName`='$itemName' OR `itemHSN`!='$edit_hsn' AND `itemHSN`='$item_hsn'";
        
    }else
    {
        $query = "SELECT * FROM `item` WHERE `itemName`='$itemName' OR `itemHSN`='$item_hsn'";
    }
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    if($count>0) 
    {
        echo "<span style='color:red'>Item Name OR HSN Already Added</span>";
        echo "<script>$('#item_add').prop('disabled',true);</script>";
        echo "<script>$('#item_update').prop('disabled',true);</script>";
        // echo $edit;
    }else
    {
        echo "<script>$('#item_add').prop('disabled',false);</script>";
        echo "<script>$('#item_update').prop('disabled',false);</script>";

    }
}


    
// if(isset($_POST['item_hsn']))
// {   
//     $item_hsn=$_POST['item_hsn'];
//     $edit_hsn=$_POST['edit_hsn'];
//     $edit=$_POST['edit'];
//     if($edit==0)
//     {
//         $query = "SELECT * FROM `item` WHERE `itemHSN`!='$item_hsn' AND `itemHSN`='$item_hsn'";
//     }else
//     {
        
//         $query = "SELECT * FROM `item` WHERE `itemHSN`='$item_hsn'";
//     }
//     $result=mysqli_query($conn,$query);
//     $count=mysqli_num_rows($result);
//     if($count>0) 
//     {
//         echo "<span style='color:red'>Item HSN Is Already Added</span>";
//         echo "<script>$('#item_add').prop('disabled',true);</script>";
//     }else
//     {
//         echo "<script>$('#item_add').prop('disabled',false);</script>";
//     }
// }
?>