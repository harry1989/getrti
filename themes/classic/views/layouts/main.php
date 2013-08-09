<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,800" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Oleo+Script:400" rel="stylesheet" type="text/css" />
	
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/config.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/skel.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/skel-panels.min.js"></script>
	
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skel-noscript.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style-desktop.css" />
	


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>



	
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Kevin Jasti', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<!-- Header Wrapper -->
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">
						
							<!-- Header -->
								<header id="header">
								
									<!-- Logo -->
										<div id="logo">
											<h1><a href="#" id="logo">Verti</a></h1>
											<span>A responsive site template by HTML5 UP</span>
										</div>
									
									<!-- Nav -->
										<nav id="nav">
											<ul>
												<li class="current_page_item"><a href="index.html">Welcome</a></li>
												<li><a href="left-sidebar.html">Left Sidebar</a></li>
												<li><a href="right-sidebar.html">Right Sidebar</a></li>
												<li><a href="no-sidebar.html">No Sidebar</a></li>
											</ul>
										</nav>
								
								</header>

						</div>
					</div>
				</div>
			</div>
	
	<?php echo $content; ?>

	<div class="clear"></div>

	

		<!-- Footer Wrapper -->
			<div id="footer-wrapper">
				<footer id="footer" class="container">
					<div class="row">
						<div class="3u">
						
							<!-- Links -->
								<section class="widget-links">
									<h2>Random Stuff</h2>
									<ul class="style2">
										<li><a href="#">Etiam feugiat condimentum</a></li>
										<li><a href="#">Aliquam imperdiet suscipit odio</a></li>
										<li><a href="#">Sed porttitor cras in erat nec</a></li>
										<li><a href="#">Felis varius pellentesque potenti</a></li>
										<li><a href="#">Nullam scelerisque blandit leo</a></li>
									</ul>
								</section>
						
						</div>
						<div class="3u">
						
							<!-- Links -->
								<section class="widget-links">
									<h2>Random Stuff</h2>
									<ul class="style2">
										<li><a href="#">Etiam feugiat condimentum</a></li>
										<li><a href="#">Aliquam imperdiet suscipit odio</a></li>
										<li><a href="#">Sed porttitor cras in erat nec</a></li>
										<li><a href="#">Felis varius pellentesque potenti</a></li>
										<li><a href="#">Nullam scelerisque blandit leo</a></li>
									</ul>
								</section>
						
						</div>
						<div class="3u">
						
							<!-- Links -->
								<section class="widget-links">
									<h2>Random Stuff</h2>
									<ul class="style2">
										<li><a href="#">Etiam feugiat condimentum</a></li>
										<li><a href="#">Aliquam imperdiet suscipit odio</a></li>
										<li><a href="#">Sed porttitor cras in erat nec</a></li>
										<li><a href="#">Felis varius pellentesque potenti</a></li>
										<li><a href="#">Nullam scelerisque blandit leo</a></li>
									</ul>
								</section>
						
						</div>
						<div class="3u">
						
							<!-- Contact -->
								<section class="widget-contact last">
									<h2>Contact Us</h2>
									<ul>
										<li><a href="#" class="twitter">Twitter</a></li>
										<li><a href="#" class="facebook">Facebook</a></li>
										<li><a href="#" class="dribbble">Dribbble</a></li>
										<li><a href="#" class="googleplus">Google+</a></li>
									</ul>
									<p>1234 Fictional Road Suite #5432<br />
									Nashville, Tennessee 00000-0000<br />
									(800) 555-0000</p>
								</section>
						
						</div>
					</div>
					<div class="row">
						<div class="12u">
							<div id="copyright">
								&copy; Untitled. All rights reserved. | Images: <a href="http://fotogrph.com/">fotogrph</a> + <a href="http://iconify.it/">Iconify.it</a> | Design: <a href="http://html5up.net/">HTML5 UP</a>
							</div>
						</div>
					</div>
				</footer>
			</div>

	</body>
</html>
