

				<div class="row"> <!-- Search Bar-->
					<div class="large-12 columns panel" >					  
						<div class="row collapse center" style="padding-left: 14%;margin-bottom: -2%;">

							<div class="small-2 columns">
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
				url: "http://localhost/code/getrti/index.php?r=mps/mpData",
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
			//TODO: doing nothing ... need to figure this out
			console.log(ui.item);
		}
});

</script>
