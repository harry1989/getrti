	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    
	<script>
		$(function() {
			function getList(){
				$.getJSON('data.json',function(data){
				$('#checklist').empty();
				$.each(data, function(entryIndex, entry){					
					html ='<tr>';
					html +='<td><input class="' + entry['flag'] + '" type="checkbox"></td>';
					html += '<td>' + entry['item'] + '</td></tr>';
					$('#checklist').append(html);
				});						   
			});
		}
		 var timer = setInterval(getList, 100);

    //run the getTweets function on document.ready
		getList();
		});
	</script>



<!-- Main Blog Content -->
<div class="row">
	<div class="small-12 large-12 ">
		<h1><small>Together for an Open Government</small></h1>
	</div>
</div>

<div class="row">
  <div class="large-12" role="content"	>
	  
	<article>
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
</div>
<!--

	<aside class="checklist large-4 columns"> 	
	
	<h4>Roadmap</h4>
	<hr>
	<div class="row">
		<div class="large-12 columns" >
			<table width="100%" border="0" id="checklist">
			  
			</table>
		</div>
	</div>
	</aside>
-->

</div>