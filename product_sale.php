<?php include('header.php');
include("connect.php");
    $q2 = "SELECT MAX(bill_no) AS bill_no FROM `sale_tot`";
    $result = mysqli_query($conn, $q2);
    $row = mysqli_fetch_assoc($result);
    $bill_no = $row['bill_no']+1;
?>
    <style>
       #sale-css{
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

    /* Hide number input controls */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type="number"] {
      -moz-appearance: textfield; /* Firefox */
    }
    </style>
<script>
  $(document).ready(function() {
        $("#item_name").keyup(function() 
        {
            var x = $(this).val();
            
            if (x != '') {
               let log= $.ajax({
                    url: "stock_search.php",
                    method: "POST",
                    data: {
                        query: x
                    },
                    success: function(data) {
                        $('#list').fadeIn();
                        $('#list').html(data);
                        $("#item_HSN").val('');
                    }
                });
                // console.log(log);
            } else {
                $('#list').html("");
            }
            $(document).on('click', 'li', function() {
                $('#item_name').val($(this).text());
                $('#list').fadeOut();
                var x = $('#item_name').val();
                $.ajax({
                    type: "post",
                    url: "stock_data.php",
                    dataType: 'json',
                    data: {
                        action: x
                    },
                    success: function(data) {
                        $("#item_HSN").val(data[0]);
                        $("#pur_rate").val(data[1]);
                        $("#sale_rate").val(data[2]);
                        $("#stock").val(data[3]);
                        $("#item_id").val(data[8]);
                        var msg=data[4];
                        if(msg==0)
                        {
                            $("#qty").val(data[5]);
                            $("#total").val(data[7]);
                            $("#edit").val(0);
                            $("#subb").hide();
                            $("#update").show();
                            $("#Delete").show();
                        }else
                        {
                            $("#edit").val(1);
                            $("#subb").show();
                            $("#update").hide();
                            $("#Delete").hide();
                        }
                    }
                });
            });
        });
    });
</script>
<div class="col-md-12 bg-success">
    <h3 class="text-center" style="color:black; margin-top:3px; margin-bottom:-2px;">SALE ENTRY</h3>
    <div class="container-fluid bg-info">
        <div class="row ip1">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1 cust_info" style="margin-left: -40px;">
                        <label for="">Bill No</label>
                        <input type="text" name="" class="col-md-1 form-control input-sm" id="bill_no" value="<?php echo $bill_no; ?>" readonly>
                    </div>
                    <div class="col-md-3 cust_info">
                        <label for="">Party Name</label>
                        <input type="text" name="" class="col-md-1 form-control input-sm" id="client_name" autocomplete="off" onkeydown="return /[a-z\s]/i.test(event.key)">
                       
                    </div>
                    <div class="col-md-3 cust_info">
                        <label for="">Party GSTIN No.</label>
                        <input type="text" name="" class="col-md-1 form-control input-sm" id="party_gst" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-info ">
        <div class="row ip1">
            <div class="col-md-12">
                <div class="row">
                    <div class="offset-md-3 col-md-1 cust_info" style="display: none;">
                        <label for="">Item id</label>
                        <input type="text" name="" class="col-md-1 form-control input-sm" id="item_id">
                        <input type="text" name="" class="col-md-1 form-control input-sm" id="edit">
                    </div>
                    <div class="col-md-3 cust_info" style="margin-left: -40px;">
                        <label for="">Search Item Name</label>
                        <input type="text" name="" class="col-md-1 form-control input-sm" id="item_name" autocomplete="off">
                        <lable id="list"></lable>
                    </div>
                    <div class="col-md-1 cust_info">
                        <label for="">Stock</label>
                        <input type="text" name="" class="col-md-1 form-control input-sm" id="stock" autocomplete="off" readonly>
                    </div>
                    <div class="col-md-1 cust_info">
                        <label for="">Item HSN</label>
                        <input type="text" name="" class="col-md-1 form-control input-sm" id="item_HSN" autocomplete="off" readonly>
                    </div>
                    <div class="col-md-1 cust_info">
                        <label for="">Pur Rate</label>
                        <input type="text" name="" class="col-md-1 form-control input-sm" id="pur_rate" autocomplete="off" readonly>
                    </div>
                    <div class="col-md-1 cust_info">
                        <label for="">Sale Rate</label>
                        <input type="text" name="" class="col-md-1 form-control input-sm" id="sale_rate" autocomplete="off" readonly>
                    </div>
                    <div class="col-md-1 cust_info">
                        <label for="">Quantity</label>
                        <input type="number" name="" class="col-md-1 form-control input-sm" id="qty" autocomplete="off" min="1">
                    </div>
                    <!-- <div class="col-md-1 cust_info">
                        <label for="">GST 5%</label>
                        <input type="text" name="" class="col-md-1 form-control input-sm" id="sale_gst" autocomplete="off" value="5" readonly>
                    </div> -->
                    <div class="col-md-1 cust_info">
                        <label for="">Total</label>
                        <input type="text" name="" class="col-md-1 form-control input-sm" id="total" autocomplete="off" readonly>
                    </div>
                    <div class="offset-md-2 col-md-1" id="subb">
                        <input type="submit" value="Add" class="col-md-12 input-sm btn btn-success item_add" id="item_add" style="margin-top:25px;">
                    </div>
                    <div class="offset-md-2 col-md-1" style="display:none;" id="update">
                        <input type="submit" value="Update" class="col-md-12 input-sm btn btn-info item_add" id="item_update" style="margin-top:25px;">
                    </div>
                    <div class="offset-md-2 col-md-1" style="display:none;" id="Delete">
                        <input type="submit" value="Delete" class="col-md-12 input-sm btn btn-danger" id="item_Delete" style="margin-top:25px;">
                    </div>
                    <div class="offset-md-2 col-md-1">
                        <input type="submit" value="clear" class="col-md-12 input-sm btn btn-default" id="item_clear" style="margin-top:25px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12  theam tbl1" style="margin-top: -10px;" id="tb">
</div>

<script>
  $(document).ready(function()
  {

      $('#tb').load("sale_item_fetch.php");
      $('#qty').keyup(function()
        {
            var stock = parseInt($('#stock').val());
            var qty = parseInt($('#qty').val());
            var rate = parseInt($('#sale_rate').val());
            if(qty > stock)
            {
                $('#item_add').prop('disabled',true);
                $('#item_update').prop('disabled',true);
                $("#qty").css("border", "2px solid red");
            }else
            {
                var final = qty * rate;
                $('#item_add').prop('disabled',false);
                $('#item_update').prop('disabled',false);
                $("#qty").css("border", "none");
                $("#total").val(final);
            }
        });

        $('.item_add').click(function() 
        {
            var edit = $('#edit').val();
            var item_name = $('#item_name').val();
            var item_hsn = $('#item_HSN').val();
            var pur_rate = $('#pur_rate').val();
            var sale_rate = $('#sale_rate').val();
            var qty = $('#qty').val();
            var total = $('#total').val();
            if ((item_name == "") || (item_hsn == "") || (pur_rate == "") || (sale_rate == "") ||
                (qty == "") || (qty == 0) || (total == "")) 
                {
                alert("All Field Necessary");
            } else {

                $.ajax({
                    type: "post",
                    url: "sale_tem.php",
                    data: {
                        item_name: item_name,
                        item_hsn: item_hsn,
                        pur_rate: pur_rate,
                        sale_rate: sale_rate,
                        qty: qty,
                        total: total,
                        edit:edit
                    },
                    success: function(status) 
                    {
                        $('#item_clear').click();
                        $('#edit').val(status);
                        $('#tb').load("sale_item_fetch.php");
                    }
                });
            }
        });

        $('#item_Delete').click(function()
      {
            var item_HSN=$('#item_HSN').val();
            $.ajax({
            type: "post",
            url: "itemDelete.php",
            data: {
                idd:0,
                id:item_HSN
            },
            success: function(status) 
            {
                alert(status);
                $('#tb').load("sale_item_fetch.php");
                $('#item_clear').click();
            }
        });
      });
      $('#item_clear').click(function()
      {
            $('#item_name').val("");
            $('#item_HSN').val("");
            $('#pur_rate').val("");
            $('#sale_rate').val("");
            $('#stock').val("");
            $('#qty').val("");
            $('#total').val("");
            $("#subb").show();
            $("#update").hide();
            $("#Delete").hide();
      });
  });

  
  function cancel()
  {
      $.ajax({
            type: "post",
            url: "cancel.php",
            data: {
                action: "sale_cancel",
            },
            success: function(status) {
                alert(status);
                $("#subb").show();
                $("#update").hide();
                $('#tb').load("sale_item_fetch.php");
            }
        });
  }

  document.getElementById("qty").addEventListener('keyup', function(event) {
        var input = this.value;
        
            input = input.replace(/[^0-9]/g, '');
            this.value = input;
        
    });
</script>