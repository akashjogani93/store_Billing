<?php include('header.php'); ?>
    <style>
       #pur-css{
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

    #list1 {
        max-height: 70px;
        overflow-y: auto;
    }

    #list1 ul {
        background-color: #DEB0A6;
        padding: 3px;
        cursor: pointer;
        max-height: 150px;
        overflow-y: auto;
        list-style: none;

    }

    #list1 li {
        color: black;
        font: 12pt;
        padding: 8px;
    }

    #list1 li:hover {
        color: white;
        background-color: #b3b3ff;
    }

    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
    </style>
<script>
  $(document).ready(function() {
        $("#item_name").keyup(function() 
        {
            var x = $(this).val();
            
            if (x != '') {
               let log= $.ajax({
                    url: "product_search.php",
                    method: "POST",
                    data: {
                        query: x
                    },
                    success: function(data) {
                        $('#list').fadeIn();
                        $('#list').html(data);
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
                    url: "items.php",
                    dataType: 'json',
                    data: {
                        action: x
                    },
                    success: function(data) {
                        $("#item_id").val(data[0]);
                        $("#item_hsn").val(data[1]);
                    }
                });
            });
        });
    });
</script>

<div class="col-md-12 bg-success">
  <h3 class="text-center" style="color:black; margin-top:3px; margin-bottom:-2px;">STOCK ENTRY</h3>
    <div class="container-fluid bg-info">
      <div class="row ip1">
        <div class="row">
          <div class="offset-md-3 col-md-1 cust_info" style="display: none;">
            <label for="">Item id</label>
            <input type="text" name="" class="col-md-1 form-control input-sm" id="item_id">
            <input type="text" name="" class="col-md-1 form-control input-sm" id="edit">
          </div>
          <div class="col-md-3 cust_info" style="margin-left:-40px;">
            <label for="">Item Name</label>
            <input type="text" name="" class="col-md-1 form-control input-sm" id="item_name" autocomplete="off">
            <lable id="list"></lable>
          </div>
          <div class="offset-md-3 col-md-1 cust_info">
            <label for="">Item HSN</label>
            <input type="text" name="" class="col-md-1 form-control input-sm" id="item_hsn" autocomplete="off" readonly>
          </div>
          <div class="offset-md-3 col-md-1 cust_info">
              <label for="input">Quantity</label>
              <input type="number" name="" class="col-md-1 form-control input-sm" id="item_quant" min="1">
          </div>
          <div class="offset-md-2 col-md-1 cust_info">
              <label for="input">Pur Rate</label>
              <input type="number" name="" class="col-md-1 form-control input-sm" id="item_rate"
                  autocomplete="off" min="1">
          </div>
          <div class="offset-md-2 col-md-1 cust_info">
              <label for="input">Sale Rate</label>
              <input type="number" name="" class="col-md-1 form-control input-sm" id="sale_rate"
                  autocomplete="off" min="1">
          </div>
          <div class="offset-md-2 col-md-1 cust_info">
              <label for="input">Pur Total</label>
              <input type="text" name="" class="col-md-1 form-control input-sm" id="item_value" readonly>
          </div>
          <div class="col-md-1 " style="margin-top: 25px;" id="iaddd">
              <input type="submit" value="Add" class="col-md-12 input-sm btn btn-success iadd" id="iadd">
          </div>
          <div class="col-md-1 " style="margin-top: 25px; display:none;" id="updatedcol">
              <input type="submit" value="Update" class="col-md-12 input-sm btn btn-info iadd" id="upd">
          </div>
          <div class="col-md-1 " style="margin-top: 25px; display:none;" id="deleteitem">
              <input type="submit" value="Delete" class="col-md-12 input-sm btn btn-danger" id="delete">
          </div>
          <div class="col-md-1 " style="margin-top: 25px;" id="cancel">
              <input type="submit" value="clear" class="col-md-12 input-sm btn btn-default" id="item_clear">
          </div>
        </div>
      </div>
    </div>
</div>
<div class="col-md-12 tbl1 theam" style="margin-top: -10px;" id="tb">
</div>

<script>
  $(document).ready(function(){
      $('#tb').load("purchase_item_fetch.php");
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
      $('#item_rate, #item_quant').keyup(function() {

        //   var rate = $(this).val();
          var qty = $('#item_quant').val();
          var rate = $('#item_rate').val();
          var final = qty * rate;
          $("#item_value").val(final);
      });

      $('.iadd').click(function() 
      {
            var edit =$('#edit').val();
            var item_id = $('#item_id').val();
            var item_name = $('#item_name').val();
            var item_hsn = $('#item_hsn').val();
            var item_quant = $('#item_quant').val();
            var item_rate = $('#item_rate').val();
            var sale_rate = $('#sale_rate').val();
            var item_value = $('#item_value').val();


            if ((item_id == "") || (item_name == "") || (item_hsn == "") || (item_quant == "") || (item_value == "") ||
                (item_rate == "") || (sale_rate == "") || (item_quant == 0) || (item_rate == 0) || (sale_rate == 0)) 
                {
                    alert("All Field Necessary");
            } else {

                $.ajax({
                    type: "post",
                    url: "holesale_coding.php",
                    data: {
                        action: "holesale_item",
                        item_name: item_name,
                        item_hsn: item_hsn,
                        item_quant: item_quant,
                        item_rate: item_rate,
                        sale_rate: sale_rate,
                        item_value: item_value,
                        item_id: item_id,
                        edit: edit
                    },
                    success: function(status) 
                    {
                        $('#item_clear').click();
                        $('#edit').val(status);
                        alert("Success");
                        $('#tb').load("purchase_item_fetch.php");
                    }
                });
            }

      });

      $('#item_clear').click(function()
      {
        $('#item_name').val("");
        $('#item_hsn').val("");
        $('#item_quant').val("");
        $('#sale_rate').val("");
        $('#item_rate').val("");
        $('#item_value').val("");
        $('#item_id').val("");
        $('#updatedcol').hide();
        $('#deleteitem').hide();
        $('#iaddd').show();
      });

      $('#delete').click(function()
      {
            var itemid=$('#item_id').val();
            $.ajax({
            type: "post",
            url: "itemDelete.php",
            data: {
                id:itemid,
                idd:1
            },
            success: function(status) 
            {
                alert(status);
                $('#tb').load("purchase_item_fetch.php");
                $('#item_clear').click();
            }
        });
      });

      document.getElementById("item_quant").addEventListener('keyup', function(event) {
        var input = this.value;
        
            input = input.replace(/[^0-9]/g, '');
            this.value = input;
        
    });
    document.getElementById("item_rate").addEventListener('keyup', function(event) {
        var input = this.value;
        
            input = input.replace(/[^0-9]/g, '');
            this.value = input;
        
    });
    document.getElementById("sale_rate").addEventListener('keyup', function(event) {
        var input = this.value;
        
            input = input.replace(/[^0-9]/g, '');
            this.value = input;
        
    });
    
  });

  function cancel()
  {
      $.ajax({
            type: "post",
            url: "cancel.php",
            data: {
                action: "pur_cancel",
            },
            success: function(status) {
                alert(status);
                $('#tb').load("purchase_item_fetch.php");
            }
        });
  }
  </script>
</body>
</html>