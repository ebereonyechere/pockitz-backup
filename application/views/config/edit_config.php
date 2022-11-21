<?php $this->load->view('admin/theme/message'); ?>
<?php 

if(array_key_exists(0,$config_data))
$google_safety_api=$config_data[0]["google_safety_api"]; 
else $google_safety_api="";

if(array_key_exists(0,$config_data))
$moz_access_id=$config_data[0]["moz_access_id"]; 
else $moz_access_id="";

if(array_key_exists(0,$config_data))
$moz_secret_key=$config_data[0]["moz_secret_key"]; 
else $moz_secret_key="";

if(array_key_exists(0,$config_data))
$mobile_ready=$config_data[0]["mobile_ready_api_key"]; 
else $mobile_ready="";


 ?>
<div class="row">
   <div class="col-md-12">
   <?php if($this->session->userdata("user_type")=="Admin") { ?> <div class="alert alert-info text-center">To know more read <a target="_BLANK" href="<?php echo site_url();?>documentation/#!/administration_settings_gt_connectivity_settings"> documentation</a></div> <?php } ?>
     	<div class="card">

		    	<div class="card-header">
		         <h3 class="card-title"><i class="fa fa-connectdevelop"></i> <?php echo $this->lang->line("connectivity settings");?> <?php if($this->session->userdata("user_type")=="Member") {echo "(Optional)";}?></h3>
		        </div><!-- /.box-header -->
		       		<!-- form start -->
            <div class="card-content">
                <div class="card-body">

                    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url().'config/edit_config';?>" method="POST">

                        <?php if ($is_admin) : ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="">Add New Google API  Key
                                </label>
                                <div class="col-sm-9 col-md-6 col-lg-6">
                                    <input name="google_safety_api" value=""  class="form-control" type="text">
                                    <span class="red"><?php echo form_error('google_safety_api'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <h4>API Keys Added</h4>
                                <ul>
                                    <?php foreach ($config_data as $data): ?>
                                        <li><?= $data['google_safety_api'] ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php else : ?>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="">Google API  Key
                                </label>
                                <div class="col-sm-9 col-md-6 col-lg-6">
                                    <input name="google_safety_api" value="<?php echo $google_safety_api;?>"  class="form-control" type="text">
                                    <span class="red"><?php echo form_error('google_safety_api'); ?></span>
                                </div>
                            </div>

                        <?php endif; ?>

                        <div class="form-group" style="display:none">
                            <label class="col-sm-3 control-label" for="">MOZ Access ID
                            </label>
                            <div class="col-sm-9 col-md-6 col-lg-6">
                                <input name="moz_access_id" value="<?php echo $moz_access_id;?>"  class="form-control" type="text">
                                <span class="red"><?php echo form_error('moz_access_id'); ?></span>
                            </div>
                        </div>

                        <div class="form-group" style="display:none">
                            <label class="col-sm-3 control-label" for="">MOZ Secret Key
                            </label>
                            <div class="col-sm-9 col-md-6 col-lg-6">
                                <input name="moz_secret_key" value="<?php echo $moz_secret_key;?>"  class="form-control" type="text">
                                <span class="red"><?php echo form_error('moz_secret_key'); ?></span>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <input name="submit" type="submit" class="btn btn-warning btn-lg" value="<?php echo $this->lang->line("Save");?>"/>
                                    <input type="button" class="btn btn-default btn-lg" value="<?php echo $this->lang->line("Cancel");?>" onclick='goBack("config",1)'/>
                                </div>
                            </div>
                        </div><!-- /.box-footer -->
                    </form>
                </div>
            </div>
     	</div>
   </div>
</div>



