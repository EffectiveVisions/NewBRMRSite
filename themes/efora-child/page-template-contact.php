<?php
/*
 * Template Name: Contact Page
 */
get_header();
$page = get_page(get_the_ID());
$img = get_the_post_thumbnail_url($page->ID,'full');
$address = get_post_custom_values('address',$page->ID); 
$email   = get_post_custom_values('email',$page->ID); 
$phone   = get_post_custom_values('phone',$page->ID);
$more_info_heading =  get_post_custom_values('more_info_heading',$page->ID);
$more_info_text    =  get_post_custom_values('more_info_text',$page->ID);
$facebook_link     =  get_post_custom_values('facebook',$page->ID);
$twitter_link      =  get_post_custom_values('twitter_link',$page->ID);
$youtube_link      =  get_post_custom_values('you_tube_link',$page->ID);
$google_plus_link  =  get_post_custom_values('google_plus_link',$page->ID);
?>
    <!--************************************
            Main Start
    *************************************-->

<section  class="heading mobile-font-15">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center mt-md-4 pt-4 mb-sm-3">
                <h2 class="font-weight-semi-bold text-color mb-1"><?php echo $page->post_title;?></h2>
            </div>            
        </div>
        <hr/>
        <div class="row">
            <div class="col-sm-12 text-center px-xl-5">
                <p class="text-light-dark font-18 px-xl-5 font-Nunito"><?php echo $page->post_content;?></p>
            </div>            
        </div>
   


         <div class="row text-center footer-contact contact-us-icons mt-md-5 mt-3 pt-md-2 pt-3">
             <div class="col-md-4 col-12 pb-md-0 pb-5">
                 <i class="icon icon-location-mark1  mb-md-3 mb-2 d-block"></i>
                 <h6 class="font-weight-semi-bold text-black mb-3">Address</h6>
                 <p class="font-weight-normal font-Nunito font-15 text-light-gray"><?php echo $address[0] ?></p>
             </div>
             <div class="col-md-4 col-12 pb-md-0 pb-5">
                <i class="icon icon-email-outline mb-md-3 mb-2 d-block "></i>
                <h6 class="font-weight-semi-bold text-black mb-3">Email</h6>
                <p class=" font-weight-normal font-Nunito font-15 mb-2">
                  <a class="text-light-gray" href="mailto:Info@BlueRidgeRentals.Com"><?php echo $email[0] ?></a>
                </p> 
                <ul class="socialshare list-inline">
                        <li class="list-inline-item mr-2"><a target="_blank" href="<?php echo $twitter_link[0]  ?>"><i class="icon icon-twitter socialshare-icon text-muted-cutome"></i></a></li>
                        <li class="list-inline-item mr-2"><a target="_blank" href="<?php echo $facebook_link[0] ?>"><i class="icon icon-facebook socialshare-icon text-muted-cutome"></i></a></li>
                        <li class="list-inline-item mr-2"><a target="_blank" href="<?php echo $youtube_link[0] ?>"><i class="icon icon-youtube socialshare-icon text-muted-cutome"></i></a></li>
                        <li class="list-inline-item"><a target="_blank" href="<?php echo $google_plus_link[0] ?>?url=<?php the_permalink();?>"><i class="icon icon-google-plus socialshare-icon text-muted-cutome"></i></a></li>
               </ul>          
             </div>
             <div class="col-md-4  col-12 pb-md-0 pb-5">
                <i class="icon icon-phone-outline mb-md-3 mb-2 d-block "></i>
                <h6 class="font-weight-semi-bold text-black mb-3">Phone</h6>
                <p class="font-weight-normal font-Nunito font-15"><a href="tel:(800) 237-7975" class="text-light-gray"><?php echo $phone[0] ?></a></p>     
             </div>
          </div>



    </div>
</section>

<section class="mt-md-5 mt-3 pt-lg-4 contact-page mobile-font-15">
   <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center px-xl-5">
                <h4 class="text-black font-22 font-weight-semi-bold mb-1"><?php echo $more_info_heading[0] ?></h4>
                <p class="text-black px-xl-5 font-18 font-Nunito text-light-dark mb-4 pb-md-3 pb-4"><?php echo $more_info_text[0] ?></p>
            </div>            
        </div>
    </div>
    <div id="contactus" class="container-fluid">
        <div class="row bg-white  contact-form-detail map shadow-none">
            <div ng-controller="PropertyController as pCtrl" class="col-md-6 px-0  left-side-map">
                 <iframe lazy-load datasrc="https://maps.google.com/maps?q=Blue%20Ridge%20Mountain%20Rentals&t=&z=15&ie=UTF8&iwloc=&output=embed" src="" width="360" height="600" frameborder="0" style="border:0"></iframe>
             </div>
             <div class="col-md-6 px-0 contact-form-home">
                  <div class="comment contact-form-detail  contactForm bg-light shadow-none p-lg-5 p-3 pt-md-3 pt-5">
                     <?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false): ?>
                          <div class="contact-form-home p-md-2">
                            <h6 class="font-weight-semi-bold mb-4 pb-1">Send a Message</h6>
                             <?php echo do_shortcode('[formidable id="12"]'); ?>
                          </div>
                  <?php endif; ?>
                  </div>
             </div>
        </div>
    </div>
</section>


    <!--************************************
            Main End
    *************************************-->
<?php get_footer(); ?>