<table class="fixed_header3 table table-bordered" id="table">
    <thead>
        <tr>
            <th>Sl.No</th>
            <th>Item Name</th>
            <th>Item HSN</th>
            <th>Quantity</th>
            <th>Sale Rate</th>
            <th>Pur Rate</th>
            <th>Value</th>
        </tr>
    </thead>
    <tbody>
       <?php include("connect.php");
       $total=0;
        $q='SELECT * FROM `purchase_tem` ORDER BY `slno` ASC';
        $conf=mysqli_query($conn,$q)or die(mysqli_error());
		if(mysqli_num_rows($conf)>0)
		{
            $i=0;
            while($row=mysqli_fetch_array($conf))
            {
                $total +=$row['purTotal'];
                ?>
                <tr>
                    <td style="display:none;"><?php echo $row['slno']; ?></td>
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
    <div class="col-md-2" style="margin-top:15px;">
       
        <input type="button" name="Save" value="Purchase" class="col-md-12 input-sm btn-success" id="print">
   
<br>
<br>
        <input type="button" name="Cancel" value="Cancel" class="col-md-12 input-sm btn-danger" id="cancel" onclick="cancel()">
    </div>
</div>

<?php 
    $currentDate = date('Y-m-d');
    // echo $currentDate;
?>
<input type="text" name="" value="<?php echo $total; ?>" id="gtotal" style="display: none;">
<input type="text" name="" value="<?php echo $total; ?>" id="ntotal" style="display: none;">
<input type="date" name="" value="<?php echo $currentDate; ?>" id="date" style="display: none;">

<script type="text/javascript">
    $('#print').click(function() {
        var gtotal = $('#gtotal').val();
        var ntotal = $('#ntotal').val();
        // var date = $('#date').val();
        var yourDateValue = new Date();
        var date = yourDateValue.toISOString().substr(0, 10);
        if(gtotal !='' && gtotal !=0)
        {
            $.ajax({
                type: "post",
                url: "purchase_product_ajax.php",
                data: {
                    gtotal: gtotal,
                    ntotal: ntotal,
                    date: date,
                },
                success: function(status) 
                {
                    alert(status);
                    $('#tb').load("purchase_item_fetch.php");
                }
            });
        }else
        {
            alert('First Purchase Product');
        }
    });

    $(document).ready(function(){
        $("#table tbody").on('dblclick', 'tr', function() {
        var currow = $(this).closest('tr');
        var id = currow.find('td:eq(0)').html();
        var name = currow.find('td:eq(2)').html();
        var hsn = currow.find('td:eq(3)').html();
        var qty = currow.find('td:eq(4)').html();
        var Rate = currow.find('td:eq(5)').html();
        var saleRate = currow.find('td:eq(6)').html();
        var total = currow.find('td:eq(7)').html();
            $('#item_id').val(id);
            $('#item_name').val(name);
            $('#item_hsn').val(hsn);
            $('#item_quant').val(qty);
            $('#item_rate').val(saleRate);
            $('#sale_rate').val(Rate);
            $('#item_value').val(total);
            $('#edit').val(0);
            $('#updatedcol').show();
            $('#deleteitem').show();
            $('#iaddd').hide();
        });
    });
</script>