
		<div class="row"> <!-- Main Page Content and Sidebar -->
			<div class="large-12 columns" role="content"> <!-- Main Blog Content -->			  

				<style>
				p
				{
				text-align:justify;
				}
				</style>
				<div class="row issue">

    <h3><?php echo $campaign->title; ?> </h3>
     
     </div>
		  
				<div class="row"> <!-- Row 1 -->
					
					<div class="large-12 columns panel_custom">
			    <h3><?php echo $campaign->description; ?> </h3>
							
						  
						</div>
					</div>
				</div>

				<div class="row form">
     <?php echo $this->renderPartial('_form', array('model'=>$newPosition,'issue_id'=>$issue_id)); ?>
     	   				      </div>
				<div class="row">
     <?php echo $this->renderPartial('positions', array('model'=>$positionsProvider)); ?>
	 

				</div>
	
			
			<!-- content -->
				 <!-- Sidebar -->
			<br>
			
		</div> <!-- End Main Content -->
  
	</div>
