
<script type="text/javascript">
    function checkDelete()
    {
        var check = confirm("ARE YOU SURE YOUR WANT TO DELETE?");
        if (check)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function checkUpdate()
    {
        var Ucheck = confirm("ARE YOU SURE YOU WANT TO UPDATE");
        if (Ucheck)
        {
            return truel
        }
        else
        {
            return false;
        }
    }
</script>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Tables</a></li>
</ul>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer Phone</th>
                        <th>Shipping Name</th>
                        <th>Shipping Phone</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($invoice_info as $v_invoice) {?>
                        <tr>
                            <td class="center"><?php  echo $v_invoice->customer_name ?></td>
                            <td class="center"><?php  echo $v_invoice->customer_phone_number ?></td>
                            <td class="center"><?php  echo $v_invoice->shipping_name ?></td>
                            <td class="center"><?php  echo $v_invoice->shipping_number ?></td>
                            <td class="center">
                                
                                <a class="btn btn-info" href="<?php echo base_url()?>invoice/view_invoice/<?php  echo $v_invoice->order_id ?>" onclick="return checkUpdate()">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="<?php echo base_url()?>invoice/delete_invoice/<?php  echo $v_invoice->order_id ?>">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->

