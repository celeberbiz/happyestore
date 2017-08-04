<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/animate.css') }}">
	<link rel="stylesheet" href="{{ url('css/sweetalert.css') }}">
	<link rel="stylesheet" href="{{ url('css/style.css') }}">
	
	<!--added new start-->
      <link rel="stylesheet" href="{{ url('css/bootstrap_proslid.css') }}">
      <link rel="stylesheet" href="{{ url('css/style_pro.css') }}">
<link rel="stylesheet" href="{{ url('css/stylead.css') }}">

 <!--added new finish-->

</head>
<body>

<div class="navigation">
	@yield('navigation')
</div>

<!--<div class="content">
	@if(Session::has('flash_message'))
		<div class="flash-message {{ Session::has('flash-warning') ? 'warning-message' : '' }}">
			{{ session('flash_message') }}
		</div>
	@endif
	@if(Session::has('alert-error'))
		<div class="alert-error"></div>
	@endif
	@if(Session::has('alert-success'))
		<div class="alert-success"></div>
	@endif
	@yield('content')
</div>-->

<!--main section2 start -->
<div class="content-bottom">
		<div class="btm-grids">
			<div class="col-md-4 btm-grid back-col1 text-center">
				<img src="img/bbbb.png" alt="">
			</div>
			<div class="col-md-4 btm-grid btm-wid">
				<h3>WELCOME TO OUR STORE</h3>
				<p>Nemo enim ipsam voluptatem 
				quia voluptas sit aspernatur 
				aut odit aut fugit, sed quia conse
				magni dolores eos qui ratione. Nemo enim ipsam voluptatem 
				quia voluptas sit aspernatur 
				aut odit aut fugit, sed quia conse
				magni dolores eos qui ratione.</p>
			</div>
			<div class="col-md-4 btm-grid back-col2 text-center">
				<img src="img/bbb1.png" alt="">
			</div>
			<div class="clearfix"></div>
		</div>
</div>

<!--main section2 finish -->

<!--fst slider new start -->
<div class="container arrivals arr">	
	 
		 <div class="arrival-grids">
		 <div class="col-md-2 welcome-left"><h2> New Arrivals</h2></div>
		 <div class="col-md-10">			 
			 <ul id="flexiselDemo1">
				 <li>
					 <a href="product.html"><img src="img/boy1.png" alt=""/>	
					 <div class="arrival-info">
						 <h4>Fusion Black Suits</h4>
						 <p>Rs 12000</p>
						 <span class="pric1"><del>Rs 18000</del></span>
						 <span class="disc">[12% Off]</span>					 </div>
					 </a>				 </li>
				 <li>
					 <a href="product.html"><img src="img/boy2.png" alt=""/>
						<div class="arrival-info">
						 <h4>Fusion Black Suits</h4>
						 <p>Rs 14000</p>
						 <span class="pric1"><del>Rs 15000</del></span>
						 <span class="disc">[10% Off]</span>					 </div>
					 </a>				 </li>
				 <li>
					 <a href="product.html"><img src="img/boy4.png" alt=""/>	
						<div class="arrival-info">
						 <h4>Platinum Waist Coat </h4>
						 <p>Rs 4000</p>
						 <span class="pric1"><del>Rs 8500</del></span>
						 <span class="disc">[45% Off]</span>					 </div>
					 </a>				 </li>
				 <li>
				    <a href="product.html"> <img src="img/boy5.png" alt=""/>	
						<div class="arrival-info">
						 <h4>Fusion Black Suits</h4>
						 <p>Rs 18000</p>
						 <span class="pric1"><del>Rs 21000</del></span>
						 <span class="disc">[8% Off]</span>					 </div>
					 </a>				 </li>
		   </ul>
		   </div>
						 
		  
	 </div>
</div>
<!--first slider finish -->

<!--second slider start -->

<div class="container arrivals arr">	
	 
		 <div class="arrival-grids">
		 <div class="col-md-2 welcome-left"><h2> Discounts for You
</h2></div>
		 <div class="col-md-10">			 
			 <ul id="flexiselDemo2">
				 <li>
					 <a href="product.html"><img src="img/girl1.png" alt=""/>	
					 <div class="arrival-info">
						  <h4>White Net Gowns</h4>
						 <p>Rs 12000</p>
						 <span class="pric1"><del>Rs 18000</del></span>
						 <span class="disc">[12% Off]</span>					 </div>
					 </a>				 </li>
				 <li>
					 <a href="product.html"><img src="img/girl2.png" alt=""/>
						<div class="arrival-info">
						 <h4>White Net Gowns</h4>
						 <p>Rs 14000</p>
						 <span class="pric1"><del>Rs 15000</del></span>
						 <span class="disc">[10% Off]</span>					 </div>
					 </a>				 </li>
				 <li>
					 <a href="product.html"><img src="img/girl3.png" alt=""/>	
						<div class="arrival-info">
						 <h4>White Net Gowns</h4>
						 <p>Rs 4000</p>
						 <span class="pric1"><del>Rs 8500</del></span>
						 <span class="disc">[45% Off]</span>					 </div>
					 </a>				 </li>
				 <li>
				    <a href="product.html"> <img src="img/girl4.png" alt=""/>	
						<div class="arrival-info">
						  <h4>White Net Gowns</h4>
						 <p>Rs 18000</p>
						 <span class="pric1"><del>Rs 21000</del></span>
						 <span class="disc">[8% Off]</span>					 </div>
					 </a>				 </li>
		   </ul>
		   </div>
	 </div>
</div>
<!--second slider finish -->

<!--video part start -->
<div class="content">
		<div class="video-1">
	<div data-vide-bg="video/cloths" style="position: relative;">
<div style="position: absolute; z-index: -1; top: 0px; left: 0px; bottom: 0px; right: 0px; overflow: hidden; background-size: cover; background-repeat: no-repeat; background-position: 50% 50%; background-image: none;"><video autoplay="" loop="" muted="" style="margin: auto; position: absolute; z-index: -1; top: 50%; left: 50%; transform: translate(-50%, -50%); visibility: visible; width: 1352px; height: auto;"><source src="video/cloths.mp4" type="video/mp4"><source src="video/cloths.webm" type="video/webm"><source src="video/cloths.ogv" type="video/ogg"></video></div>
    <div class="container center-container">
<div class="slid-info">
<h3 class="wow lightSpeedIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: lightSpeedIn;">Aliquam faucibus purus at mollis elementum</h3>
				
			</div>
    </div>
</div>
</div>
  <script src="{{ url('js/jquery.vide.min.js')}}"></script>      

</div>
<script src="{{ url('js/jquery.minvideo.js')}}"></script>
<!--video part finish -->



<!--main section start -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
		<div class="col-md-5 bb-grids bb-left-agileits-w3layouts">
			<a href="women.html"><div class="bb-left-agileits-w3layouts-inner">
					<h3>SALE</h3>
					<h4>upto<span>75%</span></h4>
			</div></a>
		</div>
		<div class="col-md-4 bb-grids bb-middle-agileits-w3layouts">
			<a href="shoes.html"><div class="bb-middle-top">
				<h3>SALE</h3>
				<h4>upto<span>55%</span></h4>
			</div></a>
			<a href="jewellery.html"><div class="bb-middle-bottom">
				<h3>SALE</h3>
				<h4>upto<span>65%</span></h4>
			</div></a>
		</div>
		<div class="col-md-3 bb-grids bb-right-agileits-w3layouts">
			<a href="watches.html"><div class="bb-right-top">
				<h3>SALE</h3>
				<h4>upto<span>50%</span></h4>
			</div></a>
			<a href="handbags.html"><div class="bb-right-bottom">
				<h3>SALE</h3>
				<h4>upto<span>60%</span></h4>
			</div></a>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--main section finish -->


<!--<ad slider start>-->


<div class="adhead"><h3>Featured Brands</h3></div>	
<div class="slider1">
		<div class="arrival-grids">			 
			 <ul id="flexiselDemo11">
				 <li>
					 <a href="#"><img src="img/ad1.jpg" alt=""/>
					 </a>
				 </li>
				 <li>
						<a href="#"><img src="img/ad2.jpg" alt=""/>
					 </a>
				 </li>
				 <li>
					  <a href="#"><img src="img/ad3.jpg" alt=""/>
					 </a>
				 </li>
				 <li>
					  <a href="#"><img src="img/ad4.jpg" alt=""/>
					 </a>
				 </li>
				 <li>
					  <a href="#"><img src="img/ad5.jpg" alt=""/>
					 </a>
				 </li>
				 <li>
					  <a href="#"><img src="img/ad3.jpg" alt=""/>
					 </a>
				 </li>
				</ul>
				
							 
		</div>
	</div>
		<script src="{{ url('js/jquery-1.11.1.minad.js') }}"></script>
<script type="text/javascript">
				 $(window).load(function() {			
				  $("#flexiselDemo11").flexisel({
					visibleItems: 4,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover:true,
					enableResponsiveBreakpoints: true,
					responsiveBreakpoints: { 
						portrait: { 
							changePoint:480,
							visibleItems: 1
						}, 
						landscape: { 
							changePoint:640,
							visibleItems: 2
						},
						tablet: { 
							changePoint:768,
							visibleItems: 3
						}
					}
				});
				});
				</script>
                     <script src="{{ url('js/jquery.jquery.flexiselad.js')  }}"></script>
<!--<ad slider end>-->


<div class="social">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<span id="sub-msg">Subscribe to Newsletter : </span> <input type="text" id="sub-input" name="subscribe" placeholder="Enter your email address">
			</div>
			<div class="col-md-offset-2 col-md-4 col-sm-offset-2 col-sm-4 col-xs-12">
				Join : 
				<a href="#" class="fa fa-facebook-square fa-2x" id="facebook"></a> 
				<a href="#" class="fa fa-twitter-square fa-2x" id="twitter"></a>
				<a href="#" class="fa fa-instagram fa-2x" id="instagram"></a>
				<a href="#" class="fa fa-google-plus-square fa-2x" id="googleplus"></a>
				<a href="#" class="fa fa-pinterest-square fa-2x" id="pinterest"></a>
			</div>
		</div>
	</div>
</div>

<div class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 col-sm-4 col-xs-6">
				<ul>
					<li class="Heading">OVERVIEW</li>
					<li><a href="#">About</a></li>
					<li><a href="#">Shipping</a></li>
					<li><a href="#">Returns</a></li>
					<li><a href="#">Terms</a></li>
					<li><a href="#">Privacy</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-4 col-xs-6">
				<ul>
					<li class="Heading">ACCOUNT</li>
					<li><a href="{{ url('/auth/register') }}">Create Account</a></li>
					<li><a href="{{ url('/auth/login') }}">Log In</a></li>
					<li><a href="{{ url('/dashboard') }}">Purchases</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-4 col-xs-6">
				<ul>
					<li class="Heading">OUR STORES</li>
					<li><a href="#">San Francisco, CA</a></li>
					<li><a href="#">Los Angeles, CA</a></li>
					<li><a href="#">Seattle, WA</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-4 col-xs-6">
				<ul>
					<li class="Heading">ADDRESS</li>
					<li>580 California Street</li>
					<li>16 Floor, San Fransisco, CA</li>
					<li></li>
					<li>Phone : 666-666-666</li>
					<li>FAX : 666-666-666</li>
				</ul>
			</div>
		</div>
		<hr>
		<div class="copyright">Copyright © 2016 Developed By <a href="http://codecanyon.net/user/nerd01">Nerd01</a>. All Rights Rserved.</div>
	</div>
</div>

<script src="{{ url('js/jquery-2.1.3.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/sweetalert.min.js')  }}"></script>

<!--added new script start-->
<script src="{{ url('js/jquery.min.proslid.js')  }}"></script>

<script type="text/javascript">
				 $(window).load(function() {			
				  $("#flexiselDemo1").flexisel({
					visibleItems: 5,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover:true,
					enableResponsiveBreakpoints: true,
					responsiveBreakpoints: { 
						portrait: { 
							changePoint:480,
							visibleItems: 1
						}, 
						landscape: { 
							changePoint:640,
							visibleItems: 2
						},
						tablet: { 
							changePoint:768,
							visibleItems: 3
						}
					}
				});
				});
				</script>
<script type="text/javascript">
				 $(window).load(function() {			
				  $("#flexiselDemo2").flexisel({
					visibleItems: 5,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover:true,
					enableResponsiveBreakpoints: true,
					responsiveBreakpoints: { 
						portrait: { 
							changePoint:480,
							visibleItems: 1
						}, 
						landscape: { 
							changePoint:640,
							visibleItems: 2
						},
						tablet: { 
							changePoint:768,
							visibleItems: 3
						}
					}
				});
				});
				</script>
<script src="{{ url('js/jquery.flexisel.proslid.js')  }}"></script>

<!--added new script finish-->				
<script>
	$(document).ready(function(){

		if ($('.alert-error').length) {
			swal({   
				title: "Error!",   
				text: "{{ Session::get('alert-error') }}",   
				type: "error",   
				timer: 3000,
				showConfirmButton: false
			});
		};
		if($('.alert-success').length){
			swal({   
				title: "Success",   
				text: "{{ Session::get('alert-success') }}",   
				type: "success",
				timer: 3000,
				showConfirmButton: false  
			});
		};
	});
</script>
<script src="{{ url('js/script.js') }}"></script>




@yield('footer')
</body>
</html>