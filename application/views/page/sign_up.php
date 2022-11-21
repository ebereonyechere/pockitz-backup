
  <link href="<?php echo site_url(); ?>sign_up_page_layout/css/custom.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>new_ui/app-assets/vendors/css/vendors.min.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>new_ui/app-assets/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>new_ui/app-assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>new_ui/app-assets/css/colors.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>new_ui/app-assets/css/components.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>new_ui/app-assets/css/themes/dark-layout.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>new_ui/app-assets/css/themes/semi-dark-layout.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>new_ui/app-assets/css/core/menu/menu-types/vertical-menu.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>new_ui/app-assets/css/core/colors/palette-gradient.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>new_ui/app-assets/css/pages/authentication.css" rel="stylesheet">

  <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body">
              <section class="row flexbox-container">
                  <div class="col-xl-8 col-10 d-flex justify-content-center">
                      <div class="card bg-authentication rounded-0 mb-0">
                          <div class="row m-0">
                              <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                  <img src="/new_ui/app-assets/images/pages/register.jpg" alt="branding logo">
                              </div>
                              <div class="col-lg-6 col-12 p-0">
                                  <div class="card rounded-0 mb-0 p-2">
                                      <div class="card-header pt-50 pb-1">
                                          <div class="card-title">
                                              <h4 class="mb-0"><?php echo $this->lang->line("sign up form");?></h4>
                                          </div>
                                      </div>
<!--                                      <p class="px-2">Fill the below form to create a new account.</p>-->
                                      <div class="card-content">
                                          <div class="card-body pt-0">
                                              <?php
                                              if($this->session->userdata('reg_success') == 1) {
                                                  echo "<div class='alert alert-success'>".$this->lang->line("an activation code has been sent to your email. please check your inbox to activate your account.")."</div>";
                                                  $this->session->unset_userdata('reg_success');
                                              }


                                              if($this->session->userdata('reg_success') == 'limit_exceed') {
                                                  echo "<div class='alert alert-danger'>".$this->lang->line("User limit exceeded for regular license. Please buy extended license for unlimited user management.")."</div>";
                                                  $this->session->unset_userdata('reg_success');
                                              }
                                              ?>
                                              <form method="post" action="<?php echo site_url('home/sign_up_action'); ?>">
                                                  <?php $package_id = $_GET['p'] ? $_GET['p'] : '1'; ?>
                                                  <input type="hidden" name="package_id" value="<?= $package_id ?>">
                                                  <div class="form-label-group">
                                                      <input type="text" class="form-control" value="<?php echo set_value('name');?>" id="name" name="name" placeholder="<?php echo $this->lang->line("name");?> *">
                                                      <label for="name"><?php echo $this->lang->line("name");?></label>
                                                      <span style="color:red;margin-top:5px;"><?php echo form_error('name'); ?></span>
                                                  </div>

                                                  <div class="form-label-group">
                                                      <input type="text" class="form-control" value="<?php echo set_value('mobile');?>" id="mobile" name="mobile" placeholder="<?php echo $this->lang->line("mobile");?>">
                                                      <label for="mobile"><?php echo $this->lang->line("mobile");?></label>
                                                      <span style="color:red;margin-top:5px;"><?php echo form_error('mobile'); ?></span>
                                                  </div>

                                                  <div class="form-label-group">
                                                      <input type="email" class="form-control" value="<?php echo set_value('email');?>" id="email" name="email" placeholder="<?php echo $this->lang->line("email");?> *">
                                                      <label for="email"><?php echo $this->lang->line("email");?></label>
                                                      <span style="color:red;margin-top:5px;"><?php echo form_error('email'); ?></span>
                                                  </div>

                                                  <div class="form-label-group">
                                                      <input type="password" class="form-control" value="<?php echo set_value('password');?>" name="password" id="password" placeholder="<?php echo $this->lang->line("password");?> *">
                                                      <label for="password"><?php echo $this->lang->line("password");?></label>
                                                      <span style="color:red;margin-top:5px;"><?php echo form_error('password'); ?></span>
                                                  </div>

                                                  <div class="form-label-group">
                                                      <input type="password" class="form-control" value="<?php echo set_value('confirm_password');?>" name="confirm_password" id="confirm_password" placeholder="<?php echo $this->lang->line("confirm password");?> *">
                                                      <label for="confirm_password">Confirm Password</label>
                                                      <span style="color:red;margin-top:5px;"><?php echo form_error('confirm_password'); ?></span>
                                                  </div>

<!--                                                  <div class="form-group row">-->
<!--                                                      <div class="col-12">-->
<!--                                                          <fieldset class="checkbox">-->
<!--                                                              <div class="vs-checkbox-con vs-checkbox-primary">-->
<!--                                                                  <input type="checkbox" checked>-->
<!--                                                                  <span class="vs-checkbox">-->
<!--                                                                        <span class="vs-checkbox--check">-->
<!--                                                                            <i class="vs-icon feather icon-check"></i>-->
<!--                                                                        </span>-->
<!--                                                                    </span>-->
<!--                                                                  <span class=""> I accept the terms & conditions.</span>-->
<!--                                                              </div>-->
<!--                                                          </fieldset>-->
<!--                                                      </div>-->
<!--                                                  </div>-->
<!--                                                  <a href="auth-login.html" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>-->
                                                  <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</button>
                                              </form>
                                          </div>
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

