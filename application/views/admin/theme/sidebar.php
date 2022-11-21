<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="<?= base_url() ?>">
                    <!--                    <div class="brand-logo"></div>-->
                    <img style="height:45px !important" src="<?php echo base_url(); ?>assets/images/logo.png"
                         alt="<?php echo $this->config->item('product_name'); ?>" class="img-responsive">
                </a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <?php if ($this->session->userdata('user_type') == 'Admin') : ?>
                <li class=" nav-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i><span
                                class="menu-title"
                                data-i18n="Dashboard"><?php echo $this->lang->line("Administration"); ?></span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo site_url(); ?>admin_config/configuration"><i
                                        class="feather icon-circle"></i><span class="menu-item"
                                                                              data-i18n="Analytics"><?php echo $this->lang->line("General Settings"); ?></span></a>
                        </li>
                        <li><a href="<?php echo site_url() . "admin_config_email/index"; ?>"><i
                                        class="feather icon-circle"></i><span class="menu-item"
                                                                              data-i18n="eCommerce"><?php echo $this->lang->line("Email Settings"); ?></span></a>
                        </li>
                        <li><a href="<?php echo site_url() . "config/index"; ?>"><i
                                        class="feather icon-circle"></i><span class="menu-item"
                                                                              data-i18n="eCommerce"><?php echo $this->lang->line("connectivity settings"); ?></span></a>
                        </li>
                        <li><a href="<?php echo site_url() . "admin_config_youtube/youtube_config"; ?>"><i
                                        class="feather icon-circle"></i><span class="menu-item"
                                                                              data-i18n="eCommerce"><?php echo $this->lang->line("youtube settings"); ?></span></a>
                        </li>
                        <li><a href="<?php echo site_url(); ?>page-creator"><i
                                    class="feather icon-circle"></i><span class="menu-item"
                                                                          data-i18n="Analytics"><?php echo $this->lang->line("Page Creator"); ?></span></a>
                        </li>
                        <?php
                        $license_type = $this->session->userdata('license_type');
                        if ($license_type == 'double'): ?>
                            <li><a href="<?php echo site_url() . "admin/user_management"; ?>"><i
                                            class="feather icon-circle"></i><span class="menu-item"
                                                                                  data-i18n="eCommerce"><?php echo $this->lang->line("User Management"); ?></span></a>
                            </li>
                            <li><a href="<?php echo site_url() . "admin/notify_members"; ?>"><i
                                            class="feather icon-circle"></i><span class="menu-item"
                                                                                  data-i18n="eCommerce"><?php echo $this->lang->line("Send Notification"); ?></span></a>
                            </li>
                            <li><a href="<?php echo site_url() . "payment/payment_dashboard_admin"; ?>"><i
                                            class="feather icon-circle"></i><span class="menu-item"
                                                                                  data-i18n="eCommerce">Payment <?php echo $this->lang->line("Dashboard"); ?></span></a>
                            </li>
                            <li><a href="<?php echo site_url() . "payment/payment_setting_admin"; ?>"><i
                                            class="feather icon-circle"></i><span class="menu-item"
                                                                                  data-i18n="eCommerce"><?php echo $this->lang->line("Payment Settings"); ?></span></a>
                            </li>
                            <li><a href="<?php echo site_url() . "payment/package_settings"; ?>"><i
                                            class="feather icon-circle"></i><span class="menu-item"
                                                                                  data-i18n="eCommerce"><?php echo $this->lang->line("Package Settings"); ?></span></a>
                            </li>
                            <li><a href="<?php echo site_url() . "payment/admin_payment_history"; ?>"><i
                                            class="feather icon-circle"></i><span class="menu-item"
                                                                                  data-i18n="eCommerce"><?php echo $this->lang->line("Payment History"); ?></span></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <li class=" nav-item"><a href="#"><i class="feather icon-search"></i><span class="menu-title"
                                                                                       data-i18n="Ecommerce">Search</span></a>
                <ul class="menu-content">
                    <?php if ($this->session->userdata("user_type") == "Admin" || in_array(26, $this->module_access)) : ?>
                        <li><a href="<?php echo site_url() . "video_search_engine/youtube"; ?>"><i
                                        class="feather icon-circle"></i><span class="menu-item"
                                                                              data-i18n="Shop"><?php echo $this->lang->line("Video Search Engine"); ?></span></a>
                        </li>
                    <?php endif; ?>

                    <?php if ($this->session->userdata("user_type") == "Admin" || in_array(62, $this->module_access)) : ?>
                        <li><a href="<?php echo site_url() . "channel_search_engine/youtube"; ?>"><i
                                        class="feather icon-circle"></i><span class="menu-item"
                                                                              data-i18n="Shop"><?php echo $this->lang->line("Channel Search Engine"); ?></span></a>
                        </li>
                    <?php endif; ?>

                    <?php if ($this->session->userdata("user_type") == "Admin" || in_array(63, $this->module_access)) : ?>
                        <li><a href="<?php echo site_url() . "playlist_search_engine/youtube"; ?>"><i
                                        class="feather icon-circle"></i><span class="menu-item"
                                                                              data-i18n="Shop"><?php echo $this->lang->line("Playlist Search Engine"); ?></span></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li> <!-- END SEARCH -->

            <li class=" nav-item"><a href="#"><i class="feather icon-upload-cloud"></i><span class="menu-title"
                                                                                             data-i18n="Ecommerce">Import</span></a>
                <ul class="menu-content">
                    <?php if ($this->session->userdata('user_type') == 'Admin' || in_array(33, $this->module_access)): ?>
                        <li><a href="<?php echo site_url() . "youtube_analytics/index"; ?>"><i
                                        class="feather icon-circle"></i><span class="menu-item"
                                                                              data-i18n="Shop"><?php echo $this->lang->line("Import Channel & Video"); ?></span></a>
                        </li>
                        <li><a href="<?php echo site_url() . "youtube_analytics/get_channel_list"; ?>"><i
                                        class="feather icon-circle"></i><span class="menu-item"
                                                                              data-i18n="Shop"><?php echo $this->lang->line("Channel Analytics"); ?></span></a>
                        </li>
                        <li><a href="<?php echo site_url() . "youtube_analytics/get_all_video_list"; ?>"><i
                                        class="feather icon-circle"></i><span class="menu-item"
                                                                              data-i18n="Shop"><?php echo $this->lang->line("Video Analytics"); ?></span></a>
                        </li>
                    <?php endif; ?>
                </ul>

            </li> <!-- END IMPORT -->

            <li class=" nav-item"><a href="#"><i class="feather icon-sliders"></i><span class="menu-title"
                                                                                        data-i18n="Ecommerce">Automation</span></a>
                <ul class="menu-content">
                    <?php if ($this->session->userdata('user_type') == 'Admin' || in_array(39, $this->module_access)): ?>
                        <li><a href="<?php echo site_url() . "youtube_live_event/uploaded_video_list"; ?>"><i
                                        class="feather icon-circle"></i><span class="menu-item"
                                                                              data-i18n="Shop"><?php echo $this->lang->line("Scheduled Video Uploader"); ?></span></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li> <!-- END AUTOMATION -->

            <li class=" nav-item"><a href="/thumbnail-creator"><i class="feather icon-edit"></i><span class="menu-title"
                                                                                     data-i18n="Ecommerce">Thumbnail Creator</span></a>
                <ul class="menu-content">
                    <li><a href="/thumbnail-creator"><i
                                class="feather icon-circle"></i><span class="menu-item"
                                                                      data-i18n="Shop">Create New Thumbnail</span></a>
                    </li>
                    <li><a href="http://studio.youtube.com"><i
                                class="feather icon-circle"></i><span class="menu-item"
                                                                      data-i18n="Shop">Upload to YouTube</span></a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="feather icon-zap"></i><span class="menu-title"
                                                                                        data-i18n="Ecommerce">Rank Videos</span></a>
                <ul class="menu-content">
                    <?php if($this->session->userdata('user_type') == 'Admin' || in_array(34,$this->module_access)): ?>
                        <li><a href="<?php echo site_url() . "youtube_marketer/tag_scraper"; ?>"><i
                                    class="feather icon-circle"></i><span class="menu-item"
                                                                          data-i18n="Shop"><?php echo $this->lang->line("Keyword Scraper"); ?></span></a>
                        </li>
                    <?php endif; ?>

                    <?php if($this->session->userdata('user_type') == 'Admin' || in_array(34,$this->module_access)): ?>
                        <li><a href="<?php echo site_url() . "youtube_marketer/auto_suggestion"; ?>"><i
                                    class="feather icon-circle"></i><span class="menu-item"
                                                                          data-i18n="Shop"><?php echo $this->lang->line("Keyword Suggestion"); ?></span></a>
                        </li>
                    <?php endif; ?>

                    <?php if($this->session->userdata('user_type') == 'Admin' || in_array(34,$this->module_access)): ?>
                        <li><a href="<?php echo site_url() . "youtube_live_event/index"; ?>"><i
                                    class="feather icon-circle"></i><span class="menu-item"
                                                                          data-i18n="Shop"><?php echo $this->lang->line("Live Event"); ?></span></a>
                        </li>
                    <?php endif; ?>

                    <?php if($this->session->userdata('user_type') == 'Admin' || in_array(27,$this->module_access)): ?>
                        <li class=" nav-item"><a href="#"><i class="feather icon-circle"></i><span class="menu-title"
                                                                                                data-i18n="Ecommerce"><?php echo $this->lang->line("Video Rank Tracking"); ?></span></a>
                            <ul class="menu-content">
                                <li><a href="<?php echo site_url() . "video_position_tracking/index"; ?>"><i
                                            class="feather icon-circle"></i><span class="menu-item"
                                                                                  data-i18n="Shop"><?php echo $this->lang->line("Settings"); ?></span></a>
                                </li>
                                <li><a href="<?php echo site_url() . "video_position_tracking/keyword_position_report"; ?>"><i
                                            class="feather icon-circle"></i><span class="menu-item"
                                                                                  data-i18n="Shop"><?php echo $this->lang->line("Report"); ?></span></a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if($this->session->userdata('user_type') == 'Admin' || in_array(36,$this->module_access)): ?>
                        <li><a href="<?php echo site_url() . "youtube_marketer/subscribe_plugin"; ?>"><i
                                    class="feather icon-circle"></i><span class="menu-item"
                                                                          data-i18n="Shop"><?php echo $this->lang->line("Get Subscribers"); ?></span></a>
                        </li>
                    <?php endif; ?>

                </ul>
            </li> <!-- END RAN VIDEOS -->
            <?php
                $CI =& get_instance();
                $CI->load->model('page');
                $pages = $CI->page->published();
            ?>
            <?php foreach($pages as $page) : ?>
                <li class=" nav-item"><a href="/pages/<?= $page->slug ?>"><i class="feather icon-circle"></i><span class="menu-title"
                                                                                         data-i18n="Ecommerce"><?= $page->title ?></span></a>
                </li>
            <?php endforeach; ?>

            <?php if ($this->session->userdata('user_type') == 'Member') : ?>
                <li><a href="<?php echo site_url() . "config/index"; ?>"><i
                            class="feather icon-circle"></i><span class="menu-item"
                                                                  data-i18n="eCommerce"><?php echo $this->lang->line("Connectivity Settings"); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('user_type') == 'Member'): ?>
                <li><a href="<?php echo site_url() . "payment/usage_history"; ?>"><i
                            class="feather icon-circle"></i><span class="menu-item"
                                                                  data-i18n="eCommerce"><?php echo $this->lang->line("usage log"); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if( $this->session->userdata('user_type') == 'Admin'): ?>
            <li class=" nav-item"><a href="#"><i class="feather icon-zap"></i><span class="menu-title"
                                                                                    data-i18n="Ecommerce"><?php echo $this->lang->line("Cron Job Settings"); ?></span></a>
                <ul class="menu-content">
                    <li><a href="<?php echo site_url()."native_api/index"; ?>"><i
                                class="feather icon-circle"></i><span class="menu-item"
                                                                      data-i18n="eCommerce"><?php echo $this->lang->line("Generate API Key"); ?></span></a>
                    </li>
                    <li><a href="<?php echo site_url('cron_job/index'); ?>"><i
                                class="feather icon-circle"></i><span class="menu-item"
                                                                      data-i18n="eCommerce"><?php echo $this->lang->line("cron job commands"); ?></span></a>
                    </li>
                </ul>
            </li>

                <li><a href="<?php echo site_url('documentation'); ?>" target="_blank"><i
                            class="feather icon-circle"></i><span class="menu-item"
                                                                  data-i18n="eCommerce"><?php echo $this->lang->line("documentation"); ?></span></a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
