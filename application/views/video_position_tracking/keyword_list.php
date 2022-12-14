<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugins/grid/grid_themes/default/easyui.css">
<style>
    .datagrid .panel-body {
        height: auto !important;
        border: none !important;
    }
    .btn-warning, .btn-info {
        background-color: #EB5E5F !important;
    }
    .btn-primary {
        margin-right: 20px !important;
    }
    .panel-noscroll {
        height: auto !important;
    }
    #tb {
        display: flex !important;
        justify-content: center !important;
        padding-bottom: 20px !important;
    }
    #video_title {
        margin-right: 25px !important;
    }
</style>
<?php
	if($this->session->userdata('delete_success_message') == 1){

		echo "<div class='alert alert-success text-center'><h4 style='margin:0;'><i class='fa fa-check-circle'></i> ".$this->lang->line("your data has been successfully deleted from the database.")."</h4></div>";
		$this->session->unset_userdata('delete_success_message');
	}

	if($this->session->userdata('delete_error_message') == 1){
		echo "<div class='alert alert-success text-center'><h4 style='margin:0;'><i class='fa fa-check-circle'></i> ".$this->lang->line("your data has been failed to delete from the database.")."</h4></div>";
		$this->session->unset_userdata('delete_error_message');
	}

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"><?php echo $this->lang->line("youtube video tracking settings");?></h1>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="grid_container" style="width:100%; min-height:500px;">
                        <table
                                id="tt"
                                class="easyui-datagrid"
                                url="<?php echo base_url()."video_position_tracking/keyword_list_data"; ?>"

                                pagination="true"
                                rownumbers="true"
                                toolbar="#tb"
                                pageSize="15"
                                pageList="[5,10,15,20,50,100]"
                                fit= "true"
                                fitColumns= "true"
                                nowrap= "true"
                                view= "detailview"
                                idField="id"
                        >

                            <!-- url is the link to controller function to load grid data -->

                            <thead>
                            <tr>
                                <th field="id"  checkbox="true"></th>
                                <th field="keyword" sortable="true"><?php echo $this->lang->line("Keyword")?></th>
                                <th field="name" sortable="true"><?php echo $this->lang->line("name")?></th>
                                <th field="youtube_video_id" sortable="true"><?php echo $this->lang->line("video ID")?></th>
                                <th field="add_date" sortable="true"><?php echo $this->lang->line("Add Date")?></th>
                                <th field="play" formatter="play"><?php echo $this->lang->line("play")?></th>
                                <th field="view" formatter='action_column'><?php echo $this->lang->line("Actions")?></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div id="tb" style="padding:3px">

                        <a style="margin-bottom: 5px;" class="btn btn-warning"  title="<?php echo $this->lang->line("add"); ?>" href="<?php echo site_url('video_position_tracking/keyword_tracking_settings');?>">
                            <i class="fa fa-plus-circle"></i> <?php echo $this->lang->line("add"); ?>
                        </a><br/>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>

	var base_url="<?php echo site_url(); ?>"
    
    function action_column(value,row,index)
    {               
        var delete_url=base_url+'video_position_tracking/delete_keyword_action/'+row.id;
        
        var str=""; 
        var delete_permission= 1;
        

        if(delete_permission == 1)
        str=str+"&nbsp;&nbsp;&nbsp;&nbsp;<a style='cursor:pointer' onclick=\"return confirm('"+'<?php echo $this->lang->line("are you sure that you want to delete this record?"); ?>'+"')\" title='Delete' href='"+delete_url+"'>"+' <img src="<?php echo base_url("plugins/grocery_crud/themes/flexigrid/css/images/close.png");?>" alt="Delete">'+"</a>";
        
        return str;
    } 


    function play(value,row,index)
    {               
        var video_id=row.youtube_video_id;
        var video_embed_url="https://www.youtube.com/embed/"+video_id+"?rel=0&wmode=transparent&autoplay=1";
        var str='<center><a class="youtube" target="_BLANK" href="'+video_embed_url+'"><i class="fa fa-play-circle fa-2x"></i></a></center>';
        return str;
    }  

	
</script>


