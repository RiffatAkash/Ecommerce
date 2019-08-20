<div class="shopper-informations">
    <div class="row">
       
        <div class="col-sm-5 clearfix">
            <div class="bill-to">
                <h3><?php
                $message=$this->session->userdata('message');
                if($message)
                {
                    echo $message;
                    $this->session->unset_userdata('message');
                }
                ?></h3>
                <p>Customer Registration</p>
                <div class="form-one">
                    <form action="<?php echo base_url()?>checkout/save_customer_info" method="post">
                        <input type="text" name="customer_name" placeholder="Customer Name">
                        <input type="email" name="customer_email" placeholder="Customer Email">
                        <input type="password" name="customer_password" placeholder="Customer Password">
                        <input type="text" name="customer_phone_number" placeholder="Customer Number">
                        <input type="text" name="customer_location" placeholder="Customer Location">
                        <button type="submit" style="margin-bottom: 10px" class="btn btn-primary" href="">Registration</button>
                    </form>
                  
                   
                </div>
                
            </div>
        </div>
         <div class="col-sm-3">
            <div class="shopper-info">
                <p style="color:red"><?php
                $wrong_message=$this->session->userdata('wrong_message');
                if(isset($wrong_message))
                {
                    echo $wrong_message;
                    $this->session->unset_userdata('wrong_message');
                }
                
                ?></p>
                <p>Customer Login</p>
                <form action="<?php echo base_url()?>checkout/check_customer_info" method="post">
                    <input type="email" name="customer_email" placeholder="Customer Email">
                    <input type="password"  name="customer_password"  placeholder="Password">
                    <button type="submit" class="btn btn-primary" href="">Login</button>
                </form>
               
              
            </div>
        </div>
      				
    </div>
</div>