<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCT BILLING</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
    html body {
    margin: 0px;
    padding: 0px;
    overflow: scroll;
    font-family: 'Noticia Text', serif;
}
</style>
<body>
    <section class="col-md-12 theam mt-3">
        <div class="row">
            <div class="list-header">
                <div class="list-names">
                    <a href="purchase-product.php" role="button" class="list-nav" id="pur-css">
                        <span>PURCHASE</span>
                    </a>
                </div>
                <div class="list-names ">
                    <a href="product_sale.php" role="button" class="list-nav" id="sale-css">
                        <span>SALE</span>
                    </a>
                </div>
                <div class="list-names">
                    <a href="item-master.php" role="button" id="itm-css" class="list-nav">
                        <span>ITEM</span>
                    </a>
                </div>
                <div class="list-names">
                    <div class="dropdown list-nav" id="rep-css">
                        <div class="dropdown-toggle" data-toggle="dropdown"  style="cursor:pointer; font-size:16px;">
                            <span>REPORT <i class="fa fa-caret-down" aria-hidden="true"></i></span>
                        </div>
                        <ul class="dropdown-menu">
                            <li><a href="view_stocks.php">Stock</a></li>
                            <li><a href="sales-bill.php">Sales Bills</a></li>
                            <!-- <li><a href="">Sales Items</a></li> -->
                            <li><a href="purchase-bills.php">Purchase Bills</a></li>
                    </div>
                </div>
                <div class="list-names">
                    <a href="index.php" class="list-nav">
                        <span>LOGOUT</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- <script
        src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).on('click','.list-nav', function(){
                $(this).addClass('active') .siblings().removeClass('active')
            })
    </script> -->

