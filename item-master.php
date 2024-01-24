<?php include('header.php'); ?>
<style>
       #itm-css{
        border: 2px solid white;
      } 
    </style>

<div class="col-md-12 bg-info">
    <div class="row ip1">
        <div class="col-md-12">
            <div class="row" style="margin-right: 5%;">
                <div class="offset-md-3 col-md-1 cust_info" style="display: none;">
                    <input type="text" name="" class="col-md-1 form-control input-sm" id="item_id">
                    <input type="text" name="" class="col-md-1 form-control input-sm" id="edit">
                    <input type="text" name="" class="col-md-1 form-control input-sm" id="edit_name">
                    <input type="text" name="" class="col-md-1 form-control input-sm" id="edit_hsn">
                </div>
                <div class="offset-md-3 col-md-3 cust_info">
                    <label for="input">Item Name</label>
                    <input type="text" name="" class="col-md-2 form-control input-sm" id="item_name" autocomplete="off" autofocus>
                    <div id="item_error"></div>
                </div>
                <div class="offset-md-3 col-md-3 cust_info">
                    <label for="input">Item HSN</label>
                    <input type="text" name="" class="col-md-2 form-control input-sm " id="item_hsn">
                    <div id="hsn_error"></div>
                </div>
                <div class="offset-md-2 col-md-1" id="add">
                    <input type="submit" value="Add" class="col-md-12 input-sm btn btn-success item_add" id="item_add" style="margin-top:25px;">
                </div>
                <div class="offset-md-2 col-md-1" style="display:none;" id="update">
                    <input type="submit" value="Update" class="col-md-12 input-sm btn btn-info item_add" id="item_update" style="margin-top:25px;">
                </div>
                <div class="offset-md-2 col-md-1">
                    <input type="submit" value="Clear" class="col-md-12 input-sm btn btn-default" id="item_clear" style="margin-top:25px;">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 theam" id="fetch_table" style="margin-top: -10px;">
   
</div>

<script>
    $(document).ready(function()
    {
        $('#fetch_table').load("fetch_item_master.php");
    });
    $('.item_add').click(function() 
    {
        let itemName=$("#item_name").val();
        let item_hsn=$("#item_hsn").val();

        let edit=$("#edit").val();
        let item_id=$("#item_id").val();
        if(itemName!='' & item_hsn!='' & itemName!=0 & item_hsn!=0)
        {
            
            $.ajax({
                    type: "post",
                    url: "add_item_ajax.php", 
                    data: {
						action: "add",
                        itemName: itemName,
                        item_hsn: item_hsn,
                        edit:edit,
                        item_id:item_id
                    },
                    success: function(status) 
                    {
                        
                        alert(status);
                        $('#item_clear').click();
                    }
                })
        }else
        {
            $("#item_error").html('<span>Enter Valid Input</span>');
            $("#hsn_error").html('<span>Enter Valid Input</span>');
        }
    });
    $('#item_clear').click(function()
    {
        $("#item_name").val('');
        $("#edit_hsn").val('');
        $("#edit").val('');
        $("#item_name").val('');
        $("#item_hsn").val('');
        $('#item_id').val('');
        $('#update').hide();
        $('#add').show();
        $('#item_add').prop('disabled',false);
        $('#item_update').prop('disabled',false);
        $("#item_error").html('');
        $("#hsn_error").html('');
        $('#fetch_table').load("fetch_item_master.php");
    });

    $("#item_name , #item_hsn").keyup(function()
    {
        let itemName=$("#item_name").val();
        let edit=$("#edit").val();
        let edit_name=$("#edit_name").val();
        let item_hsn=$("#item_hsn").val();
        let edit_hsn=$("#edit_hsn").val();
        jQuery.ajax({
            url:'accurate_item.php',
            data:{
                itemName:itemName,
                edit:edit,
                edit_name:edit_name,
                item_hsn:item_hsn,
                edit_hsn:edit_hsn
            },
            type:"POST",
            success:function(data)
            {
                // alert(data);
                $("#item_error").html(data);
                $("#hsn_error").html(data);
            },
            error:function(){}
        
        });
    });

    // $('#item_hsn').keyup(function()
    // {
    //     let item_hsn=$("#item_hsn").val();
    //     let edit=$("#edit").val();
    //     let edit_hsn=$("#edit_hsn").val();
    //     jQuery.ajax({
    //         url:'accurate_item.php',
    //         data:{
    //             item_hsn:item_hsn,
    //             edit:edit,
    //             edit_hsn:edit_hsn
    //         },
    //         type:"POST",
    //         success:function(data)
    //         {
    //             $("#hsn_error").html(data);
    //         },
    //         error:function(){}
        
    //     });
    // });
</script>

</body>
</html>