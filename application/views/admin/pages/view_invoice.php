<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;

    }
</script>
<div class="row">
    <div class="col-md-offset-8 col-md-4">
        <div  align="right" style="margin-bottom: 10px" >
            <button type="submit" name="btn" class="btn btn-outline btn-primary  " style="width: 100px"
                    onclick="printContent('print')"><i class="fa fa-print"></i> Print
            </button>

        </div>
    </div>
</div>
<div id="print">
    <div class="row-fluid sortable">
        <div class="box span6">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Table</h2>

            </div>
            <div class="box-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Phone Number</th>

                        </tr>
                    </thead>   
                    <tbody>
                        <tr>
                            <td><?php echo $customer_info->customer_name ?></td>
                            <td class="center"><?php echo $customer_info->customer_phone_number ?></td>

                        </tr>

                    </tbody>
                </table>  

            </div>
        </div><!--/span-->

        <div class="box span6">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Table</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Phone Number</th>

                        </tr>
                    </thead>   
                    <tbody>
                        <tr>
                            <td><?php echo $shipping_info->shipping_name ?></td>
                            <td class="center"><?php echo $shipping_info->shipping_number ?></td>

                        </tr>

                    </tbody>
                </table>  

            </div>
        </div><!--/span-->
    </div><!--/row-->


    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Order details</h2>

            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Sales Quantity</th>
                            <th>Product Sub Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php $sum=0; foreach ($order_details_info as $v_order_details_info) { ?>
                            <tr>
                                <td><?php echo $v_order_details_info->order_details_id ?></td>
                                <td class="center"><?php echo $v_order_details_info->product_name ?></td>
                                <td class="center">TK <?php echo $v_order_details_info->product_price ?></td>
                                <td class="center"><?php echo $v_order_details_info->product_sales_quantity ?></td>
                                <td class="center">TK <?php
                                $sum=$sum+($v_order_details_info->product_sales_quantity * $v_order_details_info->product_price);
                                echo $v_order_details_info->product_sales_quantity * $v_order_details_info->product_price ?></td>
                                <td>
                                        
                                <a class="btn btn-info" href="<?php echo base_url()?>invoice/edit_invoice/<?php echo $v_order_details_info->order_details_id ?>" onclick="return checkUpdate()">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr> 
                            <td colspan="4">Vat  10%</td>
                            <td>Tk <?php echo $a=($sum*10)/100 ?></td>
                        </tr>
                        <tr> 
                            <td colspan="4">Total With Vat</td>
                            <td>Tk <?php echo $a+$sum ?></td>
                        </tr>
                    <tfoot>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->

</div>