<?php
/**
 * Template Name: FAQ
 * The template for displaying pages
 *
 * This is the template that displays all resortpro listings by default.
 * You can override this template by creating your own "my_theme/template/front-page.php" file
 *
 * @package    ResortPro
 * @since      v1.0
 */ ?>

 <?php 

    echo get_header();
     $page = get_page(get_the_ID());
     $img = get_the_post_thumbnail_url($page->ID,'full');
     $heading = get_the_title( $page->ID );

     $faq = get_field('faq',$page->ID);

     $faqlink = get_field('faq_link',$page->ID);

 ?>

<section class="heading faq-heading">
	<div class="img d-flex align-items-center justify-content-center banner-title-bg" style="background-image:url('<?php echo $img; ?>');">
		<h1 class="text-white font-weight-semi-bold mb-0"><?php echo $heading;?></h1>
	</div>
</section>


<section class="faqsdetail">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div id="accordion">
				 <?php $outercount = 0; foreach($faq as $faqdetail) { ?>
				   <div id="<?php echo str_replace(' ','',$faqdetail['faq_link']);?>">
				   <h2 class="text-blue font-weight-light-bold mt-5 pt-1"><?php echo $faqdetail['faq_heading']; ?></h2>
				 	<?php $innercount = 0; foreach($faqdetail['faqs'] as $faq) { ?>
				 	 <?php if($outercount == 0 && $innercount == 0){ ?>
					  <div class="card bg-transparent border-0 rounded-0 mt-md-5 mt-3">
					    <div class="card-header bg-transparent px-0 pt-0 border-0" id="headingOne">
					     
					      	
					        <button class="btn btn-link btn-block text-left px-0 text-black d-flex align-items-center" style="text-decoration: none;" data-toggle="collapse" data-target="#collapse<?php echo $outercount; ?><?php echo $innercount; ?>" aria-expanded="true" aria-controls="collapse<?php echo $outercount; ?><?php echo $innercount; ?>" >
					          <span class=" h6 mb-0 font-weight-semi-bold pr-3" style="white-space: normal;"><?php echo $faq['faq_question'] ?></span>
					          <i class="icon icon-drop-down-arrow ml-auto"></i>
					        </button>
					       
					    </div>

					    <div id="collapse<?php echo $outercount; ?><?php echo $innercount; ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
					      <div class="card-body px-0 pt-0 font-15 font-Nunito faq-text-color pb-1">
					         <?php echo $faq['faq_answer']  ?>
					      </div>
					    </div>
					  </div>
					 <?php }else{ ?>
					    <div class="card bg-transparent border-0 rounded-0 mt-md-5 mt-3">
					    <div class="card-header bg-transparent px-0 pt-0 border-0" id="headingOne">
					        <button class="btn btn-link btn-block text-left px-0 text-black d-flex align-items-center" style="text-decoration: none;" data-toggle="collapse" data-target="#collapse<?php echo $outercount; ?><?php echo $innercount; ?>" aria-expanded="false" aria-controls="collapse<?php echo $outercount; ?><?php echo $innercount; ?>">
					          <span class=" h6 mb-0 font-weight-semi-bold pr-3" style="white-space: normal;"><?php echo $faq['faq_question'] ?></span> 
					          <i class="icon icon-drop-down-arrow ml-auto"></i>
					        </button>
					    </div>

					    <div id="collapse<?php echo $outercount; ?><?php echo $innercount; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
					      <div class="card-body px-0 pt-0 font-15 font-Nunito faq-text-color pb-1">
					         <?php echo $faq['faq_answer']  ?>
					      </div>
					    </div>
					  </div>
					 <?php } ?>
				  <?php $innercount++;  } ?>
				   </div>
				  <?php $outercount++; } ?>
				</div>
		    </div>
			<div class="col-md-4 pl-md-5 d-none">
				<div class="w-100 p-4 bg-gray faq-right-sidebar mt-5 border rounded">
					<h6 class="font-weight-semi-bold text-black mb-4 pb-3">Frequently Asked Questions</h6>
	               <?php foreach($faqlink as $link){ ?>
	                 <div class="mb-3 pb-3 border-bottom sidebar-list-item active">
	                 	 <a class="linkbtn font-Nunito text-capitalize " id="<?php echo str_replace(' ','',$link['faq_link_text']);?>" href="javascript:void(0)"><?php echo $link['faq_link_text']; ?></a>
	                 </div>
	               <?php } ?>
	       		</div>
			</div>
		</div>
	</div>
</section>
<script>
	jQuery(document).ready(function(){
		var x = 0; jQuery("#Checkingin .card.bg-transparent").each(function(){ if(x > 0){ jQuery(this).find('.btn-link').addClass('collapsed'); } x++; });
		var y = 0; jQuery("#CheckingOut .card.bg-transparent").each(function(){ if(y >= 0){ jQuery(this).find('.btn-link').addClass('collapsed'); } y++; });
		var z = 0; jQuery("#Ourcompanypolicies .card.bg-transparent").each(function(){ if(z >= 0){ jQuery(this).find('.btn-link').addClass('collapsed'); } z++; });
		var a = 0; jQuery("#ASpecifichouse .card.bg-transparent").each(function(){ if(a >= 0){ jQuery(this).find('.btn-link').addClass('collapsed'); } a++; });
		var b = 0; jQuery("#Miscellaneous .card.bg-transparent").each(function(){ if(b >= 0){ jQuery(this).find('.btn-link').addClass('collapsed'); } b++; });
		  jQuery('.linkbtn').click(function(){
		  	var link = jQuery(this).attr('id');
		  	jQuery('html, body').animate({
              scrollTop: jQuery("#"+link).offset().top-150
           });
		  });

	})
</script>

<?php echo get_footer();?>


