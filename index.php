<?php

// DB Details
$dbhost = "dbserver";
$dbuser = "root";
$dbpass = "dbroot123";
$dbname = "my_db";
$dbtable = "domore";

$con = mysqli_connect($dbhost, $dbuser, $dbpass);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$msg="";

// Create database
// Create database
$sql = "CREATE DATABASE IF NOT EXISTS " . $dbname;
if ($con->query($sql) === TRUE) {
    // echo "Database created successfully" . "<br />\n";
    $msg.="DB OK" . "<br />\n";
    mysqli_select_db($con,"my_db");

    // Create table
    $sql = "CREATE TABLE IF NOT EXISTS " . $dbtable . " (id int AUTO_INCREMENT PRIMARY KEY, data varchar(255))";
    if ($con->query($sql) === TRUE) {
      $msg.="DB Table OK" . "<br />\n";

      // Insert record
      $sql = "INSERT INTO domore SET data = 'Hello Me - " . time() . "'";
      if ($con->query($sql) === TRUE) {
        // echo "Record inserted successfully" . "<br />\n";
        $msg.="DB Record OK" . "<br />\n";
        $sql="SELECT count(*) as CNT FROM domore";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_row($result);
        // echo '<pre>' . print_r($row, 1) . '</pre>' . "<br />\n";
        // echo '<pre>' . print_r($result, 1) . '</pre>' . "<br />\n";
        // $msg.= $row[0] . "<br />\n";
        $count= $row[0];
        // echo $msg.  "<br />\n";
        // mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);

      } else {
        // echo "Error inserting record: " . $conn->error . "<br />\n";
        $msg.="Error1=" . $conn->error . "<br />\n";

      }

    } else {
      // echo "Error creating table: " . $conn->error . "<br />\n";
      $msg.="Error2=" . $conn->error . "<br />\n";

    }

} else {
    // echo "Error creating database: " . $conn->error . "<br />\n";
    $msg.="Error3=" . $conn->error . "<br />\n";

}

mysqli_close($con);
?>
<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--- basic page needs
   ================================================== -->
    <meta charset="utf-8">
    <title>Dazzle</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
   ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
   ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- script
   ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
	================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- header 
   ================================================== -->
   <header id="header" class="row">   

   		<div class="header-logo">
	        <a href="index.html">Dazzle</a>
	    </div>

	   	<nav id="header-nav-wrap">
			<ul class="header-main-nav">
				<li class="current"><a class="smoothscroll"  href="#home" title="home">Home</a></li>
                <li><a class="smoothscroll"  href="#about" title="about">About</a></li>
				<li><a class="smoothscroll"  href="#pricing" title="pricing">Pricing</a></li>
				<li><a class="smoothscroll"  href="#testimonials" title="testimonials">Testimonials</a></li>
				<li><a class="smoothscroll"  href="#download" title="download">Download</a></li>	
			</ul>

            <a href="#" title="sign-up" class="button button-primary cta">Sign Up</a>
		</nav>

		<a class="header-menu-toggle" href="#"><span>Menu</span></a>    	
   	
   </header> <!-- /header -->


   <!-- home
   ================================================== -->
   <section id="home" data-parallax="scroll" data-image-src="images/hero-bg.jpg" data-natural-width=3000 data-natural-height=2000>

        <div class="overlay"></div>
        <div class="home-content">        

            <div class="row contents">                     
                <div class="home-content-left">

                    <h3 data-aos="fade-up">Welcome to Dazzle</h3>

                    <h1 data-aos="fade-up">
                        Count: <?php echo $count;?><br>
                        <?php echo $msg;?><br>
                        Hello World! 1234<br>
                    </h1>

                    <div class="buttons" data-aos="fade-up">
                        <a href="#download" class="smoothscroll button stroke">
                            <span class="icon-circle-down" aria-hidden="true"></span>
                            Download App
                        </a>
                        <a href="http://player.vimeo.com/video/14592941?title=0&amp;byline=0&amp;portrait=0&amp;color=39b54a" data-lity class="button stroke">
                            <span class="icon-play" aria-hidden="true"></span>
                            Watch Video
                        </a>
                    </div>                                         

                </div>

                <div class="home-image-right">
                    <img src="images/iphone-app-470.png" 
                        srcset="images/iphone-app-470.png 1x, images/iphone-app-940.png 2x"  
                        data-aos="fade-up">
                </div>
            </div>

        </div> <!-- end home-content -->

        <ul class="home-social-list">
            <li>
                <a href="#"><i class="fa fa-facebook-square"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
            </li>
        </ul>
        <!-- end home-social-list -->

        <div class="home-scrolldown">
            <a href="#about" class="scroll-icon smoothscroll">
                <span>Scroll Down</span>
                <i class="icon-arrow-right" aria-hidden="true"></i>
            </a>
        </div>

    </section> <!-- end home -->  


    <!-- about
    ================================================== -->
    <section id="about">

        <div class="row about-intro">

            <div class="col-four">
                <h1 class="intro-header" data-aos="fade-up">About Our App</h1>
            </div>
            <div class="col-eight">
                <p class="lead" data-aos="fade-up">
                    Excepteur enim magna veniam labore veniam sint. Ex aliqua esse proident ullamco voluptate. Nisi nisi nisi aliqua eiusmod dolor dolor proident deserunt occaecat elit Lorem reprehenderit. Id culpa veniam ex aliqua magna elit pariatur do nulla. Excepteur enim magna veniam labore veniam sint.
                </p>
            </div>                       
            
        </div>

        <div class="row about-features">

            <div class="features-list block-1-3 block-m-1-2 block-mob-full group">

                <div class="bgrid feature" data-aos="fade-up">	

                    <span class="icon"><i class="icon-window"></i></span>            

                    <div class="service-content">	

                        <h3>Fully Resposive</h3>

                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                        </p>
                        
                    </div> 	         	 

                    </div> <!-- /bgrid -->

                    <div class="bgrid feature" data-aos="fade-up">	

                        <span class="icon"><i class="icon-image"></i></span>                          

                    <div class="service-content">	
                        <h3>Retina Ready</h3>  

                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                        </p>

                        
                    </div>	                          

                </div> <!-- /bgrid -->

                <div class="bgrid feature" data-aos="fade-up">

                    <span class="icon"><i class="icon-paint-brush"></i></span>		            

                    <div class="service-content">
                        <h3>Stylish Design</h3>

                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                        </p> 
                            
                    </div> 	            	               

                </div> <!-- /bgrid -->

                    <div class="bgrid feature" data-aos="fade-up">

                        <span class="icon"><i class="icon-file"></i></span>	              

                    <div class="service-content">
                        <h3>Clean Code</h3>

                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                        </p> 
                        
                    </div>                

                    </div> <!-- /bgrid -->

                <div class="bgrid feature" data-aos="fade-up">

                    <span class="icon"><i class="icon-sliders"></i></span>	            

                    <div class="service-content">	
                        <h3>Easy To Customize</h3>

                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                        </p>                            
                    </div>	               

                </div> <!-- /bgrid -->

                <div class="bgrid feature" data-aos="fade-up">

                    <span class="icon"><i class="icon-gift"></i></span>	   	           

                    <div class="service-content">
                        <h3>Free of Charge</h3>

                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                        </p> 
                            
                    </div>	               

                </div> <!-- /bgrid -->

            </div> <!-- end features-list -->

        </div> <!-- end about-features -->

        <div class="row about-how">
          
            <h1 class="intro-header" data-aos="fade-up">How The App Works?</h1>           

            <div class="about-how-content" data-aos="fade-up">
                <div class="about-how-steps block-1-2 block-tab-full group">

                    <div class="bgrid step" data-item="1">
                        <h3>Sign-Up</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
                        </p> 
                    </div>

                    <div class="bgrid step" data-item="2">
                        <h3>Upload</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
                        </p> 
                    </div>               
               
                    <div class="bgrid step" data-item="3">
                        <h3>Create</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
                        </p> 
                    </div>

                    <div class="bgrid step" data-item="4">
                        <h3>Publish</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
                        </p> 
                    </div>  

                </div>           
           </div> <!-- end about-how-content -->

        </div> <!-- end about-how -->

        <div class="row about-bottom-image">

           <img src="images/app-screens-1200.png" 
                srcset="images/app-screens-600.png 600w, 
                        images/app-screens-1200.png 1200w, 
                        images/app-screens-2800.png 2800w" 
                sizes="(max-width: 2800px) 100vw, 2800px"
                alt="App Screenshots" data-aos="fade-up">

        </div>  <!-- end about-bottom-image -->       
        
    </section> <!-- end about -->  
   

    <!-- pricing
    ================================================== -->
    <section id="pricing">
        <div class="row pricing-content">

            <div class="col-four pricing-intro">
                <h1 class="intro-header" data-aos="fade-up">Our Pricing Options</h1>

                <p data-aos="fade-up">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium. 
                </p>
            </div>

            <div class="col-eight pricing-table">
                <div class="row">

                    <div class="col-six plan-wrap">
                        <div class="plan-block" data-aos="fade-up"> 

                            <div class="plan-top-part">
                                <h3 class="plan-block-title">Lite Plan</h3>
                                <p class="plan-block-price"><sup>$</sup>25</p>
                                <p class="plan-block-per">Per Month</p>
                            </div>

                            <div class="plan-bottom-part">
                                <ul class="plan-block-features">
                                    <li><span>3GB</span> Storage</li>
                                    <li><span>10GB</span> Bandwidth</li>	                  
                                    <li><span>5</span> Databases</li>		                  
                                    <li><span>30</span> Email Accounts</li>
                                </ul>

                                <a class="button button-primary large" href="">Get Started</a>
                            </div>  
                     
                        </div>
                    </div> <!-- end plan-wrap -->

                    <div class="col-six plan-wrap">
                        <div class="plan-block primary" data-aos="fade-up">

                            <div class="plan-top-part">
                                <h3 class="plan-block-title">Pro Plan</h3>
                                <p class="plan-block-price"><sup>$</sup>50</p>
                                <p class="plan-block-per">Per Month</p>
                            </div>

                            <div class="plan-bottom-part">
                                <ul class="plan-block-features">
                                    <li><span>5GB</span> Storage</li>
                                    <li><span>20GB</span> Bandwidth</li>	                  
                                    <li><span>15</span> Databases</li>		                  
                                    <li><span>70</span> Email Accounts</li>
                                </ul>

                                <a class="button button-primary large" href="">Get Started</a>
                            </div>

                        </div>
                    </div> <!-- end plan-wrap -->

                </div>               
            </div> <!-- end pricing-table -->

        </div> <!-- end pricing-content -->
    </section> <!-- end pricing -->


    <!-- Testimonials Section
    ================================================== -->
    <section id="testimonials">

        <div class="row">
            <div class="col-twelve">
                <h1 class="intro-header" data-aos="fade-up">What They Say About Our App.</h1>
            </div>   		
        </div>   	

        <div class="row owl-wrap">

            <div id="testimonial-slider"  data-aos="fade-up">

                <div class="slides owl-carousel">

                    <div>
                        <p>
                        Your work is going to fill a large part of your life, and the only way to be truly satisfied is
                        to do what you believe is great work. And the only way to do great work is to love what you do.
                        If you haven't found it yet, keep looking. Don't settle. As with all matters of the heart, you'll know when you find it.
                        </p> 

                        <div class="testimonial-author">
                                <img src="images/avatars/user-02.jpg" alt="Author image">
                                <div class="author-info">
                                    Steve Jobs
                                    <span class="position">CEO, Apple.</span>
                                </div>
                        </div>                 
                    </div> 

                    <div>
                        <p>
                        This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
                        Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem
                        nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.    
                        </p>

                        <div class="testimonial-author">
                                <img src="images/avatars/user-03.jpg" alt="Author image">
                                <div class="author-info">
                                    John Doe
                                    <span>CEO, ABC Corp.</span>
                                </div>
                        </div>                                         
                    </div> 

                </div> <!-- end slides -->

            </div> <!-- end testimonial-slider -->         
            
        </div> <!-- end flex-container -->

    </section> <!-- end testimonials -->
    

    <!-- download
    ================================================== -->
    <section id="download">

        <div class="row">
            <div class="col-full">
                <h1 class="intro-header"  data-aos="fade-up">Download Our App Today!</h1>

                <p class="lead" data-aos="fade-up">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                </p>

                <ul class="download-badges">
                    <li><a href="#" title="" class="badge-appstore"  data-aos="fade-up">App Store</a></li>
                    <li><a href="#" title="" class="badge-googleplay" data-aos="fade-up">Play Store</a></li>
                </ul>

            </div>
        </div>

    </section> <!-- end download -->    


    <!-- footer
    ================================================== -->
    <footer>

        <div class="footer-main">
            <div class="row">  

                <div class="col-three md-1-3 tab-full footer-info">            

                    <div class="footer-logo"></div>

                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. 
                    </p>

                    <ul class="footer-social-list">
                        <li>
                            <a href="#"><i class="fa fa-facebook-square"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                    
                    
                </div> <!-- end footer-info -->

                <div class="col-three md-1-3 tab-1-2 mob-full footer-contact">

                    <h4>Contact</h4>

                    <p>
                    1600 Amphitheatre Parkway<br>
                    Mountain View, CA <br>
                    94043 US<br>		        
                    </p>

                    <p>
                    someone@dazzlesite.com <br>
                    Phone: (+63) 555 1212 <br>
                    Fax: (+63) 555 0100    
                    </p>                    

                </div> <!-- end footer-contact -->  

                <div class="col-two md-1-3 tab-1-2 mob-full footer-site-links">

                    <h4>Site Links</h4>

                    <ul class="list-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>	      		
                            
                </div> <!-- end footer-site-links --> 

                <div class="col-four md-1-2 tab-full footer-subscribe">

                    <h4>Our Newsletter</h4>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                    <div class="subscribe-form">
                
                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required=""> 
                
                            <input type="submit" name="subscribe" value="Send">
                
                            <label for="mc-email" class="subscribe-message"></label>
                
                        </form>

                    </div>	      		
                            
                </div> <!-- end footer-subscribe -->         

            </div> <!-- /row -->
        </div> <!-- end footer-main -->


      <div class="footer-bottom">

      	<div class="row">

      		<div class="col-twelve">
	      		<div class="copyright">
		         	<span>© Copyright Dazzle 2017.</span> 
		         	<span>Design by <a href="http://www.styleshout.com/">styleshout</a></span>		         	
		         </div>

		         <div id="go-top">
		            <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up"></i></a>
		         </div>         
	      	</div>

      	</div> <!-- end footer-bottom -->     	

      </div>

    </footer>

    <div id="preloader"> 
    	<div id="loader"></div>
    </div>  

    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
