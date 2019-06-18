<?php global $efora_allowedtags;
$class = get_body_class(); ?>
<!--************************************
            Header Start
    *************************************-->
<header ng-controller="PropertyController as pCtrl" id="tg-header" class="tg-header tg-haslayout">
    <div class="container-fluid">
        <div class="row">
            <div class="tg-topbar px-3">
                <nav class="tg-infonav">
                    <ul class="mb-0">

                        <?php $header_phone = get_field("header_phone_no","option");
                        if(!empty($header_phone)){ ?>
                        <li>
                            <a style="color:#fff;" href="tel:<?php echo get_field("header_phone_no","option"); ?>">
                                <i class="icon icon-ring  py-0 font-14"></i>
                                <span><?php echo get_field("header_phone_no","option"); ?>
                                </span>
                            </a>
                        </li>
                        <?php } $header_feature_txt = get_field("header_text","option");
                        if(!empty($header_feature_txt)){ ?>                        
                            <li class="d-lg-inline-block d-none">
                                <figure class="mb-0 float-left mr-2">
                                  <img lazy-load class="py-0 font-14" datasrc="/wp-content/uploads/2019/03/Map.png"/>
                                </figure>
                                
                                <span><?php echo get_field("header_text","option"); ?>  <a href="/search-results"><?php echo get_field("discover_more_text","option"); ?></a></span>
                            </li>                        
                        <?php } ?>
                    </ul>
                </nav>
                <div class="tg-addnavcartsearch row ml-0 d-flex align-items-center">
                    <?php if($class[1] != "page-template-template-boone" && $class[1] != "page-template-template-blowing-rock" && $class[1] != "page-template-template-valle-crucis" && $class[1] != "page-template-template-townof-seven-devils" && $class[1] != "page-template-template-eagles-nest"
                         && $class[1] != "page-template-template-banner-elk"
                       ) { ?>
                    <nav class="tg-addnav">
                        <ul class="mb-0">
                            <?php if ( has_nav_menu( 'top-bar-menu' ) ) {
                                    wp_nav_menu(array('theme_location' => 'top-bar-menu', 'container' => '', 'depth' => 0, 'items_wrap' => '%3$s'));
                            } ?>
                        </ul>
                    </nav>
                    <?php } else { ?>
                        <nav class="tg-socialsignin ml-auto mr-lg-0  mr-5 pr-lg-0 pr-sm-3 pr-sm-2">
                            <ul class="tg-socialicons d-flex flex-wrap align-items-center mb-0 py-0 pr-0">
                            <?php $facebook = get_field("facebook_link","option");
                                if(!empty($facebook)) { ?>
                                    <li class="list-inline-item nav-item header-contact d-none d-lg-inline-block"><a target="_blank" href="<?php echo get_field("facebook_link","option"); ?>"><i class="icon icon-facebook-outline text-white"></i></a></li>
                                <?php } $instagrame = get_field("instagram_link","option");
                                if(!empty($instagrame)){ ?>
                                    <li class="list-inline-item nav-item header-contact d-none d-lg-inline-block"><a target="_blank" href="<?php echo get_field("instagram_link","option"); ?>"><i class="icon icon-insta-outline text-white"></i></a></li>
                                <?php } $twitter = get_field("t","option");
                                if(!empty($twitter)){ ?>
                                    <li class="list-inline-item nav-item header-contact d-none d-lg-inline-block"><a target="_blank" href="<?php echo get_field("t","option"); ?>"><i class="icon icon-twitter-outline text-white"></i></a></li>
                            <?php } ?>
                            </ul>
                        </nav>
                    <?php } ?>
                    <nav class="tg-cartsearch  px-3">
                        <ul class="mb-0">
                            <?php $facebook = get_field("facebook_link","option");
                            if(!empty($facebook)){ ?>
                                <li class="list-inline-item nav-item header-contact  d-lg-none sociallink"><a target="_blank" href="<?php echo get_field("facebook_link","option"); ?>"><i class="icon icon-facebook-outline font-15 mr-2"></i></a></li>
                            <?php } $instagrame = get_field("instagram_link","option");
                            if(!empty($instagrame)){ ?>
                                <li class="list-inline-item nav-item header-contact  d-lg-none sociallink"><a target="_blank" href="<?php echo get_field("instagram_link","option"); ?>"><i class="icon icon-insta-outline font-15 mr-2"></i></a></li>
                            <?php } $twitter = get_field("t","option");
                            if(!empty($twitter)){ ?>
                                <li class="list-inline-item nav-item header-contact  d-lg-none sociallink"><a target="_blank" href="<?php echo get_field("t","option"); ?>"><i class="icon icon-twitter-outline font-15"></i></a></li>
                            <?php } ?>
                            <?php if(efora_option('topSearch') != 1){ ?>
                                <li class="pl-3 d-lg-inline-block d-none topMenuSearchBar">

                                    <div ng-controller='PlusMinusControler as pCtrl' class="input-group">
                                      <div class="input-group-text p-0 rounded-0">
                                        <span class="input-group-text border-0 cursor-pointer close-search-btn" id="basic-addon1"><i class="icon icon-search font-20"></i></span>
                                      <input id="searchbox" type="text" class="form-control pr-3 font-Nunito font-weight-normal" ng-model='area' 
                                      uib-typeahead='area as area.name for area in locations | filter:$viewValue:stateComparator' 
                                      typeahead-on-select='onSearchSelect(area.id)' typeahead-focus-first="true" placeholder="Search Location" aria-label="Search" aria-describedby="basic-addon1">
                                      </div>
                                    </div>

                                    <!--<a href="#tg-search" class="position-relative">
                                       <i class="icon icon-search py-0 font-18"></i>
                                    </a>-->
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="tg-navigationarea tg-headerfixed d-flex flex-wrap px-3 shadow">                 
                    <strong class="tg-logo my-auto">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php $default_logo = efora_option('default_logo');
                            if(!empty($default_logo)){ ?>
                                <img lazy-load datasrc="<?php echo esc_url(efora_option('default_logo')); ?>" src="<?php echo esc_url(efora_option('default_logo')); ?>" alt="<?php bloginfo('name'); ?>">
                            <?php } else{ ?>
                                <img lazy-load datasrc="<?php echo get_template_directory_uri(); ?>/images/logo.png"  alt="<?php bloginfo('name'); ?>">
                            <?php } ?>
                        </a>
                    </strong>               
                <div class="tg-socialsignin ml-auto mr-lg-0  mr-5 pr-lg-0 pr-sm-3 pr-2">
                    <ul class="tg-socialicons d-flex flex-wrap align-items-center mb-0 pr-0">
                        <?php if($class[1] != "page-template-template-boone" && $class[1] != "page-template-template-blowing-rock" && $class[1] != "page-template-template-valle-crucis" && $class[1] != "page-template-template-townof-seven-devils" && $class[1] != "page-template-template-eagles-nest" &&
                            $class[1] != "page-template-template-banner-elk" ) {
                            $facebook = get_field("facebook_link","option");
                            if(!empty($facebook)){ ?>
                                <li class="list-inline-item nav-item header-contact d-none d-lg-inline-block"><a target="_blank" href="<?php echo get_field("facebook_link","option"); ?>"><i class="icon icon-facebook-outline"></i></a></li>
                            <?php } $instagrame = get_field("instagram_link","option");
                            if(!empty($instagrame)){ ?>
                                <li class="list-inline-item nav-item header-contact d-none d-lg-inline-block"><a target="_blank" href="<?php echo get_field("instagram_link","option"); ?>"><i class="icon icon-insta-outline"></i></a></li>
                            <?php } $twitter = get_field("t","option");
                            if(!empty($twitter)){ ?>
                                <li class="list-inline-item nav-item header-contact d-none d-lg-inline-block"><a target="_blank" href="<?php echo get_field("t","option"); ?>"><i class="icon icon-twitter-outline"></i></a></li>
                            <?php } ?>
                        <?php } ?>
                        <li class="list-inline-item nav-item header-contact d-none d-lg-inline-block">
                             <a href="tel:1-800-237-7975"><div data-toggle="tooltip" data-placement="bottom" title="1-800-237-7975" class="callMe theme-bg-color text-center align-items-center d-flex justify-content-center">
                                 <i class="icon icon-phone text-white font-20"></i>
                                
                             </div></a>

                        </li>
                        <li class="list-inline-item nav-item d-none d-lg-inline-block mr-0">
                             <button onclick="moveToSearch()" type="button" class="btn btn-primary position-relative header-animated-button rounded-0 border-0 gatewayBtn text-uppercase "><div class="position-relative gatewayBtn-under d-inline-block">Find your Getaway</div></button>
                        </li>
                         <li class="pl-sm-3 my-3 topMenuSearchBar d-lg-none ">

                              <div ng-controller='PlusMinusControler as pCtrl' class="input-group">
                                      <div class="input-group-text p-0 rounded-0">
                                        <span class="input-group-text border-0 cursor-pointer close-search-btn" id="basic-addon1"><i class="icon icon-search font-20"></i></span>
                                      <input id="searchbox" type="text" class="form-control pr-3 font-Nunito font-weight-normal" ng-model='area' 
                                      uib-typeahead='area as area.name for area in locations | filter:$viewValue:stateComparator' 
                                      typeahead-on-select='onSearchSelect(area.id)' typeahead-focus-first="true" placeholder="Search Location" aria-label="Search" aria-describedby="basic-addon1">
                                      </div>
                            </div>
                           
                            <!--<a href="#tg-search" class="position-relative">
                               <i class="icon icon-search py-0 font-18"></i>
                            </a>-->
                        </li>
                    </ul>

                </div>
                <nav id="tg-nav" class="tg-nav">
                    <div class="navbar-header">
                        <a href="#menu" class="navbar-toggle collapsed">
                            <span class="sr-only"><?php esc_attr_e('Toggle navigation','efora'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                    </div>
                    <div id="tg-navigation" class="navbar-collapse tg-navigation">
                        <ul>
                            <?php if($class[1] != "page-template-template-boone" && $class[1] != "page-template-template-blowing-rock" && $class[1] != "page-template-template-valle-crucis" && $class[1] != "page-template-template-townof-seven-devils" && $class[1] != "page-template-template-eagles-nest"
                            && $class[1] != "page-template-template-banner-elk") : ?>
                                <?php if ( has_nav_menu( 'primary-menu' ) ) :
                                    wp_nav_menu( array( 'theme_location' => 'primary-menu','container' => '','depth' => 2,'items_wrap' => '%3$s','walker' => new efora_Menu_With_Description()) );
                                else:
                                    echo '<li><a>' . esc_html__( 'Define your primary menu.', 'efora' ) . '</a></li>';
                                endif; ?>
                            <?php else: ?>
                                <?php if ( has_nav_menu( 'community-menu' ) ) :
                                    wp_nav_menu( array( 'theme_location' => 'community-menu','container' => '','depth' => 2,'items_wrap' => '%3$s','walker' => new efora_Menu_With_Description()) );
                                else:
                                    echo '<li><a>' . esc_html__( 'Define your community menu.', 'efora' ) . '</a></li>';
                                endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<script>
function moveToSearch(){
    window.location.href = "/search-results"
}
jQuery(document).ready(function(){
  jQuery('[data-toggle="tooltip"]').tooltip(); 
});



</script>
<!--************************************
        Header End
*************************************-->