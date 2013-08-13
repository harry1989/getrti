
  <script>
  $(function() {
    
	$( "#accordion" ).accordion({
	  heightStyle: "content",
	  collapsible: "true",
	  active: "false",
	  activate: function(event, ui) {
		$("#accordion").accordion("option", "disabled", true);
	  }
    });
	/*
	 $(".trigger").click(function() {
        $("#accordion").accordion("enable").accordion("activate", parseInt($(this).data("index"), 10)).accordion("disable");
    });
	*/
  });
  </script>

		<div class="row"> <!-- Main Page Content and Sidebar -->
			<div class="large-12 columns" role="content"> <!-- Main Blog Content -->			  

				<style>
				p
				{
				text-align:justify;
				}
				</style>
				<div class="row issue">

    <h3><?php echo $issue->description; ?> </h3>
     
     </div>
		  
				<div class="row"> <!-- Row 1 -->
					
					<div class="large-12 columns panel_custom">
						<div class="large-4 columns">
						    <h5><?php echo $mp->name; ?> </h5>  
							<div class="panel">
     <h6><?php echo $mp->party; ?>, <?php echo $mp->constituency; ?></h6>						
     <p ><?php echo $mp->p_telephone ?> ,<?php echo $mp->d_telephone ?></p>
								<p ><?php echo $mp->p_address ?></p>
     
							</div>
						</div>

						<div class="large-4 columns">
						  
							<h5 >The position of the MP on the issue</h5>
							
							
							<div class="panel_custom">
								<p> <?php echo $pos; ?> </p>
							</div>
						  
						</div>

						<div class="large-4 columns">
						  
							<h5 >The voters position on the issue:</h5>
							<div class="row">
							  <div class="panel_for large-6 columns">
								<h5 style="color: white; text-align: center;">0 for</h5>
							  </div>
							  
							  <div class="panel_against large-6 columns">
								<h5 style="color: white; text-align: center;">1000 against</h5>
							  </div>
							</div>
							
						  
						</div>
					</div>
				</div>


     <?php echo $this->renderPartial('_form', array('model'=>$Position)); ?>

	
			<div class="row">

				<div class="large-2 columns" style="width: 13%;">
				  <p><img src="http://placehold.it/100x100"></p>
				</div>
				
				<div class="large-7 columns " >
					<h5>Rakesh Kumar Dubbudu</h5>
					<p>Reading the "The Bihar Reorganisation Act, 2000" (Creation of Jharkhand) to understand the nitty gritties involved in bifurcation of a state into two. #Telangana</p>
				</div>
				
				<div class="large-3 columns" style="width: 15%;">
				  
				  <a href="#" class="tiny button secondary" style="height: 75px;font-size: 21px;width: 112px;padding-top: 26px;">Like
				  </a>
				  <p class="panel_likes">285</p>
			  </div>
				
			</div>
			
			
			<!-- content -->
				 <!-- Sidebar -->
			<br>
			
		</div> <!-- End Main Content -->
  
	</div>
