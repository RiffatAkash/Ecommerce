<?php
function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}
?>
<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
                                                    <?php
                                                    $i=0;
                                                    foreach($feature_items as $v_feature_items) {
                                                        if($i==0)
                                                        {  ?>
                                                    <div class="item active">
								<div class="col-sm-6">
									<h1><?php echo $v_feature_items->product_name?></h1>
									<h2>Tk. <?php echo $v_feature_items->product_price?></h2>
									<p><?php echo custom_echo($v_feature_items->product_short_description, 100);?> </p>
								        <a  href="<?php echo base_url()?>welcome/product_details/<?php echo  $v_feature_items->product_id ?>" class="btn btn-default get">Product Details</a>
							        </div>
								<div class="col-sm-6">
                                                                    <img src="<?php echo base_url().$v_feature_items->product_image?>" style="height: 300px;width: 300px"  class="girl img-responsive" alt="" />
									<img src=""  class="pricing" alt="" />
								</div>
							</div>
                                                    <?php }
                                                     else{
                                                         ?>
                                                          <div class="item ">
								<div class="col-sm-6">
									<h1><?php echo $v_feature_items->product_name?></h1>
									<h2>Tk. <?php echo $v_feature_items->product_price?></h2>
									<p><?php echo custom_echo($v_feature_items->product_short_description, 100);?> </p>
                                                                        <a  href="<?php echo base_url()?>welcome/product_details/<?php echo  $v_feature_items->product_id ?>" class="btn btn-default get">Product Details</a>
								</div>
								<div class="col-sm-6">
                                                                    <img src="<?php echo base_url().$v_feature_items->product_image?>" style="height: 300px;width: 300px"  class="girl img-responsive" alt="" />
									<img src=""  class="pricing" alt="" />
								</div>
							</div>
                                                   <?php  }
                                                    
                                                    $i++;
                                                    
                                                        }?>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->