
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card bg-analytics text-white">
            <div class="card-content">
                <div class="card-body text-center">
                    <img src="/new_ui/app-assets/images/elements/decore-left.png" class="img-left" alt="
            card-img-left">
                    <img src="/new_ui/app-assets/images/elements/decore-right.png" class="img-right" alt="
            card-img-right">
                    <div class="avatar avatar-xl bg-primary shadow mt-0">
                        <div class="avatar-content">
                            <i class="feather icon-award white font-large-1"></i>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="mb-2 text-white">Welcome <?php echo $this->session->userdata('username'); ?> to Pockitz</h1>
                        <p class="m-auto w-75">Watch the training videos to get started.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<h2 class="text-center h1 mb-3">Imported Youtube Channels</h2>

<?php
    if (!empty($channel_list_info)):
        foreach ($channel_list_info as $value):
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="h2 text-capitalize"><i class="feather icon-circle text-warning font-medium-5"></i> <?= $value['title'] ?></h3>
    <div class="d-flex justify-content-center flex-wrap">
        <button class="btn btn-danger btn-sm delete_channel mr-lg-2 mb-1" channel_table_id="<?php echo $value['id']; ?>">Delete Channel</button>
        <a href="<?php echo base_url("youtube_analytics/get_individual_channel_info") . "/" . $value['id']; ?>" target="_blank"
           class="btn btn-success btn-sm mr-lg-2 mb-1">Channel Analytics</a>
        <a href="<?php echo base_url("youtube_analytics/get_channel_video_list") . "/" . $value['id']; ?>" target="_blank"
           class="btn btn-success btn-sm mb-1">Channel's Videos</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header d-flex flex-column align-items-center justify-content-center pb-2">
                <div class="avatar bg-rgba-primary p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-users text-primary font-medium-5"></i>
                    </div>
                </div>
                <h2 class="text-bold-700 mt-1 mb-25"><?php echo custom_number_format($value['subscriber_count']); ?></h2>
                <p class="mb-0">Subscribers</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header d-flex flex-column align-items-center justify-content-center pb-2">
                <div class="avatar bg-rgba-warning p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-video text-warning font-medium-5"></i>
                    </div>
                </div>
                <h2 class="text-bold-700 mt-1 mb-25"><?php echo custom_number_format($value['video_count']); ?></h2>
                <p class="mb-0">Videos</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header d-flex flex-column align-items-center justify-content-center pb-2">
                <div class="avatar bg-rgba-warning p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-play text-warning font-medium-5"></i>
                    </div>
                </div>
                <h2 class="text-bold-700 mt-1 mb-25"><?php echo custom_number_format($value['view_count']); ?></h2>
                <p class="mb-0">Views</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header d-flex flex-column align-items-center justify-content-center pb-2">
                <div class="avatar bg-rgba-warning p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-mail text-warning font-medium-5"></i>
                    </div>
                </div>
                <h2 class="text-bold-700 mt-1 mb-25">Contact Support</h2>
                <a href="http://fpsupportdesk.com" class="btn btn-primary btn-sm mb-0">Support Desk</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php else: ?>
    <h4 class="h3 text-center">No Data to show</h4>
        <a href="<?= site_url("youtube_analytics/index") ?>"><img src='/assets/images/google.png'></a>
<?php endif; ?>


<script>
	$j("document").ready(function(){
		var base_url = "<?php echo base_url(); ?>";

		$(".delete_channel").click(function(){
            var result = confirm("Do you want to delete this channel from your database ?");
            if(result)
            {
                var channel_table_id = $(this).attr('channel_table_id');

                $.ajax
                ({
                   type:'POST',
                   async:false,
                   url:base_url+'youtube_analytics/channel_delete_result',
                   data:{channel_table_id:channel_table_id},
                   success:function(response)
                    {
                        if(response == 'success')
	                        location.reload();
                    	if(response == 'error')
                    		alert('Something went wrong, please try again.');
                    }
                       
                });
            }
        });
	});
</script>
