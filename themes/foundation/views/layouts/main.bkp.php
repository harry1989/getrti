<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>getRTI</title>

  
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/foundation.css">
  

  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/vendor/custom.modernizr.js"></script>
  <style>
ul.newnav
	{
		margin-left: 6%;
		list-style: none;
		font-size: 1em;
		line-height: 1.6;
		font-family: inherit;
		
	}
	li.newnav{
		float:left;
		margin-right:4%;
	}
	input.custom.checkbox {
	
		display: inline-block;
		width: 16px;
		height: 16px;
		position: relative;
		top: -1px;
		vertical-align: middle;
		border: solid 1px #cccccc;
		background: white;
		margin: 6px 6px 4px 0px ;
	}
  
	ul.tasklist
	{
		margin-left: 6%;
		list-style: none;
		font-size: 1em;
		line-height: 1.6;
		font-family: inherit;
	}

	ul.tasklist > li{
		float:left;
		margin-right:4%;
	}

	ul.tasklist > li.disabled {
		
	}

	aside.sidenavcol
	{
		margin-left: 10px;
		padding: 0px 0px 0px 0px;
		background: url(<?php echo Yii::app()->theme->baseUrl; ?>/img/todo.png) repeat-y 29px 0;
	}
	
	ul.side-nav
	{
		margin-left:5px;
	
	}
	
	p.test
	{
		
	}
	
	a.logo
	{
	color:black;
	}
	
  </style>

</head>
<body>

	<!-- Nav Bar -->
	
  <div class="row">
    <div class="large-12 columns">
		<div class="row">
		<h1 class="large-2 columns"><a href="index.php" class="logo">getRTI</a></br></h1>	
		
			<div class="nav-bar large-10 columns"
			style="margin-top:2.5%"
			>		
			<?php $this->widget('zii.widgets.CMenu',array(
				'htmlOptions' => array( 'class' => 'newnav' ),
				'id'=>'',
				'items'=>array(
					array('label'=>'Home', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'newnav')),
					array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'),'itemOptions'=>array('class'=>'newnav')),
					array('label'=>'Contact', 'url'=>array('/site/contact'),'itemOptions'=>array('class'=>'newnav')),
					array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'newnav')),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'newnav'))
				),
			)); ?>
			
		  </div>
		</div>
	  
	  
		<h1><small>Together for an Open Government</small></h1>
      
	  
      <hr />
    </div>
  </div>
<div class="row">
	<div class="large-8 columns" role="content">
		<?php echo $content; ?>
	</div> <!-- End Main Content -->
  
  
 
    <!-- Sidebar -->

    <aside class="large-4 columns"> 

      <h5>Roadmap</h5>
        <div class="row">
	  <div class="large-12 columns">
		<label for="checkbox2"><input disabled class="custom checkbox" type="checkbox" id="checkbox2" >	[Technical] Browse and filter files based on different criteria	</label>
<label for="checkbox2"><input disabled class="custom checkbox" type="checkbox" id="checkbox2" >	[Technical] Search integration	</label>
<label for="checkbox2"><input disabled class="custom checkbox" type="checkbox" id="checkbox2" >	[Technical] OpenCalias integration	</label>
<label for="checkbox2"><input disabled class="custom checkbox" type="checkbox" id="checkbox2" >	[Technical] Workflow to correct the extracted text to support accuracy improvement to 100% and enable redaction.	</label>
<label for="checkbox2"><input disabled class="custom checkbox" type="checkbox" id="checkbox2" >	[Technical] Automated extraction of text from scanned files using OCR tools	</label>
<label for="checkbox2"><input disabled class="custom checkbox" type="checkbox" id="checkbox2" >	[Technical] Adding functionality to upload and tag/categorize scanned files and creating a content repository	</label>
<label for="checkbox2"><input disabled class="custom checkbox" type="checkbox" id="checkbox2" >	[Technical] Basic site running  - About getRTI and team	</label>
<label for="checkbox2"><input disabled class="custom checkbox" type="checkbox" id="checkbox2" >	[Technical] Website content	</label>
<label for="checkbox2"><input disabled class="custom checkbox" type="checkbox" id="checkbox2" >	[ Scanning ] Tagging & Sorting existing documents	</label>
<label for="checkbox2"><input disabled class="custom checkbox" type="checkbox" id="checkbox2" >		</label>
		
		


	  </div>
	</div>
    </aside>

    <!-- End Sidebar -->
  </div>

  <!-- End Main Content and Sidebar -->



  <!-- Footer -->

  <footer class="row">
    <div class="large-12 columns">
      <hr />
      <div class="row">
        <div class="large-6 columns">
          <p>&copy; Copyright no one at all. Go to town.</p>
        </div>
		<!--
        <div class="large-6 columns">
          <ul class="inline-list right">
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
            <li><a href="#">Link 4</a></li>
          </ul> 
        </div>
		-->
      </div>
    </div>
  </footer>
<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 ga('create', 'UA-42912587-1', 'getrti.org');
 ga('send', 'pageview');

</script>
</body>
</html>
