 <section class="section">
  <div class="section-header">
    <h1><i class="fas fa-tv"></i> <?php echo $page_title; ?></h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><?php echo $page_title; ?></div>
    </div>
  </div>

  <div class="section-body">
    <div class="row">
     
      <?php  if($this->session->userdata('user_type') == 'Admin' || in_array(12,$this->module_access)) : ?>
      <div class="col-lg-6 col-12">
        <div class="card card-large-icons">
          <div class="card-icon text-primary">
            <i class="fas fa-comment-dots"></i>
          </div>
          <div class="card-body">
            <h4><?php echo $this->lang->line("Auto Like/Comment Campaign"); ?></h4>
            <p><?php echo $this->lang->line(""); ?></p>
            <a href="<?php echo base_url("responder/auto_like_comment"); ?>" class="card-cta"><?php echo $this->lang->line("Actions"); ?> <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <?php endif; ?>  

      <?php  if($this->session->userdata('user_type') == 'Admin' || in_array(13,$this->module_access)) : ?>
      <div class="col-lg-6 col-12">
        <div class="card card-large-icons">
          <div class="card-icon text-primary">
            <i class="fas fa-user-check"></i>
          </div>
          <div class="card-body">
            <h4><?php echo $this->lang->line("Auto Subscription Campaign"); ?></h4>
            <p><?php echo $this->lang->line(""); ?></p>
            <a href="<?php echo base_url("responder/auto_channel_subscription"); ?>" class="card-cta"><?php echo $this->lang->line("Actions"); ?> <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <?php endif; ?>


      <div class="col-lg-4 col-12">
        <div class="card card-large-icons">
          <div class="card-icon text-primary">
            <i class="fas fa-video"></i>
          </div>
          <div class="card-body">
            <h4><?php echo $this->lang->line("Video Manager"); ?></h4>
            <p><?php echo $this->lang->line(""); ?></p>
            <a href="<?php echo base_url("social_accounts/video_manager"); ?>" class="card-cta"><?php echo $this->lang->line("Actions"); ?> <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>


      <?php  if($this->session->userdata('user_type') == 'Admin' || in_array(10,$this->module_access)) : ?>
      <div class="col-lg-4 col-12">
        <div class="card card-large-icons">
          <div class="card-icon text-primary">
            <i class="fas fa-list"></i>
          </div>
          <div class="card-body">
            <h4><?php echo $this->lang->line("Playlist Manager"); ?></h4>
            <p><?php echo $this->lang->line(""); ?></p>
            <a href="<?php echo base_url("social_accounts/playlist_manager"); ?>" class="card-cta"><?php echo $this->lang->line("Actions"); ?> <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <?php endif; ?>


      <?php  if($this->session->userdata('user_type') == 'Admin' || in_array(8,$this->module_access)) : ?>
      <div class="col-lg-4 col-12">
        <div class="card card-large-icons">
          <div class="card-icon text-primary">
            <i class="fas fa-cloud-upload-alt"></i>
          </div>
          <div class="card-body">
            <h4><?php echo $this->lang->line("Upload Video"); ?></h4>
            <p><?php echo $this->lang->line(""); ?></p>
            <a href="<?php echo base_url("social_accounts/upload_video_list"); ?>" class="card-cta"><?php echo $this->lang->line("Actions"); ?> <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <?php endif; ?>  

     

    </div>
  </div>
</section>

