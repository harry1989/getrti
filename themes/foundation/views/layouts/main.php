<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>getRTI</title>

  
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/foundation.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery-ui-1.10.3.custom.css">  
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/custom.css">  
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.9.1.js"></script>
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-1.10.3.custom.min.js"></script>
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/vendor/custom.modernizr.js"></script>
</head>
<body>

		<!-- Nav Bar -->
	<div class="row">
		<div class="large-12 ">
		
			<div class="row">
				
				<div class="large-2 columns">
				     <h1>
					<a href="http://localhost/index.php" class="logo">
					   getRTI
					</a>
					</h1>	
				</div>

				<div class="nav-bar large-10 columns" >
					<ul class="newnav" id="">
						<li class="newnav active"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">Home</a></li>
						<li class="newnav"><a href="<?php echo Yii::app()->createUrl('mps/findmp'); ?>">Find your MP</a></li>
						<li class="newnav"><a href="<?php echo Yii::app()->createUrl('site/page',array('view'=>'about')); ?>">About</a></li>
						<li class="mail"><span>Mail us at getrti@gmail.com</span></li>
					</ul>		  
				</div>
			</div>
				
			<hr />
		</div> 
	</div>
		<!-- End of Nav Bar -->

	<div class="row">
	  <div class="small-12 large-12 ">
	     <h1><small>Together for an Open Government</small></h1>
	     </div>

	</div>
      
	  


<div class="row">
      	  <hr />
	<div class="large-12 " role="content">
		<?php echo $content; ?>
	</div> <!-- End Main Content -->
  
  
 

  </div>

  <!-- End Main Content and Sidebar -->


	<!-- Footer -->

	  <footer class="row">
		<div class="large-12 ">
		  <hr>
		  <div class="row">
			<div class="large-6 ">
			  <p style="color:#8a8a8a">version 0.1</p>          
			</div>
			
			<div class="large-6 ">
				<p style="float:right;color:#8a8a8a">Creative Commons</p>
			</div>
			
		  </div>
		</div>
	  </footer>
  <!-- Footer -->

<!--
<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 ga('create', 'UA-42912587-1', 'getrti.org');
 ga('send', 'pageview');

</script>
-->
</body>
</html>
