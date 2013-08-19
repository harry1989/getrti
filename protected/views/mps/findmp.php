				<div class="row"> <!-- Search Bar-->
					<div class="large-12 columns panel" >					  
						<div class="row collapse center" >

							<div class="small-4 columns">
							  <p style="line-height: 2.3;">
							     Search for your MP:
							  </p>
							</div>

							<div class="small-6 columns ui-front">
							  <input type="text" placeholder="Ex: Hyderabad" id="searchbox">
							</div>

							<div class="small-2 columns" style="float:left">
							  <a href="#" class="button success prefix">Search</a>
							</div>
						
					  	</div>
					</div>
				</div>


<script>
$( "#searchbox" ).autocomplete({
   	source: function( request, response ) 
		{
			$.ajax({
				url: "<?php echo $url ?>",
				dataType: "json",
				data: {
				      maxRows: 12,
				      query: request.term
				     },

				}).done(
					function(data){
						console.log(data);
						response( $.map( data, function(item) {
											return {
													label: item.name+','+item.party+','+item.house,
													value: item.name,
													id:item.id       
											  	}
											}
								)
							);						
					})
		},
	minLength: 2,
	select: function (event,ui) {
      console.log(ui.item);
      var url = "<?php echo Yii::app()->createAbsoluteUrl('campaigns/view',array('id'=>3)); ?>";
      url=url+'&mp_id='+ui.item.id;
      window.location.replace(url);
		}
});

</script>
