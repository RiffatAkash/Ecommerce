<?php

//$a=$this->cart->contents();
//echo '<pre>';
//print_r($a);
//exit();
?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->cart->contents() as $v_contents) {?>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="<?php echo base_url().$v_contents['options']['image'] ?>" style="height:150px;width: 150px" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href=""><?php echo $v_contents['name']?></a></h4>
                        </td>
                        <td class="cart_price">
                            <p><?php echo $v_contents['price']?></p>
                        </td>
                        <td class="cart_description">
                            <div class="cart_quantity_button">
                                <form method="post" action="<?php echo base_url()?>cart/update_cart">
                                <input class="cart_quantity_input" type="text" name="qty" value="<?php echo $v_contents['qty']?>" autocomplete="off" size="2">
                                <input class="cart_quantity_input" type="hidden" name="rowid" value="<?php echo $v_contents['rowid']?>" autocomplete="off" size="2">
                                <button class="cart_quantity_down" href="">update</button>
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">Tk <?php echo $v_contents['subtotal']?></p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="<?php echo base_url()?>cart/delete_cart/<?php echo $v_contents['rowid']?>"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
       
            <div class="col-sm-12">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>Tk <?php echo $this->cart->total()?></span></li>
                        <li>Eco Tax(10%) <span>Tk <?php echo $vat= (($this->cart->total()*10)/100); ?></span></li>
                        <li>Total <span>Tk <?php echo $a=$vat+ $this->cart->total();
                                       $sdata=array();
                                      $sdata['order_total']=$a;
                                      $this->session->set_userdata($sdata);
                        ?></span></li>
                    </ul>
                  
                    <a class="btn btn-default check_out" href="<?php echo base_url()?>">Continue</a>
                    <a class="btn btn-default check_out" href="<?php echo base_url()?>cart/checkout">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->


