<?php 
error_reporting(0);
$GEtRemovalClass=get_object_vars($userdata[0]);
$GetRemovalAbout=get_object_vars($aboutusget[0]);
$GetRemovaltoken=get_object_vars($tokenget[0]);   
$GetRemovalroadmap=get_object_vars($roadmap[0]);   
$GetRemovalfaq=get_object_vars($faq[0]);
$GetRemovalteam=get_object_vars($team[0]);  
 ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>MMBTU Coin</title>
<!--Bootstrap -->
<link rel="stylesheet" href="<?php echo base_url();?>assests/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="<?php echo base_url();?>assests/css/style.css" type="text/css">
<!--FontAwesome Font Style -->
<link href="<?php echo base_url();?>assests/css/font-awesome.min.css" rel="stylesheet">
<!-- Fav and touch icons -->
<link rel="shortcut icon" href="<?php echo base_url();?>assests/images/favicon-icon/favicon.png">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->  
</head>
<body>
<!-- Header -->
<header id="header" class="nav-stacked affix-top" data-spy="affix" data-offset-top="10">
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
      	<div class="logo"> <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assests/images/logo.png" alt="image"/></a> </div>
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
            <span class="sr-only">Toggle navigation</span> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
        </button>
      </div>
      <div class="btn_wrap pull-right">
      <?php 
      if($GEtRemovalClass['id']){?>
        <a href="<?php echo base_url();?>login/" class="btn btn-xs btn-outline">Welcome <?php echo $GEtRemovalClass['name'];?></a>
      <?php }else{?>
            <a href="<?php echo base_url();?>login/" class="btn btn-xs btn-outline">Sign In</a>
            <a href="<?php echo base_url();?>login/register" class="btn btn-xs btn-outline">Sign Up</a>
     <?php }
      ?>
        	
        </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="#intro">Home</a></li>
          <li><a href="#aboutus">About Us</a></li>
          <li><a href="#distribution">Tokens</a></li>
          <li><a href="#roadmap">Road Map</a></li>
          <li><a href="#plan">Plan</a></li>
          <li><a href="#ourteam">Team</a></li>
          <li><a href="#faq">FAQ</a></li>
          <li><a href="#blog">News</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
</header>
<!-- /Header --> 

<section id="intro" class="section-padding">
	<div class="container">
    	<div class="row">
        	<div class="col-md-8">
            	<div class="intro_text">
    	        	<h1>Invest in the revolution for World's biggest Crypto Currencies </h1>
	                <a href="#" class="btn btn-lg">Download Whitepaper</a>
                </div>
            </div>
    		<div class="col-md-4">
                <div class="pre_icon">
                	<div class="pre_heading">
                    	<h2>PRE-ICO</h2>
                    </div>
                    <h6>Ends In</h6>
                    <div id="countdown"></div> 
                    <a href="#" class="btn">Buy Tokens</a>
                    <div class="progress">
                      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                        <span> Reached 45%</span>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</section>

<!-- Aboutus -->
<section id="aboutus" class="section-padding">
	<div class="container">
    	<div class="section-header">
        	<h2>Who We Are</h2>
            <p><?php echo $GetRemovalAbout['title'];?></p>
        </div>
        <div class="row">
        	<div class="col-md-8">
            	<div class="coin_flow">
                	<div class="collected">
                    	<h5>$20 806 150</h5>
						<p>Collected Now</p>
                    </div>
                	<img src="<?php echo base_url();?>/admin/mm_btu/Admin/adminlte/uploads/about/<?php echo $GetRemovalAbout['image'];?>" alt="image">
                </div>
            </div>
            <div class="col-md-4">
            	<div class="about_info">
    	        	<h4>Target your success</h4>
	                <p><?php echo $GetRemovalAbout['description'];?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Aboutus -->

<!-- Token-Distribution -->
<section id="distribution" class="section-padding dark_bg">
	<!--<div class="container">
    	<div class="section-header">
        	<h2>Token Distribution</h2>
        </div>
        <div class="text-center">
        	<img src="<?php echo base_url();?>assests/images/img2.jpg" alt="image">
        </div>
    </div>-->
    <div class="container">
    	<div class="section-header">
        	<h2><?php echo $GetRemovaltoken['title'];?></h2>
        </div>
        
        <div class="row">
        	<div class="col-md-4">
            	<div class="text-center">
                    <img src="<?php echo base_url();?>/admin/mm_btu/Admin/adminlte/uploads/icotoken/<?php echo $GetRemovaltoken['image'];?>" alt="image">
                </div>
            </div>
            <div class="col-md-8">
            	<div class="distribution_info">
                	<p><?php echo $GetRemovaltoken['description'];?></p>
                    <ul class="distribution_list"> 
                    	<li>
                        	<div class="ppc_dist"><span class="white_bg_bb"></span> 3%</div>
                            <h6>Pr. bounty advisors</h6>
                            <p><?php echo $GetRemovaltoken['advisor'];?></p>
                        </li>
                        <li>
                        	<div class="ppc_dist"><span class="yello_bg_bb"></span> 8%</div>
                            <h6>ICO</h6>
                            <p><?php echo $GetRemovaltoken['ico'];?></p>
                        </li>
                        <li>
                        	<div class="ppc_dist"><span class="blue_bg_bb"></span> 7%</div>
                            <h6>Founders</h6>
                            <p><?php echo $GetRemovaltoken['founder'];?></p>
                        </li>
                        <li>
                        	<div class="ppc_dist"><span class="orange_bg_bb"></span> 3%</div>
                            <h6>Private-Sale</h6>
                            <p><?php echo $GetRemovaltoken['privatesale'];?></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Token-Distribution -->

<!-- Plan -->
<section id="plan" class="section-padding">
	<div class="container">
    	<div class="section-header">
        	<h2>Rounds of Sale of Tokens</h2>
        </div>
        <div class="row">
        	<div class="col-md-4">
            	<div class="plan_wrap box_wrap">
                	<h4>Binary Bonus</h4>
                    <ul>
                    	<li>100 - 10% - US $ .300 = 0.24 BT</li>
                        <li>500 - 11% - US $ .1,000 = 0.81 BTC</li>
                        <li>1k - 12% - US $ .10,000 = 8.15BTC </li>
                        <li>5k -14% - US $ .15,000 = 12.22BTC</li>
                        <li>10k - 16% - US $ .20,000 = 16.30 BTC</li>
                    </ul>
                    <a href="#" class="btn btn-sm">Buy Token Now</a>
                </div>
            </div>
            <div class="col-md-4">
            	<div class="plan_wrap box_wrap">
                	<h4>Bono Residual</h4>
                    <ul>
                    	<li>100 - 10% - US $ .300 = 0.24 BT</li>
                        <li>500 - 11% - US $ .1,000 = 0.81 BTC</li>
                        <li>1k - 12% - US $ .10,000 = 8.15BTC </li>
                        <li>5k -14% - US $ .15,000 = 12.22BTC</li>
                        <li>10k - 16% - US $ .20,000 = 16.30 BTC</li>
                    </ul>
                    <a href="#" class="btn btn-sm">Buy Token Now</a>
                </div>
            </div>
            <div class="col-md-4">
            	<div class="plan_wrap box_wrap">
                	<h4>Binary Bonus</h4>
                    <ul>
                    	<li>100 - 10% - US $ .300 = 0.24 BT</li>
                        <li>500 - 11% - US $ .1,000 = 0.81 BTC</li>
                        <li>1k - 12% - US $ .10,000 = 8.15BTC </li>
                        <li>5k -14% - US $ .15,000 = 12.22BTC</li>
                        <li>10k - 16% - US $ .20,000 = 16.30 BTC</li>
                    </ul>
                    <a href="#" class="btn btn-sm">Buy Token Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Plan -->

<!-- Road-map -->
<section id="roadmap" class="section-padding dark_bg">
	<div class="container">
    	<div class="section-header">
        	<h2>Road Map</h2>
        </div>
        <div class="roadmap_flow">
        	<ul>
            	<li class="st_1 up_arrow">
                	<h6><?php echo $GetRemovalroadmap['title1'];?></h6>
                    <p><?php echo $GetRemovalroadmap['content1'];?></p>
                </li>
                <li class="st_2 down_arrow">
                	<h6><?php echo $GetRemovalroadmap['title2'];?></h6>
                    <p><?php echo $GetRemovalroadmap['content2'];?></p>
                </li>
                <li class="st_3 up_arrow">
                	<h6><?php echo $GetRemovalroadmap['title3'];?></h6>
                    <p><?php echo $GetRemovalroadmap['content3'];?></p>
                </li>
                <li class="st_4 down_arrow">
                	<h6><?php echo $GetRemovalroadmap['title4'];?></h6>
                    <p><?php echo $GetRemovalroadmap['content4'];?></p>
                </li>
                <li class="st_5 up_arrow">
                	<h6><?php echo $GetRemovalroadmap['title5'];?></h6>
                    <p><?php echo $GetRemovalroadmap['content5'];?></p>
                </li>
                <li class="st_6 down_arrow">
                	<h6><?php echo $GetRemovalroadmap['title6'];?></h6>
                    <p><?php echo $GetRemovalroadmap['content6'];?></p>
                </li>
                <li class="st_7 up_arrow">
                	<h6><?php echo $GetRemovalroadmap['title7'];?></h6>
                    <p><?php echo $GetRemovalroadmap['content7'];?></p>
                </li>
            </ul>
        </div>
        
    </div>
</section>
<!-- /Road-map -->

<section class="section-padding gradient_bg">
	<div class="container">
    	<div class="col-md-8">
        	<h2>Over 1502150 tokens were soled</h2>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
        </div>
        <div class="col-md-4 text-right">
        	<a href="#" class="btn btn-outline mt_10"> Buy Token Now</a>
        </div>
    </div>
</section>

<!-- Team -->
<section class="section-padding" id="ourteam">
	<div class="container">
    	<div class="section-header">
        	<h2>Our Team</h2>
            <p>Sed ut perspiciatis unde omnis iste natus</p>
        </div>
        <div class="row">
        	<div class="col-md-4 team_wp">
            	<div class="box_wrap">
                	<div class="team_img">
                    	<img src="<?php echo base_url();?>/admin/mm_btu/Admin/adminlte/uploads/team1/<?php echo $GetRemovalteam['image'];?>" alt="image">
                    </div>
                    <div class="team_info">
                    	<h6><?php echo $GetRemovalteam['title'];?></h6>
                        <p><?php echo $GetRemovalteam['designation'];?></p>
                        <!--<div class="follow_us">
                        	<ul>
                            	<li><a href="#"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"> <i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"> <i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"> <i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="col-md-4 team_wp">
            	<div class="box_wrap">
                	<div class="team_img">
                    	<img src="<?php echo base_url();?>/admin/mm_btu/Admin/adminlte/uploads/team2/<?php echo $GetRemovalteam['image2'];?>" alt="image">
                    </div>
                    <div class="team_info">
                    	<h6><?php echo $GetRemovalteam['title2'];?></h6>
                        <p><?php echo $GetRemovalteam['designation2'];?></p>
                        <!--<div class="follow_us">
                        	<ul>
                            	<li><a href="#"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"> <i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"> <i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"> <i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="col-md-4 team_wp">
            	<div class="box_wrap">
                	<div class="team_img">
                    	<img src="<?php echo base_url();?>/admin/mm_btu/Admin/adminlte/uploads/team3/<?php echo $GetRemovalteam['image3'];?>" alt="image">
                    </div>
                    <div class="team_info">
                    	<h6><?php echo $GetRemovalteam['title3'];?></h6>
                        <p><?php echo $GetRemovalteam['designation3'];?></p>
                        <!--<div class="follow_us">
                        	<ul>
                            	<li><a href="#"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"> <i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"> <i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"> <i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="our_advisors text-center">
        	<h4>Our Advisors</h4>
            <div class="row">
            <?php 
            foreach($advisors as $advisor){
            ?>
            	<div class="col-sm-4 col-md-2 advisors_wp">
                	<div class="advisors">
                    	<div class="team_img">
                            <img src="<?php echo base_url();?>/admin/mm_btu/Admin/adminlte/uploads/advisor/<?php echo $advisor->image;?>" alt="image">
                        </div>
                        <h6><?php echo $advisor->name;?></h6>
                        <p><?php echo $advisor->designation;?></p>
                        <!--<div class="follow_us">
                        	<ul>
                            	<li><a href="#"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"> <i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"> <i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"> <i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>-->
                    </div>
                </div> <?php } ?>
               
                
            </div>
        </div>
    </div>
</section>
<!-- /Team -->

<!-- FAQ -->
<section id="faq" class="section-padding dark_bg">
	<div class="container">
    	<div class="row">
        	<div class="col-md-4">
            	<div class="text-center">
	            	<h4>Watch Video</h4>
                    <div class="video_wrap">
                    	<iframe width="100%" height="390" src="https://www.youtube.com/embed/L-Qhv8kLESY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
            	<h2>Ask Question?</h2>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                	<div class="panel panel-default">
                        <div class="panel-heading" role="tab">
                          <h4 class="panel-title">
                          <a role="button" data-toggle="collapse" href="#collapse_1" aria-expanded="true" data-parent="#accordion"><?php echo $GetRemovalfaq['title'];?></a></h4>
                        </div>
                        <div id="collapse_1" class="panel-collapse collapse in" role="tabpanel">
                          <div class="panel-body">
                            <p><?php echo $GetRemovalfaq['description'];?></p>
                          </div>
                        </div>
                     </div>
					
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab">
                          <h4 class="panel-title">
                          <a role="button" data-toggle="collapse" href="#collapse_2" aria-expanded="false" aria-controls="collapse_2" data-parent="#accordion">
                          <?php echo $GetRemovalfaq['title2'];?></a></h4>
                        </div>
                        <div id="collapse_2" class="panel-collapse collapse" role="tabpanel">
                          <div class="panel-body">
                            <p><?php echo $GetRemovalfaq['description2'];?></p>
                          </div>
                        </div>
                     </div>
                     
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab">
                          <h4 class="panel-title">
                          <a role="button" data-toggle="collapse" href="#collapse_3" aria-expanded="false" aria-controls="collapse_3" data-parent="#accordion">
                          <?php echo $GetRemovalfaq['title3'];?></a></h4>
                        </div>
                        <div id="collapse_3" class="panel-collapse collapse" role="tabpanel">
                          <div class="panel-body">
                            <p><?php echo $GetRemovalfaq['description3'];?></p>
                          </div>
                        </div>
                     </div>                 
                </div>
            </div>
        </div>
    </div>
</section> 
<!-- /FAQ -->  

<!-- Newsletter -->  
<section class="section-padding gradient_bg">
	<div class="container">
    	<div class="col-md-5">
        	<h2>Newsletter Subscribe </h2>
            <p>Stay Updated with our latest news. We promise not to spam</p>
        </div>
        <div class="col-md-7 text-right">
        	<div class="newsletter_form">
    	    	<form>
        			<div class="form-group">
                    	<input type="email" placeholder="Enter Email" class="form-control">
                    </div>    	
                    <input type="submit" value="Subscribe" class="btn">
	            </form>
            </div>
        </div>
    </div>
</section>
<!-- /Newsletter -->  

<!-- Blog -->
<section id="blog" class="section-padding">
	<div class="container">
    	<div class="section-header">
        	<h2>Latest Crypto News</h2>
        </div>
        <div class="row">
        <?php
        foreach($newss as $news){?>
            <div class="col-md-4">
            	<div class="blog_wrap">
                	<div class="post_img">
                    	<a href="#"><img src="<?php echo base_url();?>/admin/mm_btu/Admin/adminlte/uploads/new/<?php echo $news->image;?>" alt="image"></a>
                    </div>
                    <h3><a href="#"><?php echo $news->title;?></a></h3>
                    <!--<div class="post_meta">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> MMBTU Coin </a></li>
                            <li><a href="#"><i class="fa fa-clock-o"></i> 5 April 2018</a></li>
                            <li><a href="#"><i class="fa fa-comment"></i> 10 Comments</a></li>
                        </ul>
                    </div>-->
                    <p><?php echo $news->description;?></p>
                </div>
            </div><?php } ?>
            
           
        </div>
    </div>
</section>
<!-- /Blog -->

<!-- Seens-As -->
<section class="seen_as">
	<div class="container">
        <div class="as_seen_logo">
        	<ul>
            	<li><a href="#"><img src="<?php echo base_url();?>assests/images/seen_as1.png" alt="image"></a></li>
                <li><a href="#"><img src="<?php echo base_url();?>assests/images/seen_as2.png" alt="image"></a></li>
                <li><a href="#"><img src="<?php echo base_url();?>assests/images/seen_as3.png" alt="image"></a></li>
                <li><a href="#"><img src="<?php echo base_url();?>assests/images/seen_as4.png" alt="image"></a></li>
                <li><a href="#"><img src="<?php echo base_url();?>assests/images/seen_as5.png" alt="image"></a></li>
            </ul>
        </div>
    </div>
</section>
<!-- /Seens-As -->

<footer id="footer">
	<div class="container">
    	<div class="row">
        	<div class="col-md-4">
            	<div class="footer_widgets">
	            	<div class="footer_logo">
    	            	<a href="#"><img src="<?php echo base_url();?>assests/images/logo.png" alt="logo"></a>
        	        </div>
            	    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                	<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
               </div>     
            </div>
            <div class="col-md-4">
            	<div class="footer_widgets">
					<h5>Usefull Links</h5>
                    <div class="footer_nav">
    	                <ul>
        					<li><a href="#">About Us</a> </li>
                            <li><a href="#">WhitePaper</a> </li>
                            <li><a href="#">News</a> </li>
                            <li><a href="#">Terms of Service</a> </li>
                            <li><a href="#">Privacy Policy</a> </li>
                            <li><a href="#">About Us</a> </li>
                            <li><a href="#">WhitePaper</a> </li>
                            <li><a href="#">News</a> </li>
                            <li><a href="#">Terms of Service</a> </li>
                            <li><a href="#">Privacy Policy</a> </li>
	                    </ul>
                    </div>
               </div>     
            </div>
            <div class="col-md-4">
            	<div class="footer_widgets">
					<h5>Help</h5>
                    <div class="contact_email"><a href="mailto:help@mmbtucoin.com">help@mmbtucoin.com</a></div>
                    <div class="follow_us">
                    	<h5>Follow Us</h5>
                        <ul>
                            <li><a href="#"> <i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"> <i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"> <i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"> <i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
               </div>     
            </div>
        </div>
    </div>
    <div class="footer_bottom">
	    <div class="container">
    		<p>&copy; 2018 MMBTU Coin. All rights reserved</p>
        </div>    
    </div>
</footer>

<!-- Scripts --> 
<script src="<?php echo base_url();?>assests/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assests/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assests/js/jquery.countdown.min.js"></script>
<script src="<?php echo base_url();?>assests/js/interface.js"></script>
<script src="<?php echo base_url();?>assests/js/particles.min.js"></script>
<script src="<?php echo base_url();?>assests/js/app.js"></script>
</body>
</html>