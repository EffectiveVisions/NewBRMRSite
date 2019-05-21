<div id="tg-loginsingup" class="tg-loginsingup" data-vide-bg="poster: <?php echo esc_url(efora_option('signImage')); ?>" data-vide-options="position: 0% 50%">
    <div class="tg-contentarea tg-themescrollbar">
        <div class="tg-scrollbar">
            <button type="button" class="close">x</button>
            <div class="tg-logincontent">
                <nav id="tg-loginnav" class="tg-loginnav">
                    <ul>
                        <?php if ( has_nav_menu( 'registration-menu' ) ) {
                            wp_nav_menu(array('theme_location' => 'registration-menu', 'container' => '', 'depth' => 0, 'items_wrap' => '%3$s'));
                        } ?>
                    </ul>
                </nav>
                <div class="tg-themetabs">
                    <ul class="tg-navtbs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" data-toggle="tab"><?php esc_attr_e('Already Registered','efora'); ?></a></li>
                        <li role="presentation"><a href="#profile" data-toggle="tab"><?php esc_attr_e('Sign Up','efora'); ?></a></li>
                    </ul>
                    <div class="tg-tabcontent tab-content">
                        <div role="tabpanel" class="tab-pane active fade in" id="home">
                            <form class="tg-formtheme tg-formlogin">
                                <fieldset>
                                    <!-- Response -->
                                    <div class="form-group alert alert-warning" style="display: none;">
                                        <p><?php esc_attr_e('Something went wrong! Try Again.','efora'); ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label><?php esc_attr_e('Username or Email Address','efora'); ?> <sup>*</sup></label>
                                        <input type="text" name="username" class="form-control username">
                                    </div>
                                    <div class="form-group">
                                        <label><?php esc_attr_e('Password','efora'); ?> <sup>*</sup></label>
                                        <input type="password" name="password" class="form-control password">
                                    </div>
                                    <div class="form-group">
                                        <div class="tg-checkbox">
                                            <input type="checkbox" name="remember" id="rememberpass">
                                            <label for="rememberpass"><?php esc_attr_e('Remember Me','efora'); ?></label>
                                        </div>
                                        <span><a href="<?php echo wp_lostpassword_url(); ?>"><?php esc_attr_e('Lost your password?','efora'); ?></a></span>
                                    </div>
                                    <input type="hidden" class="admin_ajax" value="<?php echo admin_url( 'admin-ajax.php' ) ?>" />
                                    <button type="submit" class="tg-btn tg-btn-lg login-hit"><span><?php esc_attr_e('Log In','efora'); ?></span></button>
                                </fieldset>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="profile">
                            <?php if( get_option('users_can_register') ){ ?>
                                <form class="tg-formtheme tg-formlogin tg-reg">
                                    <fieldset>
                                        <!-- Response -->
                                        <div class="form-group alert alert-warning" style="display: none;">
                                            <p><?php esc_attr_e('Username or email already exists.','efora'); ?></p>
                                        </div>
                                        <div class="form-group alert alert-success" style="display: none;">
                                            <p><?php esc_attr_e('Registration complete. Please check your email.','efora'); ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label><?php esc_attr_e('Username','efora'); ?> <sup>*</sup></label>
                                            <input type="text" name="username" class="form-control uname">
                                        </div>
                                        <div class="form-group">
                                            <label><?php esc_attr_e('Email Address','efora'); ?> <sup>*</sup></label>
                                            <input type="email" name="email" class="form-control uemail">
                                        </div>
                                        <div class="form-group">
                                            <a href="<?php echo wp_lostpassword_url(); ?>"><?php esc_attr_e('Lost your password?','efora'); ?></a>
                                        </div>
                                        <input type="hidden" class="admin_ajax" value="<?php echo admin_url( 'admin-ajax.php' ) ?>" />
                                        <button type="submit" class="tg-btn tg-btn-lg register-hit"><span><?php esc_attr_e('Register','efora'); ?></span></button>
                                    </fieldset>
                                </form>
                            <?php } else{ ?>
                                <div class="alert alert-warning">
                                    <p><?php esc_attr_e('User registration is disabled for now. Contact site administrator.','efora'); ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php $facebookLogin = efora_option('facebookLogin');
                $twitterLogin = efora_option('twitterLogin');
                $googleLogin = efora_option('googleLogin');
                if(empty($facebookLogin) && empty($twitterLogin) && empty($googleLogin) ){
                    // Do Nothing
                } else{ ?>
                <div class="tg-shareor"><span><?php esc_attr_e('or','efora'); ?></span></div>
                <div class="tg-signupwith">
                    <h2><?php esc_attr_e('Sign in With...','efora'); ?></h2>
                    <ul class="tg-sharesocialicon">
                        <?php if(!empty($facebookLogin)){ ?>
                        <li class="tg-facebook">
                            <?php echo do_shortcode(efora_option('facebookLogin')); ?>
                        </li>
                        <?php } if(!empty($twitterLogin)){ ?>
                        <li class="tg-twitter">
                            <?php echo do_shortcode(efora_option('twitterLogin')); ?>
                        </li>
                        <?php } if(!empty($googleLogin)){ ?>
                        <li class="tg-googleplus">
                            <?php echo do_shortcode(efora_option('googleLogin')); ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>