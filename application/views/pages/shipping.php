<div class="shopper-informations">
    <div class="row">
       
        <div class="col-sm-5 clearfix">
            <div class="bill-to">
                             
                <p>Shipping Information</p>
                <div class="form-one">
                    <form action="<?php echo base_url()?>checkout/save_shipping_info" method="post">
                        <input type="text" name="shipping_name" placeholder="Shipping Name">
                        <input type="email" name="shipping_email" placeholder="Shipping Email">
                        <input type="text" name="shipping_phone_number" placeholder="Shipping Number">
                        <input type="text" name="shipping_location" placeholder="Shipping Location">
                        <button type="submit" style="margin-bottom: 10px" class="btn btn-primary" href="">Submit</button>
                    </form>
                  
                   
                </div>
                
            </div>
        </div>
      
      				
    </div>
</div>