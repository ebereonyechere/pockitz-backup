<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <span class="logo-lg"><b><img  style="height:45px !important" src="<?php echo base_url();?>assets/images/logo.png" alt="<?php echo $this->config->item('product_name');?>" class="img-responsive"></b></span>
                </div>
                <ul class="nav navbar-nav float-right">

                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600"><?php echo $this->session->userdata('username'); ?> <i class="fa fa-caret-down"></i></span></div>
                            <?php
                            $pro_pic=base_url().'assets/images/logo.png';
                            ?>
<!--                            <span><img class="round" src="--><?//= $pro_pic ?><!--"-->
<!--                                       alt="avatar" height="40" width="40"></span>-->
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                                                          href="<?php echo site_url('change_password/reset_password_form') ?>"><i
                                    class="feather icon-user"></i> <?php echo $this->lang->line("change password"); ?></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('home/logout') ?>"><i class="feather icon-power"></i>
                                <?php echo $this->lang->line("logout"); ?></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php $this->load->view('admin/theme/sidebar'); ?>