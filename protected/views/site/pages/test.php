<div class="ui-front">
<label for="searchbox">Search for your MP</label>
<input id="searchbox">
<button onClick="sendQuery()">Click here</button>
</div>
<div id="viewQuery">
     This is to view the query variable:
</div>

<script>

   	 function sendQuery() 
		{
			var request = $("#searchbox").val();
			console.log(request);
			$.ajax({
				url: "http://localhost/code/getrti/index.php?r=mps/mpData",
				dataType: "json",
				data: {
				      maxRows: 12,
				      query: request
				     }
				}).done(
					function(data){
						$("#viewQuery").append(data);
						console.log(data);
					});
		};


</script>
