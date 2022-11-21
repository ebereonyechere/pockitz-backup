<?php $this->load->view('admin/theme/message'); ?>
<div class="row">
   <div class="col-md-12">
       <div class="card">
           <div class="card-content">
               <div class="card-body">
                   <?php
                   $text="Generate Your ".$this->config->item("product_short_name")." API Key";
                   $get_key_text="Get Your ".$this->config->item("product_short_name")." API Key";
                   if(isset($api_key) && $api_key!="")
                   {
                       $text="Re-generate Your ".$this->config->item("product_short_name")." API Key";
                       $get_key_text="Your ".$this->config->item("product_short_name")." API Key";
                   }
                   ?>

                   <!-- form start -->
                   <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url().'native_api/get_api_action';?>" method="GET">
                       <div class="box-body" style="padding-top:0;">
                           <div class="form-group">
                               <div class="small-box bg-blue">
                                   <div class="inner">
                                       <h4><?php echo $get_key_text; ?></h4>
                                       <p>
                                       <h2><?php echo $api_key; ?></h2>
                                       </p>
                                       <i class="fa fa-key"></i> <input name="button" type="submit" class="btn btn-default btn-lg btn" value="<?php echo $text; ?>"/>
                                   </div>
<!--                                   <div class="icon">-->
<!--                                       <i class="fa fa-key"></i>-->
<!--                                   </div>-->
                               </div>
                           </div>

                       </div> <!-- /.box-body -->
                   </form>
                   <?php $call_sync_contact_url=site_url("native_api/sync_contact"); ?>
               </div>
           </div>
       </div>


   </div>
</div>



