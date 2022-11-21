<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $this->config->item('product_name')." | ".$this->lang->line("login"); ?></title>    
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png"> 
    <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- Bootstrap 3.3.4 -->
<!--    <link href="--><?php //echo base_url();?><!--bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
    <!-- FontAwesome 4.3.0 -->
<!--    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
    <!-- Theme style -->
<!--    <link href="--><?php //echo base_url();?><!--css/AdminLTE.min.css" rel="stylesheet" type="text/css" />-->
    <!-- iCheck -->
      <link href="<?php echo base_url();?>plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="<?php echo base_url();?>new_ui/app-assets/vendors/css/vendors.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>new_ui/app-assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>new_ui/app-assets/css/bootstrap-extended.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>new_ui/app-assets/css/colors.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>new_ui/app-assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>new_ui/app-assets/css/themes/dark-layout.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>new_ui/app-assets/css/themes/semi-dark-layout.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>new_ui/app-assets/css/core/menu/menu-types/vertical-menu.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>new_ui/app-assets/css/core/colors/palette-gradient.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>new_ui/app-assets/css/pages/authentication.css" rel="stylesheet" type="text/css" />

     <?php 
    //if($this->config->item("language")=="arabic")
    if($this->is_rtl) 
    { ?>
      <style>
      input{text-align:right !important;}
      </style>
    <?php }
    ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

  <!-- BEGIN: Content-->
  <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body">
              <section class="row flexbox-container">
                  <div class="col-xl-8 col-11 d-flex justify-content-center">
                      <div class="card bg-authentication rounded-0 mb-0">
                          <div class="row m-0">
                              <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                  <img src="/new_ui/app-assets/images/pages/login.png" alt="branding logo">
                              </div>
                              <div class="col-lg-6 col-12 p-0">
                                  <div class="card rounded-0 mb-0 px-2">
                                      <div class="card-header pb-1">
                                          <div class="card-title">
                                              <div class="card-img d-flex justify-content-center"><a href="<?php echo site_url();?>"><img style="max-width: 50%" src="<?php echo base_url();?>assets/images/logo.png" alt="<?php echo $this->config->item('product_name');?>" class="img-responsive"></a></div>
                                              <?php if ($is_signup) : ?>
                                                <h4 class="mb-0 text-center">Your registration was successful.</h4>
                                              <?php endif; ?>
                                          </div>
                                      </div>
                                      <?php
                                      if($this->session->flashdata('login_msg')!='')
                                      {
                                          echo "<div class='alert alert-danger text-center'>";
                                          echo $this->session->flashdata('login_msg');
                                          echo "</div>";
                                      }
                                      if($this->session->flashdata('reset_success')!='')
                                      {
                                          echo "<div class='alert alert-success text-center'>";
                                          echo $this->session->flashdata('reset_success');
                                          echo "</div>";
                                      }
                                      if($this->session->userdata('reg_success') != ''){
                                          echo '<div class="alert alert-success text-center">'.$this->session->userdata("reg_success").'</div>';
                                          $this->session->unset_userdata('reg_success');
                                      }

                                      if($this->session->userdata('jzvoo_success') != ''){
                                          echo '<div class="alert alert-success text-center">'.$this->lang->line("your account has been created successfully. please login.").'</div>';
                                          $this->session->unset_userdata('jzvoo_success');
                                      }
                                      ?>
                                      <p class="px-2">Welcome back, please login to your account.</p>
                                      <div class="card-content">
                                          <div class="card-body pt-1">
                                              <form action="<?php echo site_url('home/login');?>" method="post">
                                                  <fieldset class="form-label-group form-group position-relative has-icon-left">

                                                      <input type="text" class="form-control" name="username" id="user-name" placeholder="<?php echo $this->lang->line("email"); ?>">
                                                      <div class="form-control-position">
                                                          <i class="feather icon-user"></i>
                                                      </div>
                                                      <label for="user-name"><?php echo $this->lang->line("email"); ?></label>
                                                      <span style="color:red"><?php echo form_error('username'); ?></span>

                                                  </fieldset>

                                                  <fieldset class="form-label-group position-relative has-icon-left">
                                                      <input type="password" name="password" class="form-control" id="user-password" placeholder="<?php echo $this->lang->line("password"); ?>">
                                                      <div class="form-control-position">
                                                          <i class="feather icon-lock"></i>
                                                      </div>
                                                      <label for="user-password"><?php echo $this->lang->line("password"); ?></label>
                                                      <span style="color:red"><?php echo form_error('password'); ?></span>
                                                  </fieldset>
                                                  <div class="form-group d-flex justify-content-between align-items-center">
                                                      <div class="text-right"><a href="<?php echo site_url();?>home/forgot_password" class="card-link"><?php echo $this->lang->line("forgot password?"); ?></a></div>
                                                  </div>
<!--                                                  <a href="auth-register.html" class="btn btn-outline-primary float-left btn-inline">Register</a>-->
                                                  <button type="submit" class="btn btn-primary float-right btn-inline"><?php echo $this->lang->line("login"); ?></button>
                                              </form>
                                          </div>
                                      </div>
                                      <div class="login-footer pb-5">
<!--                                          <div class="divider">-->
<!--                                              <div class="divider-text">OR</div>-->
<!--                                          </div>-->
<!--                                          <div class="footer-btn d-inline">-->
<!--                                              <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>-->
<!--                                              <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>-->
<!--                                              <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>-->
<!--                                              <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a>-->
<!--                                          </div>-->
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>

          </div>
      </div>
  </div>
  <!-- END: Content-->


    <!-- jQuery 2.1.4 -->
<!--    <script src="--><?php //echo base_url();?><!--plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>-->
    <!-- Bootstrap 3.3.2 JS -->
<!--    <script src="--><?php //echo base_url();?><!--bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->
    <!-- iCheck -->
<!--    <script src="--><?php //echo base_url();?><!--plugins/iCheck/icheck.min.js" type="text/javascript"></script>-->
    <script src="<?php echo base_url();?>new_ui/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>new_ui/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>new_ui/app-assets/js/core/app.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>new_ui/app-assets/js/scripts/components.js" type="text/javascript"></script>
    <script>
      // $(function () {
      //   $('input').iCheck({
      //     checkboxClass: 'icheckbox_square-blue',
      //     radioClass: 'iradio_square-blue',
      //     increaseArea: '20%' // optional
      //   });
      // });
    </script>
    <?php $this->load->view("include/fb_px"); ?> 
  </body>
</html>
