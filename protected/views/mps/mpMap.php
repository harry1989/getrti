    
    <script src="<?php echo Yii::app()->baseUrl ?>/js/D3js/d3.v3.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/topojson.js"></script>
    <script src="<?php echo Yii::app()->baseUrl ?>/themes/foundation/js/foundation.min.js"></script>
    <style>
      path {
        stroke: #555;
        stroke-width: 0.25px;
        fill: none;
        pointer-events: all;
      }
      #body path {
        cursor: pointer;
      }
      .land {
        fill: #222;
      }
      .boundary {
        fill: none;
        stroke: none;
        stroke-width: .5px;
      }
      .overlay {
       fill: none;
        pointer-events: all;
      }
      #body {
        float: left;
      }
      #state {
        float: right;
      }
      circle {
        cursor: pointer;
      }
      div.tooltip {   
        display: block;
	color: #000;
        position: absolute;           
        text-align: left;           
        width: 200px;
        height: auto;
        padding: 0.8em;             
        font: 13px sans-serif;        
        background: #fff;   
        border: 1px solid #333;
        pointer-events: none;
        font-size: 12px;
      }
      div.tooltip .title, div.documentsinfo .title {
        font-size: 1.2em;
        font-weight: bold;
      }
      div.tooltip .moreinfo .highlight {
        color: red;
      }
      div.tooltip.active {
        pointer-events: all;
      }
      div.tooltip label {
        padding: 1em;
      }
      </style>


    <div class="row" style="max-width: 100%;">
        <div id="body"></div>
    	<div id="state"></div>
    </div>
    <div id="myModal" class="reveal-modal">
      <h2>Awesome. I have it.</h2>
      <p class="lead">Your couch.  It is mine.</p>
      <p>Im a cool paragraph that lives inside of an even cooler modal. Wins</p>
      <a class="close-reveal-modal">&#215;</a>
    </div>
    <script type="text/javascript">
    var width = $(window).width() - 100;

    var basex = -1890;
    var statebasex = -1500;
    var statebasey = 500;
    var basey = 500;
    var height = $(window).height() - 10;
    var projection = d3.geo.equirectangular()
              .center([0, 0])
              .scale(1200);  
    var svg = d3.select("#body").append("svg")
            .attr("width", width / 2)
            .attr("height", height);
    var path = d3.geo.path().projection(projection);
    
    d3.select("#body").style("width", width/2 + "px");
    var svg1 = d3.select("#state").append("svg").attr("width", width/2).attr("height", height);
    d3.select("#state").style("width", width/2 + "px");
    
    var statescale = 4000;
    var stateprojection = d3.geo.equirectangular().center([0, 0]).scale(statescale);
    var statepath = d3.geo.path().projection(stateprojection);
    var g = svg.append("g").attr("transform", "translate("+basex+", "+basey+")");
    
    var sg = svg1.append("g").attr("id", "stateg").attr("transform", "translate(-1900, 500)");
    var india_mp_data = null;
    var selected_state = null;
    d3.json('mapdata/india_data_processed.json', function(error, topology){
      india_mp_data = topojson.feature(topology, topology.objects.india_shape);
    });
    d3.json('mapdata/india_adm1.json', function(error, topology){
      var cdata = topojson.feature(topology, topology.objects.india_adm1_shape);
      var map = g.selectAll("path")
          .data(cdata.features)
          .enter()
          .append("path")
          .attr("d", path)
          .on("mouseover", function(d){
            if (selected_state !== d) {
              d3.select(this).style("fill", "steelblue");
            }
          })
          .on("mouseout", function(d){
            if (selected_state !== d) {
              d3.select(this).style("fill", "none");
            }
          })
          .on("click", function(d){
	    map.style("fill", "none");
            d3.select(this).style("fill", "green");
            selected_state = d;
            var first_pointx = d.properties.zoom_points[0];
            var first_pointy = d.properties.zoom_points[1];
            sg.attr("transform",  "translate("+first_pointx+","+first_pointy+")");
            var statei = india_mp_data.features.filter(function(o){return (o.properties.NAME_1 == d.properties.NAME_1)});
            sg.selectAll("path").remove();
            sg.selectAll("circle").remove();
            var sgmap = sg.selectAll("path").data(statei).enter().append("path").attr("d", statepath);
            
            
            mps = sgmap.filter(function(d){ 
              return d.properties.mp;
            });

             mps[0].forEach(function(o, i){
               //console.log(o);
               sg.append("circle").attr("r", 5)
                  .attr("transform", function(){
                    var centroid = statepath.centroid(o.__data__),
                    x = centroid[0],
                    y = centroid[1];
                    return "translate("+x+", "+y+")";
                  })
                  .style("fill", "steelblue")
                  .on("mouseover", function(){
                    var obj = o.__data__.properties.mp;
                    display_tooltip(obj, this);
                  })
                  .on("mouseout", function(d){
                    hoverdiv.transition()
                          .duration(100)      
                          .style("opacity", 0);
                  }).on("click", function(d){
		    update_dialogbox(o.__data__);
		    $('#myModal').foundation('reveal', 'open');
		  });
             });
            
          });
      
  
    });
    
     var hoverdiv = d3.select("body").append("div")   
        .attr("class", "tooltip")               
        .style("opacity", 0);
    
    function update_dialogbox(d) {
    	
    }

    function display_tooltip(d, ele) {
        hoverdiv.transition()
            .duration(200)
            .style("opacity", 1);
        var ele_cords = $(ele).offset();
        var div_html = _get_tooltip_content(d);  
        var centroid = statepath.centroid(d);
        var left = ele_cords.left;
        var top = ele_cords.top - 20;
        var dummyele = $("<div class='tooltip' style='width:300px;position:absolute;left:-1000px;'>"+div_html+"</div>").appendTo('body');
        var h = dummyele.height();
        var w = dummyele.width();
        top = top - (h + 20)
        left = left - 100;
        /*if ((left + 300) >= w) {
          left = centroid[0] - 150;
        }
        if (top + 250 >= h ) {
          top = centroid[1] - 100;
        }*/
        hoverdiv.html(div_html)
            .style("left", left + "px")
            .style("top", top + "px"); 
      }
      function _get_tooltip_content(d) {
        var div_html = "<div>";
        div_html += "<div class='title'>"+d.Name+"</div>";
        div_html += "<div class='summary'>";
        div_html += "<div><strong>Constituency: </strong>"+d.Constituency+"</div>"
        div_html += "<div><strong>Political Party: </strong>"+d['Political party']+"</div>"
        div_html += "<div><strong>Gender: </strong>"+d['Gender']+"</div>"
        div_html += "<div><strong>Educational qualifications: </strong>"+d['Educational qualifications']+"</div>"
        div_html += "<div><strong>Age: </strong>"+d['Age']+"</div>"
        div_html += "</div>";
        div_html += "</div>";
        return div_html;
      }
      
      $(document).ready(function(){
	$('a.close-reveal-modal').click(function(){
  	  $('#myModal').foundation('reveal', 'close');
	});
      });

    
    </script>