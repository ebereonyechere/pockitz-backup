<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title"><i class="fa fa-th-list"></i> <?php echo $this->lang->line('youtube playlist search'); ?></h3>
			</div><!-- /.box-header -->
			<!-- form start -->
            <div class="card-content">
                <div class="card-body">
                    <form class="form-horizontal" method="POST">
                        <div class="row">
                            <?php
                            $btn_lang=$this->lang->line('search playlist');
                            $head_lang=$this->lang->line('keyword');
                            ?>
                            <div class="col-xl-4 col-md-6 col-12 mb-1">
                                <div class="form-group">
                                    <label class="control-label" ><?php echo $head_lang;?>
                                    </label>
                                        <input name="keyword" id="keyword" value="<?php echo set_value('keyword');?>" placeholder="<?php echo $this->lang->line('type any keyword');?>..."  class="form-control" type="text" required />
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 col-12 mb-1">
                                <div class="form-group">
                                    <label class="control-label" ><?php echo $this->lang->line('limit');?>
                                    </label>
                                        <?php include("application/views/video_search_engine/limit.php");?>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 col-12 mb-1">
                                <div class="form-group">
                                    <label class="control-label" ><?php echo $this->lang->line('channel ID');?>
                                    </label>
                                        <input id="channel_id" value="<?php echo $channel_id;?>" type="text" class="form-control" placeholder="<?php echo $this->lang->line("channel ID"); ?>" style="width:100%"/>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                <div class="form-group">
                                    <label class="control-label" ><?php echo $this->lang->line('published before');?>
                                    </label>
                                    <input id="publish_before" type="text" class="form-control datepicker" placeholder="<?php echo $this->lang->line("published before"); ?>" style="width:100%"/>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                <div class="form-group">
                                    <label class="control-label" ><?php echo $this->lang->line('published after');?>
                                    </label>
                                    <input id="publish_after" type="text" class="form-control datepicker" placeholder="<?php echo $this->lang->line("published after"); ?>" style="width:100%"/>
                                </div>
                            </div>

                        </div> <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <input name="submit" id="search" type="button" class="btn btn-primary btn-lg" value="<?php echo $btn_lang;?>"/>
                                    <input type="button" class="btn btn-default btn-lg" value="<?php echo $this->lang->line("cancel");?>" onclick='goBack("video_search_engine/youtube")'/>
                                </div>
                            </div>

                            <div class="col-xs-12 text-center" id="domain_success_msg"></div>
                            <div class="col-xs-12 text-center" id="progress_msg">
                                <b><span id="domain_progress_msg_text"></span></b><br/>
                            </div>

                            <div class='space'></div>
                            <div id="response" style="padding:10px"></div>


                        </div><!-- /.box-footer -->
                    </form>
                </div>
            </div>
		</div><!-- /.box-info -->
	</div>
</div>


<script type="text/javascript">		

		$j("document").ready(function(){
			$( ".datepicker" ).datepicker();
			if($('#channel_id').val()!="")
			$("#search").click();
		});

		$(document.body).on('click','#search',function(){
			var keyword = $("#keyword").val();
			var limit = $("#limit").val();				
			var latitude = $("#location_lat").val();
			var longitude = $("#location_long").val();				
			var publish_after = $("#publish_after").val();
			var publish_before = $("#publish_before").val();
			var order = "";	
			var channel_id = $("#channel_id").val();	
			var base_url="<?php echo base_url(); ?>";

			if(keyword == '' && channel_id=="")
			{
				alert("please enter keyword or enter channel ID");
				return false;
			}

			$("#response").html("");
			$("#search").attr("disabled","disabled");
			
			$("#domain_progress_msg_text").html('<?php echo $this->lang->line("please wait"); ?>');
								
			$("#domain_success_msg").html('<img class="center-block" src="'+base_url+'assets/pre-loader/custom_lg.gif" alt="Processing..."><br/>');
			$.ajax({
				url:base_url+'playlist_search_engine/youtube_action',
				type:'POST',
				data:{keyword:keyword,limit:limit,publish_before:publish_before,publish_after:publish_after,order:order,channel_id:channel_id},
				success:function(response){		

					$("#domain_progress_bar_con").hide();					
					$("#domain_progress_msg_text").html("");
					$("#domain_success_msg").html('');
					$("#response").html(response);
					$("#search").removeAttr("disabled");
				}

			});


		});
	</script>





