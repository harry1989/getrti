<!DOCTYPE html>
<!-- saved from url=(0017)http://localhost/ -->
<html><!--<![endif]-->

<head>
	
  <title>getRTI</title>
  
  
  <link rel="stylesheet" href="css/foundation.css">
  <style>

	ul.newnav
	{
		margin-left: 6%;
		list-style: none;
		font-size: 15pt;
		line-height: 1.6;
		font-family: inherit;		
	}
	li.newnav a
	{
	color:black;
	}
	
	li.mail
	{
		float: right;
		background: #6aa84f;
		color: white;
		padding: 1%;
		padding-right: 6%;
		padding-left: 6%;
		margin-top: -1%;
		margin-right: -4%;
	}
	
	li.newnav{
		float:left;
		margin-right:4%;
	}
	ul.side-nav
	{
		margin-left:5px;
	
	}
	a.logo 
	{
		color:black;
	}
	
	aside.checklist
	{
		background-color: #f3f3f3;
		margin-top: -9.9%;
	}
	
	aside.checklist h4
	{	
		padding-top:8%;
	}
	
	div.big_button
	{
		width: 35.4%;
		margin-left: 67.7%;
		margin-top: -8%;
		font-size: 11pt;		
		padding-bottom: 2%;
		background-color: white;
	}
	
	#checklist
	{
	background: none;
	margin-bottom: 1.25em;
	}
  
  
  </style>
<!--
  <script type="text/javascript">
	$(document).ready(function() {
		$('#car').click(function() {
			$.getJSON('data.json',function(data){
				$('#content').empty();
				$.each(data, function(entryIndex, entry){
					var html = '<div class="data">';					  
					html += '<h3>' + entry['company'] + '</h3>';
					html += '<div class="product">' + entry['product'] + '</div>';					
					html += '<div class="type">' + entry['type'] + '</div>';										
					$('#content').append(html);
				});						   
			});
			return false;
		});
	});
	</script>
  -->
   <script src="http://code.jquery.com/jquery-1.9.1.js"></script><script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script >
		$(function() {
				$.getJSON('data.json',function(data){
				$('#checklist').empty();
				$.each(data, function(entryIndex, entry){					
					html ='<tr>';
					html +='<td><input class="' + entry['flag'] + '" type="checkbox"></td>';
					html += '<td>' + entry['item'] + '</td></tr>';
					$('#checklist').append(html);
				});						   
			});
	
  });
	
	</script>
	
</head>
<body>

		<!-- Nav Bar -->
	<div class="row">
		<div class="large-12 columns">
		
				<div class="row">
					
					<h1 class="large-2 columns" style="padding-left: 2%;">
						<a href="http://localhost/index.php" class="logo">
							<img src="img/getrti.png">
						</a>
						<br>
					</h1>	

					<div class="nav-bar large-10 columns" style="margin-top:3%">
						<ul class="newnav" id="">
							<li class="newnav active"><a href="index.php">Home</a></li>
							<li class="newnav"><a href="http://getrti.org/campaigns/rtia">Find your MP</a></li>
							<li class="newnav"><a href="#">About</a></li>
							<li class="newnav"><a href="page4.php">Page4</a></li>
							<li class="mail"><span>Mail us at getrti@gmail.com</span></li>
						</ul>		  
					</div>

				</div>
				
				<hr style="margin:0;border: solid #ebebeb; border-width: 1px 0 0;">			

				<h1><small>"Together for an Open Government"</small></h1>
				
				<div class="big_button">
					<a href="http://getrti.org/campaigns/rtia" class="button">
						Locate your constituency &amp; Ask your MP to vote against RTI Amendment
					</a>      
				</div>
				
				<div id="content">
					<h3>What is getRTI?</h3>
					<hr>
				</div>
				
			</div> <!-- End of Nav Bar -->
			
		<div class="row">
			<div class="large-8 columns" role="content"> <!-- Main Page Content and Sidebar -->
			<!-- Main Blog Content -->
			  
				<style>
				p{
				text-align:justify;
				}
				</style>

				<article>
					<p>
					The RTI Act was passed in 2005 and since then, applications have been filed
					and replies received in huge numbers. So a lot of information and data is
					out in the public domain but unfortunately not in one place that is
					searchable by those who want to use it. It is either with
					individuals/organisations but also with government departments/public
					bodies that have dispensed with the information. Information will be
					public in the true sense if it is <strong>accessible</strong> and <strong>reusable</strong>.</p>
					<p>
					So the objectives of the portal are:<br>
					1. Make RTI info publicly available in the true sense of public<br>
					2. Organise it into a neatly searchable format: Central/state, Departments,
					Public bodies, Commissions etc.<br>
					3. Reusable format<br>
					4. Make filing easier using the online platform<br>
					</p>
					<p>
					Soochna ka Haq. Your Right to Know. A simple but powerful slogan that got us the Right to Information Act in 2005. RTI has empowered people to ask questions of their government and breach the culture of secrecy pervading the government. This process of transparency has been powered entirely by the citizen. By You.
					</p>

					<p>
					Now is the time to take this process of transparency a step further. Massive amount of information has been liberated using the RTI, exposing scams, corruption and blatant abuse of power .  Yet, a lot of this lies scattered in the hands of people and organisations that have filed for such information. We felt it was necessary to build a public database of all RTI requests and replies in a easy, searchable and reusable format to make information open in the real sense. Thus GetRTI.org was born.
					</p>

					<p>
					GetRTI  is both a crowd-sourced public repository of all RTI information as well as a filing platform. You can use this platform to search from hundreds and eventually thousands of requests as well as reuse data. If you have ever filed an RTI request, you can scan and upload the document onto the website in easy and simple steps. 
					</p>

					<p>
					At the end of it all, we aim to create an active space for citizen engagement using the RTI to make government more transparent and accountable. As always, this process will also be driven by the citizen. By you.
					</p>

					<p>
					This site has been conceived, built and operated entirely in public interest by volunteers who are non-partisan and are passionate and committed to the idea of Open Government. Together, we can and we shall achieve a government that is answerable to its citizens.
					</p>
				</article>
			</div><!-- content -->
				 <!-- Sidebar -->
			<br>
			<aside class="large-4 columns checklist"> 	
			<h4>Roadmap</h4>
			<hr>
			<div class="row">
				<div class="large-12 columns" >
					<table width="100%" border="0" id="checklist">
					  
					</table>
				</div>
			</div>
			</aside>
		</div> <!-- End Main Content -->
  
	</div>

  <!-- End Main Content and Sidebar -->
	<!-- Footer -->

	  <footer class="row">
		<div class="large-12 columns">
		  <hr>
		  <div class="row">
			<div class="large-6 columns">
			  <p style="color:#8a8a8a">version 0.1</p>          
			</div>
			
			<div class="large-6 columns">
				<p style="float:right;color:#8a8a8a">Creative Commons</p>
			</div>
			
		  </div>
		</div>
	  </footer>

	</body>
</html>