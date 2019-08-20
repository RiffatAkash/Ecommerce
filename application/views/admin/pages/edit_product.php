<?php
//echo '<pre>';
//print_r($product_info);
//exit();
?>		
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">ADD PRODUCT</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h3 style="color:green">
            <?php
            $message = $this->session->userdata('message');
            if ($message) {
                echo $message;
                $this->session->unset_userdata('message');
            }
            ?>
        </h3>
        <div class="box-content">
<!--                                            <form class="form-horizontal" action="<?php echo base_url() ?>admin/save_product" method="post" enctype="multipart/form-data">-->
            <?php echo form_open_multipart('admin/update_product', 'class="form-horizontal" name="edit_product"'); ?>
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="typeahead"> Product  Name</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $product_info->product_name ?>" name="product_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                        <input type="hidden" value="<?php echo $product_info->product_id ?>" name="product_id" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                    </div>
                </div>
                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Category Name</label>
                    <div class="controls">
                        <select name="category_id" id="selectError3" value="<?php echo $product_info->category_id ?>">
                            <option>Select Category</option>
                            <?php foreach ($category_info AS $category) { ?>
                                <option value="<?php echo $category->category_id ?>"><?php echo $category->category_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Manufacture Name</label>
                    <div class="controls">
                        <select name="manufacture_id" id="selectError3" value="<?php echo $product_info->manufacture_id ?>">
                            <option>Select Manufacturer</option>
                            <?php
                            foreach ($manufacture_info as $v_manufacturer) {
                                ?>
                                <option value="<?php echo $v_manufacturer->manufacture_id; ?>"><?php echo $v_manufacturer->manufacture_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Product Short Description</label>
                    <div class="controls">
                        <textarea name="product_short_description" class="cleditor" id="textarea2" rows="3"><?php echo $product_info->product_short_description ?></textarea>
                    </div>
                </div>


                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Product Long Description</label>
                    <div class="controls">
                        <textarea name="product_long_description" class="cleditor" id="textarea2" rows="3"><?php echo $product_info->product_long_description ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Product Price </label>
                    <div class="controls">
                        <input type="number" value="<?php echo $product_info->product_price ?>" name="product_price" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="typeahead">Product New Price  </label>
                    <div class="controls">
                        <input type="number" value="<?php echo $product_info->product_new_price ?>" name="product_new_price" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="typeahead">Product quantity </label>
                    <div class="controls">
                        <input type="number"value="<?php echo $product_info->product_quantity ?>" name="product_quantity" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="typeahead">Product Image </label>
                    <div class="controls">
                        <input name="product_image" class="input-file uniform_on" id="fileInput" type="file">
                        <input name="product_old_image" class="input-file uniform_on" id="fileInput"  value="<?php echo $product_info->product_image ?>" type="hidden">
                        <img src="<?php echo base_url() . $product_info->product_image ?>" width="100" height="50">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="reset" class="btn">Cancel</button>
                </div>

            </fieldset>
            <?php echo form_close() ?>      

        </div>
    </div><!--/span-->

</div><!--/row-->

<script>
    document.forms['edit_product'].elements['category_id'].value =<?php echo $product_info->category_id ?>;
    document.forms['edit_product'].elements['manufacture_id'].value =<?php echo $product_info->manufacture_id ?>
</script>