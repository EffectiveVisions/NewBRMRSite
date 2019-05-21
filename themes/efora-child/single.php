<?php
   /**
    * Template Name: Blog
    * The template for displaying pages
    *
    * This is the template that displays all resortpro listings by default.
    * You can override this template by creating your own "my_theme/template/front-page.php" file
    *
    * @package    ResortPro
    * @since      v1.0
    */ ?>
<?php echo get_header(); 
   $page = get_page(get_the_ID());
   $img = get_the_post_thumbnail_url($page->ID,'full');
   while(have_posts()) : the_post();
   ?>
<section class="heading blogheading-single position-relative bg-light">
   <div class="img d-flex align-items-center justify-content-center banner-title-bg">
    <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto col-12">
          <h1 class="text-black font-weight-semi-bold mb-0 z-index text-center"><?php the_title(); ?></h1>
      </div>
    </div>
    </div>
   </div>
</section>




<section class="trust-pilot  my-3 blogdetail pt-3">
   <div class="container pt-md-3">
      <div class="row">
         <div class="col-lg-8 col-12 mx-auto">
          <div class="blogsec pb-lg-5 pb-sm-4 pb-5">
            <div class="blogdetail pb-md-0 pb-3">
               <div class="bloginfo d-flex  align-items-center mb-lg-3 pb-lg-3 pb-4">
                      <figure class="bloginfo-img mb-0 mr-3 d-flex align-items-center justify-content-center overflow-h rounded-circle bg-light">
                         <?php echo get_avatar( get_the_author_meta( 'ID' ), 35 ); ?>
                       </figure>
                       <div class="bloginfo-contnet">
                          <span class="text-uppercase font-13 font-weight-light-bold" style="color: #959595;"><?php the_author(); ?></span>
                          <span class="text-blue icon icon-Minus mx-2 overflow-h d-inline-flex position-relative" style="width: 15px; top: 2px;"></span>
                          <span class="text-uppercase font-13 font-weight-light-bold" style="color: #959595;"><?php echo get_the_date('M j, Y'); ?></span>
                          <span class="text-blue icon icon-Minus mx-2 overflow-h d-sm-inline-flex position-relative d-none" style="width: 15px; top: 2px;"></span>
                          <div class="d-sm-inline-block d-block">
                          <span class="text-uppercase font-13 text-black font-weight-semi-bold">Category:</span>
                          <?php 
                             $post_id = get_the_ID(); 
                             $category_object = get_the_category($post_id);
                             $category_name = $category_object[0]->name;
                           ?>
                          <span class="text-uppercase font-13 font-weight-light-bold" style="color: #959595;"><?php echo $category_name; ?></span>
                          </div>
                      </div>
                  </div>
            </div>
            <div class="blogimage">
               <figure class="mb-0 blog-image overflow-h w-100"> 
                           <?php the_post_thumbnail(); ?>
               </figure>
            </div>
            <div class="blogdescription d-inline-block w-100">
               <div class="font-Nunito font-15 discipition mt-sm-5"><?php  echo the_content();?></div>
            </div>
           <!--  <div class="socialshare">
               <ul class="socialshare list-inline">
                  <li class="list-inline-item"><a href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&tw_p=tweetbutton&url=<?php the_permalink(); ?>&via=<?php bloginfo( 'name' ); ?>"><i class="icon icon-twitter-outline"></i></a></li>
                  <li class="list-inline-item"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"><i class="icon icon-facebook-outline"></i></a></li>
                  <li class="list-inline-item"><a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="fa fa-google-plus"></i></a></li>
                  <li class="list-inline-item"><a href=""><i class="fa fa-youtube-play"></i></a></li>
                  <li class="list-inline-item"><a href="javascript:;"><i class="icon icon-mail"></i></a></li>
               </ul>
            </div> -->

            <div class="socialshare social-share-blog d-flex align-items-center py-2 mt-4 mb-5">
              <ul class="socialshare mb-0">
              <li class="font-16 font-Nunito  list-inline-item mr-1">Share :</li>
              <li class="list-inline-item mr-4"><a data-toggle="tooltip" title="Facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"><i class="icon icon-facebook socialshare-icon"></i></a></li>
                  <li class="list-inline-item mr-4"><a data-toggle="tooltip" title="Twitter" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&tw_p=tweetbutton&url=<?php the_permalink(); ?>&via=<?php bloginfo( 'name' ); ?>"><i class="icon icon-twitter socialshare-icon"></i></a></li>
                  <li class="list-inline-item mr-4">
                    <a  class="float-left position-relative  w-15" style=" top: -4px;" data-toggle="tooltip" title="Google Plus" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>">

                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
                        <g>
                          <g id="google-plus">
                            <path d="M13.5,6.8v-2h-1.3v2h-2v1.3h2v2h1.3v-2h2V6.8H13.5z M8.5,9L7.7,8.5C7.5,8.3,7.2,8,7.2,7.6c0-0.5,0.3-0.9,0.7-1.1
                              c0.9-0.7,1.7-1.4,1.7-2.8c0-1.4-0.9-2.2-1.3-2.6h1.1l0.8-0.9H6.1C3.2,0.2,1.8,2,1.8,4c0,1.5,1.2,3.2,3.3,3.2h0.5
                              C5.5,7.4,5.3,7.7,5.3,8c0,0.7,0.3,0.9,0.6,1.3C5,9.4,3.3,9.6,2,10.4c-1.2,0.7-1.5,1.7-1.5,2.4c0,1.5,1.4,3,4.3,3
                              c3.6,0,5.3-2,5.3-3.9C10.1,10.5,9.4,9.8,8.5,9z M3.5,3c0-1.4,0.9-2.1,1.8-2.1c1.7,0,2.6,2.3,2.6,3.6c0,1.7-1.4,2-1.9,2
                              C4.3,6.6,3.5,4.5,3.5,3z M5.8,14.9c-2.2,0-3.6-1-3.6-2.4c0-1.4,1.3-1.9,1.7-2.1C4.8,10.1,6,10,6.2,10s0.3,0,0.5,0
                              c1.6,1.1,2.2,1.6,2.2,2.6C8.9,13.9,7.6,14.9,5.8,14.9z"/>
                          </g>
                        </g>
                      </svg>

                   
                    </a>
                  </li>
                  <li class="list-inline-item mr-4"><a target="_blank" href="https://www.youtube.com/user/blueridgerentals" data-toggle="tooltip" title="You tube" href=""><i class="icon icon-youtube socialshare-icon"></i></a></li>
                  <li class="list-inline-item"><a  href="mailto:info@blueridgerentals.com" data-toggle="tooltip" title="Email" href="javascript:;"><i class="icon icon-email1 socialshare-icon"></i></a></li>
               </ul>
            </div>

            <div id="contactsec" class="comment contact-form-detail blog-single contactForm bg-light shadow-none p-sm-5 p-3">
              <div class="contact-form-home p-md-2">
                <h6 class="font-weight-semi-bold mb-4 pb-1">Send a Message</h6>
                 <?php echo do_shortcode('[formidable id="12"]'); ?>
              </div>
            </div>
           </div>
         </div>
         <div class="col-lg-4 col-12 order-lg-2 order-3 d-none">
            <div class="search blogsearch-fun pl-lg-3">
               <div class="inner-div d-inline-block w-100 bg-gray py-3">
                  <h6 class="your-spot font-weight-light-bold text-light-dark text-capitalize pb-3 mb-3 px-3">Find your spot</h6>
                  <div class="px-3">
                     <?php if ( is_active_sidebar( 'blogsearch' ) ) { ?>
                     <?php dynamic_sidebar( 'blogsearch' ); ?>
                     <?php } ?>
                  </div>
               </div>
            </div>
            <div class="category pt-5 pl-lg-3">
               <div class="categorytitle">
                  <h6 class="text-uppercase text-color font-weight-light-bold mb-4">Category</h6>
               </div>
               <?php
                  $categories = get_categories(array(
                  'echo'             => 0,
                  'hide_empty'       => 0,
                  'hierarchical'     => 1,
                  'show_count'       => 0,
                  'depth'            => 0
                  )); 
                  
                  foreach ($categories as $cat) {
                  $cat_args = array(
                  'posts_per_page'    => -1,
                  'showposts'         => -1,
                  'post_status'       => 'publish',
                  'cat'               => $cat->cat_ID
                  );
                  $the_animals = new WP_Query($cat_args);
                  $animal_count = $the_animals->post_count;
                  $cat_image = get_field('category_image','category_'.$cat->term_id);
                  if($cat->cat_ID!=1){
                  ?>
               <div class="categorydetail px-4 d-flex align-items-center position-relative" style="background-image: url('<?php echo $cat_image['url']; ?>');">
                  <span class="categorydetail-name text-white font-14 font-weight-light-bold"><?php echo $cat->cat_name; ?></span>
                  <span class="count categorydetail-count text-white ml-auto font-14 font-weight-light-bold"><?php echo $animal_count; ?></span>
               </div>
               <?php } } ?>
            </div>
            <div class="recentpost pt-5 pl-lg-3">
               <div class="recenttitle">
                  <h6 class="text-uppercase text-color font-weight-light-bold mb-4 mt-md-3">Recent Post</h6>
               </div>
               <?php 
                  $args = array( 'posts_per_page' => 5, 'offset'=> 1 );
                     $myposts = get_posts( $args );
                     foreach ( $myposts as $post ) : setup_postdata( $post ); 
                         ?>
               <div class="recentdetail d-inline-block w-100 mb-3 pb-1">
                  <div class="d-flex">
                     <div class="img rounded-circle overflow-h">
                        <a href="<?php echo the_permalink() ?>" class="h-100 w-100">
                        <?php the_post_thumbnail(); ?>
                        </a>
                     </div>
                     <div class="detail ml-3">
                        <a href="<?php echo the_permalink() ?>">
                           <h4 class="font-15 text-color font-weight-bold text-truncate-2 categories-heading"><?php the_title(); ?></h4>
                        </a>
                        <h6 class="font-13 font-weight-light-bold categories-text text-uppercase text-truncate mb-0">
                           Category:
                           <?php 
                              $post_id = get_the_ID(); 
                              $category_object = get_the_category($post_id);
                              $category_name = $category_object[0]->name;
                              ?>
                           <?php echo $category_name; ?>
                        </h6>
                     </div>
                  </div>
               </div>
               <?php 
                  endforeach; 
                  wp_reset_postdata();
                  ?>
            </div>
            <div class="property mt-4 pt-2 pl-lg-3">
               <div class="container" ng-controller="PropertyController as pCtrl" ng-cloak>
                  <div class="row d-none">
                     <div class="col-12 py-sm-4 pt-4 pb-3 text-center">
                        <h2 class="text-white mb-0 f-property-heading">Featured Properties</h2>
                     </div>
                  </div>
                  <div class="row" ng-init="search.amenities_filter='129951';sortBy='default';availabilitySearch();">
                     <div ng-repeat="property in propertiesObj| orderBy: customSorting : sort | filter: priceRange | filter: amenityFilter | filter: amenityFilterOr | filter: bedroomFilter | filter: locationFilter | filter: neighborhoodFilter | filter: viewNameFilter | limitTo: 2" class="col-lg-12 col-sm-12 p-xl-3 px-md-2 px-3 pt-3  d-inline-flex mb-3 mb-md-0">
                        <div class="inner-div  d-inline-block w-100">
                           <div class="property-single bg-white">
                              <div ng-click="go(property.seo_page_name)" class="propertyImage w-100 d-inline-block position-relative">
                                 <img src="{[property.default_thumbnail_path]}" class="h-100 w-100 object-fit" alt="" />
                                 <div class="occupants bg-warning-sec p-2 ">
                                    <h6 class="font-12 font-weight-semi-bold text-color mb-0">Occupants, Max:<span class="occupants-counts"> {[property.max_occupants]} </span></h6>
                                 </div>
                              </div>
                              <div class="propertyDetail pt-3">
                                 <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                                    <h6  class="mb-0 text-dark f-600 pro-name-heading font-15 text-color font-weight-bold ">{[property.name]}</h6>
                                 </a>
                                 <!-- <ul class="list-unstyled detailsaboutproperty mt-2 mb-4 d-flex flex-md-wrap flex-sm-nowrap flex-wrap">
                                    <li class="list-inline-item mr-xl-4 mr-lg-0 mr-md-2 mr-sm-0 mr-2  d-flex flex-wrap align-items-center"><i class="icon icon-bed font-20 mb-xl-0"></i><span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text">{[property.bedrooms_number]} <?php _e( 'Beds', 'streamline-core' ) ?></span></li>
                                    <li class="list-inline-item mr-xl-4 mr-lg-0 mr-md-2 mr-sm-0 mr-2 d-flex flex-wrap align-items-center"><i class="icon icon-slumber font-20  mb-xl-0"></i><span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text">{[property.max_occupants]} <?php _e( 'Sleeps', 'streamline-core' ) ?></span></li>
                                    <li class="list-inline-item d-flex flex-wrap align-items-center"><i class="icon icon-shower font-20  mb-xl-0"></i><span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text">{[property.bathrooms_number]} <?php _e( 'Bathrooms', 'streamline-core' ) ?></span></li>
                                    </ul> -->
                                 <ul class="list-unstyled detailsaboutproperty  mb-0 d-flex flex-md-wrap flex-sm-nowrap flex-wrap">
                                    <li class="list-inline-item mr-xl-4 mr-lg-0 mr-md-2 mr-sm-0 mr-2  d-flex flex-wrap align-items-center"><span class="font-Nunito font-weight-bold font-13 text-gray-color">{[property.bedrooms_number]} <?php _e( 'Beds', 'streamline-core' ) ?></span></li>
                                    <li class="list-inline-item d-flex flex-wrap align-items-center"><span class="font-Nunito font-weight-bold font-13 text-gray-color">{[property.bathrooms_number]} <?php _e( 'Bathrooms', 'streamline-core' ) ?></span></li>
                                    <li class="list-inline-item mr-xl-4 mr-lg-0 mr-md-2 mr-sm-0 mr-2 d-flex flex-wrap align-items-center"><span class="font-Nunito font-weight-bold font-13 text-gray-color">{[property.max_occupants]} <?php _e( 'Sleeps', 'streamline-core' ) ?></span></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php endwhile; echo get_footer();?>