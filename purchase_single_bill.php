<?php include('header.php');
include("connect.php");
  $bill=$_GET['bill'];  
  
?>
    <style>
       #rep-css{
        border: 2px solid white;
      } 
      #list {
        max-height: 70px;
        overflow-y: auto;
    }

    #list ul {
        background-color: #DEB0A6;
        padding: 3px;
        cursor: pointer;
        max-height: 150px;
        overflow-y: auto;
        list-style: none;
    }

    #list li {
        color: black;
        font: 12pt;
        padding: 8px;
    }

    #list li:hover {
        color: white;
        background-color: #b3b3ff;
    }
    </style>

<div class="col-md-12 bg-success">
    <h3 class="text-center" style="color:black; margin-top:3px; margin-bottom:2px;">Purchase</h3>
    <!-- <div class="container-fluid bg-info">
        <div class="row ip1">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1 cust_info" style="margin-left: -40px;">
                        <label for="">Bill No</label>
                        <input type="text" name="" class="col-md-1 form-control input-sm" id="bill_no" value="<?php echo $bill; ?>" readonly>
                    </div>
                    <div class="col-md-3 cust_info">
                        <label for="">Party Name</label>
                        <input type="text" name="" class="col-md-1 form-control input-sm" id="client_name" autocomplete="off" value="<?php echo $name; ?>" readonly>
                    </div>
                    <div class="col-md-3 cust_info">
                        <label for="">Party GSTIN No.</label>
                        <input type="text" name="" class="col-md-1 form-control input-sm" id="party_gst" autocomplete="off" value="<?php echo $partyGST; ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
<div class="col-md-12  theam tbl1" style="margin-top: 10px;" id="tb">
<table class="fixed_header3 table table-bordered" id="table">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Item Name</th>
            <th>Item HSN</th>
            <th>Quantity</th>
            <th>Sale Rate</th>
            <th>Rate</th>
            <th>Value</th>
        </tr>
    </thead>
    <tbody>
       <?php include("connect.php");
       $total=0;
        $q="SELECT * FROM `purchase_data` WHERE `bill_no`='$bill' ORDER BY `slno` ASC";
        $conf=mysqli_query($conn,$q)or die(mysqli_error());
		if(mysqli_num_rows($conf)>0)
		{
            $i=0;
            while($row=mysqli_fetch_array($conf))
            {
                $total +=$row['purTotal'];
                ?>
                <tr>
                    <td><?php echo $i+1; ?></td>
                    <td><?php echo $row['itemName']; ?></td>
                    <td><?php echo $row['itemHSN']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['saleRate']; ?></td>
                    <td><?php echo $row['purRate']; ?></td>
                    <td><?php echo $row['purTotal']; ?></td>
                </tr>
                <?php
                $i++;
            }
        }
       ?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-10">
        <table class="table-bordered tab" style="width:100%;">
            <tr>
                <th></th>
                <th>Gross Total</th>
                <!-- <th>CGST</th>
                <th>Amount</th>
                <th>SGST</th>
                <th>Amount</th> -->
                <th>Total</th>
            </tr>
            <tr>
                <th>Total</th>
                <th><?php echo $total; ?></th>
                <th><?php echo $total; ?></th>
            </tr>
        </table>
    </div>
    <div class="col-md-2">
       
        <!-- <input type="button" name="Save" value="Save" class="col-md-12 input-sm btn-success" id="print"> -->
   
<br>
<br>
<br>
        <input type="button" name="Cancel" value="Back" class="col-md-12 input-sm btn-info" id="cancel" onclick="cancel()">
    </div>
</div>

</div>

<script>
  $(document).ready(function()
  {
    // $('#tb').load("sale_item_fetch.php");
  });

  
  function cancel()
  {
    window.location="purchase-bills.php";
  }

</script>