<?php $user = get_active_user(); ?>
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>">
                        <i data-feather="activity"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#settings">
                        <i data-feather="settings"></i>
                        <p>Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="settings">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo base_url("settings"); ?>">
                                    <span class="sub-item">General Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("menu"); ?>">
                                    <span class="sub-item">Menu Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("emailsettings/update_form/$user->id"); ?>">
                                    <span class="sub-item">Email Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("social"); ?>">
                                    <span class="sub-item">Social Media Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("seo_settings"); ?>">
                                    <span class="sub-item">SEO Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#website_settings">
                        <i data-feather="arrow-right"></i>
                        <p>Website Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="website_settings">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo base_url("feature_settings"); ?>">
                                    <span class="sub-item">Feature</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("watch_video_settings"); ?>">
                                    <span class="sub-item">Watch Video</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("counter_settings"); ?>">
                                    <span class="sub-item">Counter</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("screenshot_settings"); ?>">
                                    <span class="sub-item">Screenshot</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("testimonial_settings"); ?>">
                                    <span class="sub-item">Testimonial</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("members_settings"); ?>">
                                    <span class="sub-item">Subscribe</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("team_member_settings"); ?>">
                                    <span class="sub-item">Team Member</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("contact_settings"); ?>">
                                    <span class="sub-item">Contact</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#website_section">
                        <i data-feather="arrow-right"></i>
                        <p>Website Section</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="website_section">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo base_url("hero"); ?>">
                                    <span class="sub-item">Hero</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("features"); ?>">
                                    <span class="sub-item">Feature</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("watch_video"); ?>">
                                    <span class="sub-item">Watch Video</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("counter"); ?>">
                                    <span class="sub-item">Counter</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("screenshots_images"); ?>">
                                    <span class="sub-item">Screenshot</span>
                                </a>
                            </li>                          
                            <li>
                                <a href="<?php echo base_url("testimonials"); ?>">
                                    <span class="sub-item">Testimonial</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("client"); ?>">
                                    <span class="sub-item">Client</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("members"); ?>">
                                    <span class="sub-item">Subscriber</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("app_download"); ?>">
                                    <span class="sub-item">App Download</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("team_member"); ?>">
                                    <span class="sub-item">Team Member</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("messages"); ?>">
                                    <span class="sub-item">Messages</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>