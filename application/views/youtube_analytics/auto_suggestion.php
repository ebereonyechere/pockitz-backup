<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?php echo $this->lang->line("Youtube Auto Keyword Suggestion"); ?></h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form enctype="multipart/form-data" method="post" class="form-inline" id="new_search_form" style="margin-top:60px margin-left:10px">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                            <div class="form-group">
                                <input id="keyword" type="text" style="width:100%;padding:5px;" placeholder="<?php echo $this->lang->line('Type any keyword/tag'); ?>">
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                            <div class="form-group">
                                <button type="button"  id="new_search_button" class="btn btn-info"><i class="fa fa-search"></i> <?php echo $this->lang->line("start searching"); ?></button>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <br/>

                    </form>
                </div>
            </div>
        </div>
	</div>
</div>


<script>	

$j("document").ready(function(){
		
		var base_url="<?php echo base_url(); ?>";
		
		$("#new_search_button").on('click',function(){
			$("#suggestion_download_div").html('');
			var keyword=$("#keyword").val();
			
			if(keyword==''){
				alert("<?php echo $this->lang->line("please enter any keyword"); ?>");
				return false;
			}			
			
			$("#success_msg").html('<img class="center-block" src="'+base_url+'assets/pre-loader/custom.gif" alt="Searching..."><br/>');
			$.ajax({
				url:base_url+'youtube_marketer/auto_suggestion_action',
				type:'POST',
				data:{keyword:keyword},
				success:function(response){					
					
					if(response=="0")
					{
						$("#success_msg").html("<h4><div class='alert alert-warning text-center'>Sorry, No suggestion found.</div></h4>");

					}

					else if (response == 'limit_cross')
					{
						var usage_log_link = "<?php echo site_url('payment/usage_history'); ?>";
						var limit_cross_error = "<h4><div class='alert alert-danger text-center'>sorry, your monthly limit is exceeded for this module. <a href='"+usage_log_link+"'>click here to see usage log</a></div></h4>";
						$("#success_msg").html(limit_cross_error);
					}

					else
					{
						$("#suggestion_download_div").html('<a href="<?php echo base_url()."download/youtube/suggestion_{$this->user_id}_{$this->download_id}.csv" ?>" target="_blank" class="btn btn-lg btn-warning"><i class="fa fa-cloud-download"></i> <b><?php echo $this->lang->line("Download Suggestion CSV"); ?></b></a>');					
						$("#success_msg").html(response);
					}
					
				}
				
			});
			
			
		});
		
	});
	
</script>


				

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 wow fadeInRight text-center">		  
			<div class="loginmodal-container">
	
				<div id="suggestion_download_div" style="display:inline">
	
				</div>
				                 
			</div>
		</div>						
	</div>
				
	<br/><br/>			
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1" id="success_msg"></div>     
	</div> 
	
