<?php include('header.php'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <style>
       #rep-css{
        border: 2px solid white;
      } 

      .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: white !important;
            border: none;
            background-color: #585858;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #585858), color-stop(100%, #111));
            /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, #585858 0%, #111 100%);
            /* Chrome10+,Safari5.1+ */
            background: -moz-linear-gradient(top, #585858 0%, #111 100%);
            /* FF3.6+ */
            background: -ms-linear-gradient(top, #585858 0%, #111 100%);
            /* IE10+ */
            background: -o-linear-gradient(top, #585858 0%, #111 100%);
            /* Opera 11.10+ */
            background: linear-gradient(to bottom, #585858 0%, #111 100%);
            /* W3C */
        }
        div.dataTables_length select 
        {
            color: black !important;
            background-color: white !important; 
        }
    </style>

<div class="col-md-12 bg-success">
  <h3 class="text-center" style="color:black; margin-top:3px; margin-bottom:10px;">STOCK ENTRY</h3>
</div>
<!-- <div class="col-md-12 bg-info">
    <div class="row ip1">
        <div class="col-md-12">
            <div class="row" style="margin-right: 5%;">
                <div class="offset-md-3 col-md-1 cust_info" style="display: none;">
                    <input type="text" name="" class="col-md-1 form-control input-sm" id="item_id">
                </div>
                <div class="offset-md-3 col-md-3 cust_info">
                    <label for="input">Item Name</label>
                    <input type="text" name="" class="col-md-2 form-control input-sm" id="item_name" autocomplete="off">
                    <div id="item_error"></div>
                </div>
                <div class="offset-md-3 col-md-2 cust_info">
                    <label for="input">Item HSN</label>
                    <input type="text" name="" class="col-md-2 form-control input-sm " id="item_hsn">
                    <div id="hsn_error"></div>
                </div>
                <div class="offset-md-2 col-md-1">
                    <input type="submit" value="Add" class="col-md-12 input-sm btn btn-success" id="item_add" style="margin-top:25px;">
                </div>
                <div class="offset-md-2 col-md-1">
                    <input type="submit" value="Update" class="col-md-12 input-sm btn btn-info" id="item_update" style="margin-top:25px;">
                </div>
                <div class="offset-md-2 col-md-1">
                    <input type="submit" value="clear" class="col-md-12 input-sm btn btn-default" id="item_clear" style="margin-top:25px;">
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="col-md-12 theam" id="fetch_table" style="margin-top: -10px;">
   
</div>

<script>
    $(document).ready(function()
    {
        

        $('#fetch_table').load("load_stocks.php");
        
    });
    $('#item_add').click(function() {
        let itemName=$("#item_name").val();
        let item_hsn=$("#item_hsn").val();
        if(itemName!='' & item_hsn!='')
        {
            $(':text').val("");
            $.ajax({
                    type: "post",
                    url: "add_item_ajax.php", 
                    data: {
						action: "add",
                        itemName: itemName,
                        item_hsn: item_hsn
                    },
                    success: function(status) {
                        $('#fetch_table').load("fetch_item_master.php");
                        alert(status);
                    }

                })
        }
    });
</script>

</body>
</html>