<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MaxxHolidays.com</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
	<!-- Animate.css -->
	<!-- <link rel="stylesheet" href="css/animate.css"> -->
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.default.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css'>
	<!-- Modernizr JS -->
	<script src="assets/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<style>
		#page {
			position: relative;
			z-index: 9;
		}

		#loading {
			display: block;
			position: fixed;
			top: 0;
			left: 0;
			z-index: 99999999999;
			width: 100%;
			height: 100%;
			background: #2d024f;
		}
	</style>
</head>

<body>
	<div id="loading">
		<div class="page-loader"></div>
	</div>
	<div id="page">
		<?php include_once('main_menu.php'); ?>
      <?php
         $arr = array();
         
         if(isset($itinerary_details[0]['slider_details'])){
            $arr = json_decode($itinerary_details[0]['slider_details'],true);
         }
      ?>
      <div id="ajaxmsg" style="display: none;"></div>
		<div id="colorlib-page" class="float-left w-100">
			<header class="home-header header-other-page w-100 float-left inner-header" style="background: url(<?php echo base_url('assets/content/'.$itinerary_details[0]['image_name']);?>);">
				<div class="w-100 float-left inner-header-bg-two">
				<div class="container position-relative">
					<div class="w-100 logo-others text-center mt-2">
						
					</div>
					<div class="w-100 float-left text-center page-title-inner-pages iti-margin">
						<h2><?php echo $itinerary_details[0]['tag_name'];?></h2>
					</div>
				</div>
			</div>
			</header>
			<section class="w-100 float-left wrap-signup pt-3 pb-5">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8 col-md-12 col-12 float-left iti-left mt-3">
                        <div class="w-100 float-left wrap-iti">
                           <div class="w-100 float-left tour-shot-des">
                              <h1 id="pcost"><i class="fas fa-rupee-sign mr-1"></i> <?php echo isset($arr['cost']) ? $arr['cost'] : '';?></h1>
                           </div>
                           <div class="col-12 col-md-6 col-lg-6 float-left tour-shot-des"><i
                              class="fas fa-qrcode"></i>
                              Tour Code :<?php echo isset($arr['code']) ? $arr['code'] : '';?>
                           </div>
                           <div class="col-12 col-md-6 col-lg-6 float-left tour-shot-des"><i
                              class="fas fa-umbrella"></i>
                              Package Type : <?php echo isset($arr['type']) ? $arr['type'] : '';?>
                           </div>
                           <div class="col-12 col-md-6 col-lg-6 float-left tour-shot-des"><i
                              class="far fa-clock"></i>
                              <?php echo isset($arr['duration']) ? $arr['duration'] : '';?>
                           </div>
                           
                           <div class="col-12 col-md-6 col-lg-6 float-left tour-shot-des"><i
                              class="fas fa-calendar-alt"></i> Now - <?php echo isset($arr['date']) ? $arr['date'] : '';?></div>
                           <div class="col-12 col-md-6 col-lg-6 float-left tour-shot-des">
                           <i class="fas fa-map-marker-alt"></i> 
                              <?php
                                 if(isset($itinerary_details[0]['slider_name'])) echo $itinerary_details[0]['slider_name']; 
                              ?>
                           </div>
                        </div>
                        <div class="w-100 float-left nav-iti" id="naviti">
                           <ul>
                              <li><a href="#section1">Details</a></li>
                              <li><a href="#section2">Itinerary</a></li>
                              <li><a href="#section3">Map</a></li>
                              <li><a href="#section4">Photos</a></li>
                           </ul>
                        </div>
                        <!--------------- CONTENT FROM EDITOR ---------------->
                        <!-- <div class="wrap-detais-iti w-100 float-left mt-5" id="section1">
                           <h4>Tour Details</h4>
                           <p>A family day out to have fun and create unforgettable memories at Damnoen Saduak
                              Floating Market, here you can see one of Thailand’s unique floating markets from
                              which the traders sell all types of produce on small boats along the river such as
                              fruits, local foods, vegetables, and you can enjoy taking a boat trip to see
                              traditional Thai houses, also along the boat trip you can see the orchards that grow
                              several different kinds of fruit and vegetables for example bananas, rose apples,
                              papayas, guava, coconut etc.
                              <br><br>
                              There are more than 200 small canals that were originally dug by local people to
                              connect with each other and to share water and irrigate their land. In the
                              afternoon, Lets have fun with a lovely show of clever elephants and the heart
                              stopping danger of the Crocodile show at Samphran Elephant Ground and Zoo.
                           </p>
                           <div class="w-100 float-left wrap-sections-iti">
                              <div class="col-lg-5 col-md-12 col-12 float-left left-iti-title">
                                 <h3>Price Includes</h3>
                              </div>
                              <div class="col-lg-7 col-md-12 col-12 float-left right-content-iti">
                                 <span><i class="far fa-check-circle"></i>Meals mentioned in the program</span>
                                 <span><i class="far fa-check-circle"></i>Entrance Fees</span>
                                 <span><i class="far fa-check-circle"></i>English Speaking Guide</span>
                                 <span><i class="far fa-check-circle"></i>All transportation to destination
                                 location</span>
                                 <span><i class="far fa-check-circle"></i>Hotel transfer</span>
                                 <span><i class="far fa-check-circle"></i>Insurance</span>
                                 <span><i class="far fa-check-circle"></i>Snorkeling equipment</span>
                              </div>
                           </div>
                           <div class="w-100 float-left wrap-sections-iti">
                              <div class="col-lg-5 col-md-12 col-12 float-left left-iti-title">
                                 <h3>Price Excludes</h3>
                              </div>
                              <div class="col-lg-7 col-md-12 col-12 float-left right-content-iti">
                                 <span><i class="far fa-times-circle"></i>Meals mentioned in the program</span>
                                 <span><i class="far fa-times-circle"></i>Entrance Fees</span>
                                 <span><i class="far fa-times-circle"></i>English Speaking Guide</span>
                                 <span><i class="far fa-times-circle"></i>All transportation to destination
                                 location</span>
                                 <span><i class="far fa-times-circle"></i>Hotel transfer</span>
                                 <span><i class="far fa-times-circle"></i>Insurance</span>
                                 <span><i class="far fa-times-circle"></i>Snorkeling equipment</span>
                              </div>
                           </div>
                           <div class="w-100 float-left wrap-sections-iti">
                              <div class="col-lg-5 col-md-12 col-12 float-left left-iti-title">
                                 <h3>Pick - up point</h3>
                              </div>
                              <div class="col-lg-7 col-md-12 col-12 float-left right-content-iti">
                                 <span><i class="fas fa-car"></i>Pick up from hotels in Khaolak area</span>
                                 <span><i class="fas fa-car"></i>Pick up from hotels in Khaolak area Fees</span>
                              </div>
                           </div>
                           <div class="w-100 float-left wrap-sections-iti">
                              <div class="col-lg-5 col-md-12 col-12 float-left left-iti-title">
                                 <h3>Additional Information</h3>
                              </div>
                              <div class="col-lg-7 col-md-12 col-12 float-left right-content-iti">
                                 <span><i class="fas fa-star"></i>Program is subjected to change depends on
                                 weather and sea conditions</span>
                                 <span><i class="fas fa-star"></i>Program is subjected to change depends on
                                 weather and sea conditions</span>
                                 <span><i class="fas fa-star"></i>Program is subjected to change depends on
                                 weather and sea conditions</span>
                                 <span><i class="fas fa-star"></i>Program is subjected to change depends on
                                 weather and sea conditions</span>
                                 <span><i class="fas fa-star"></i>Program is subjected to change depends on
                                 weather and sea conditions</span>
                              </div>
                           </div>
                        </div>
                        <div class="wrap-detais-iti w-100 float-left mt-5" id="section2">
                           <h4>Itinerary</h4>
                           <div class="w-100 float-left wrap-sections-iti">
                              <div class="w-100 float-left left-iti-title">
                                 <h3 class="text-uppercase"><span>8 AM</span> Departure</h3>
                              </div>
                              <div class="w-100 float-left right-content-iti">
                                 <p class="mb-0">Welcome to “Wow Andaman” to check in and have breakfast with coffee and tea. An after withdrawal snorkeling equipment. Then e tour guide will brief today’s tour program before we depart to Similan Island National Park</p>
                              </div>
                           </div>
                           <div class="w-100 float-left wrap-sections-iti">
                              <div class="w-100 float-left left-iti-title">
                                 <h3 class="text-uppercase"><span>8 AM</span> Departure</h3>
                              </div>
                              <div class="w-100 float-left right-content-iti">
                                 <p class="mb-0">Welcome to “Wow Andaman” to check in and have breakfast with coffee and tea. An after withdrawal snorkeling equipment. Then e tour guide will brief today’s tour program before we depart to Similan Island National Park</p>
                              </div>
                           </div>
                           <div class="w-100 float-left wrap-sections-iti">
                              <div class="w-100 float-left left-iti-title">
                                 <h3 class="text-uppercase"><span>8 AM</span> Departure</h3>
                              </div>
                              <div class="w-100 float-left right-content-iti">
                                 <p class="mb-0">Welcome to “Wow Andaman” to check in and have breakfast with coffee and tea. An after withdrawal snorkeling equipment. Then e tour guide will brief today’s tour program before we depart to Similan Island National Park</p>
                              </div>
                           </div>
                           <div class="w-100 float-left wrap-sections-iti">
                              <div class="w-100 float-left left-iti-title">
                                 <h3 class="text-uppercase"><span>8 AM</span> Departure</h3>
                              </div>
                              <div class="w-100 float-left right-content-iti">
                                 <p class="mb-0">Welcome to “Wow Andaman” to check in and have breakfast with coffee and tea. An after withdrawal snorkeling equipment. Then e tour guide will brief today’s tour program before we depart to Similan Island National Park</p>
                              </div>
                           </div>
                        </div> -->
                        <?php echo isset($itinerary_details[0]['content']) ? $itinerary_details[0]['content'] : '';?>
                        <!------------------------------------------------------>

                        <!----------------- MAP & IMAGE GALLERY --------------->
                        <div class="wrap-detais-iti w-100 float-left mt-5" id="section3">
                           <h4>Map</h4>
                           <div class="map-iti w-100 float-left mt-3">
                              <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d471218.38560188503!2d88.04952746944409!3d22.676385755547646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1564683240799!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->

                              <iframe src="<?php echo isset($itinerary_details[0]['map_location']) ? $itinerary_details[0]['map_location'] : '';?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                              
                           </div>
                        </div>
                        <div class="wrap-detais-iti w-100 float-left mt-5" id="section4">
                           <h4>Images</h4>
                           <div class="images-gal-iti w-100 float-left mt-3">
                              <ul>
                                 <?php
                                    if(isset($itinerary_details[0]['image_gallery']) && $itinerary_details[0]['image_gallery']!= '')
                                    {
                                       $gall = json_decode($itinerary_details[0]['image_gallery'],true);
                                       foreach($gall AS $ikey => $ivalue){
                                 ?>
                                 <li>
                                    <a href="#gallery-<?php echo $ikey;?>" class="btn-gallery">
                                    <img src="<?php echo base_url('assets/content/gallery/'.$ivalue);?>" alt="" />
                                    </a>
                                 </li>

                                 <!-- <li>
                                    <a href="#gallery-2" class="btn-gallery">
                                    <img src="<?php echo base_url('assets/images/thai-imf02.jpg');?>" alt="" />
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#gallery-3" class="btn-gallery">
                                    <img src="<?php echo base_url('assets/images/thai-imf03.jpg');?>" alt="" />
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#gallery-4" class="btn-gallery">
                                    <img src="<?php echo base_url('assets/images/thai-imf01.jpg');?>" alt="" />
                                    </a>
                                 </li> -->

                                 <?php
                                    }
                                 } 
                                 ?>
                              </ul>
                              <!-- <div id="gallery-1" class="hiddens">
                                 <a href="<?php echo base_url('assets/images/thai-imf01.jpg');?>">Image 1</a>
                                 <a href="<?php echo base_url('assets/images/thai-imf02.jpg');?>">Image 2</a>
                                 <a href="<?php echo base_url('assets/images/thai-imf03.jpg');?>">Image 3</a>
                                 <a href="<?php echo base_url('assets/images/thai-imf01.jpg');?>">Image 4</a>
                              </div>

                              <div id="gallery-2" class="hiddens">
                                 <a href="<?php echo base_url('assets/images/thai-imf01.jpg');?>">Image 1</a>
                                 <a href="<?php echo base_url('assets/images/thai-imf02.jpg');?>">Image 2</a>
                                 <a href="<?php echo base_url('assets/images/thai-imf03.jpg');?>">Image 3</a>
                                 <a href="<?php echo base_url('assets/images/thai-imf01.jpg');?>">Image 4</a>
                              </div>
                              <div id="gallery-3" class="hiddens">
                                 <a href="<?php echo base_url('assets/images/thai-imf01.jpg');?>">Image 1</a>
                                 <a href="<?php echo base_url('assets/images/thai-imf02.jpg');?>">Image 2</a>
                                 <a href="<?php echo base_url('assets/images/thai-imf03.jpg');?>">Image 3</a>
                                 <a href="<?php echo base_url('assets/images/thai-imf01.jpg');?>">Image 4</a>
                              </div>
                              <div id="gallery-4" class="hiddens">
                                 <a href="<?php echo base_url('assets/images/thai-imf01.jpg');?>">Image 1</a>
                                 <a href="<?php echo base_url('assets/images/thai-imf02.jpg');?>">Image 2</a>
                                 <a href="<?php echo base_url('assets/images/thai-imf03.jpg');?>">Image 3</a>
                                 <a href="<?php echo base_url('assets/images/thai-imf01.jpg');?>">Image 4</a>
                              </div> -->
                           </div>
                        </div>
                        <!-------------------------- END ----------------------->
                     </div>
                     <div class="col-lg-4 col-md-12 col-12 float-left iti-right">
                        <div class="w-100 float-left why-book-maxx">
                           <h1>Why Book With Us?</h1>
                           <span><i class="fas fa-star"></i> <font>All Thailand various travel services coverage.</font></span>
                           <span><i class="fas fa-star"></i> <font>Scheduled Tours and activities over 50 cities.</font></span>
                           <span><i class="fas fa-star"></i> <font>Save money - It's often cheaper to prebook.</font></span>
                           <span><i class="fas fa-star"></i> <font>Save times - one stop travel services.</font></span>
                           <span><i class="fas fa-star"></i> <font>Trustworthy travel website.</font></span>
                           <a href="javascript:void()" id="btnBook" class="w-100 float-left mt-5 book-iti-button text-uppercase">Book Now</a>
                        </div>
                     </div>

                  </div>
               </div>
            </section>
			
           

<?php include_once('footer.php');?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js'></script>
	<script  src="<?php echo base_url('assets/js/image-gallery.js');?>"></script>
<script>
	$(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
      console.log($(window).scrollTop())
    if ($(window).scrollTop() > 500) {
      $('#naviti').addClass('navbar-fixed');
    }
    if ($(window).scrollTop() < 501) {
      $('#naviti').removeClass('navbar-fixed');
    }
  });

  $(document).on('click', '.nav-iti li a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top  - 100
    }, 500);
   });
  $(document).ready(function(){
   $('#btnBook').on('click',function(){
         var base_url = "<?php echo base_url();?>";
         var id = '<?php echo base64_decode($this->uri->segment(3))?>';
         var ptype = '<?php echo ($this->uri->segment(4))?>';
         var cost = '<?php echo isset($arr['cost']) ? $arr['cost'] : '';?>';

         $.ajax({

         url     : base_url+'package_management/ajax_save_package',
         type    : "post",
         data    : {"id":id,"ptype":ptype,'cost':cost},
         success : function(result){
            if(result == 'success')
            {
               alert('Booking successful..');
            }
            else if(result == 'error')
            {
               alert('Something went worng..Please try again later..!!');  
            }
            else
            {
               alert(result);
            }
      }});
   });
  });
</script>