		
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">ADD Manufacture</a>
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
                                        $message=$this->session->userdata('message');
                                        if($message)
                                        {
                                            echo $message;
                                            $this->session->unset_userdata('message');
                                        }
                                        ?>
                                    </h3>
					<div class="box-content">
                                            <form class="form-horizontal" action="<?php echo base_url()?>admin/save_manufacture" method="post">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Add Manufacture </label>
							  <div class="controls">
								<input type="text" name="manufacture_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                                                <span class="text-danget"><?php echo form_error('manufacture_name')?></span>
                                                          </div>
							</div>
          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Add Manufacture Description</label>
							  <div class="controls">
								<textarea name="manufacture_description" class="cleditor" id="textarea2" rows="3"></textarea>
                                                                <span class="text-danget"><?php echo form_error('manufacture_description')?></span>
                                                   
							  </div>
							</div>
                                                      
                                                      
                                                      
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
                                                              <select name="publication_status">
                                                                  <option>Select Status</option>
                                                                  <option value="1">Published</option>
                                                                  <option value="2">Unpublished</option>
                                                              </select>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save Manufacture</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->