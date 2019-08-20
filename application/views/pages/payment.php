<div class="shopper-informations">
    <div class="row">
       
        <div class="col-sm-5 clearfix">
            <div class="bill-to">
                             
                <p>Payment Information</p>
                <div class="form-one">
                    <form action="<?php echo base_url()?>checkout/save_payment_info" method="post">
                        <input style="display:inline-block;width: auto;margin: 5px" type="radio" name="payment_info" value="bkash"/><span>Bkash</span>
                        
                        <br/>
                        <input style="display:inline-block;width: auto;margin: 5px" type="radio" name="payment_info" value="cash_on_delivery"/><span>Cash On Delivery</span>
<!--                       <br>-->
<!--                       <input style="float: left;margin-left:-90px;" type="radio" name="payment_info" value="cash_on_delivery"><div class='a' style="margin-right: -100px">Bkash</div>-->
                        <br/><button type="submit" style="margin-bottom: 10px" class="btn btn-primary" href="">Submit</button>
                    </form>
                  
                   
                </div>
                
            </div>
        </div>
      
      				
    </div>
</div>