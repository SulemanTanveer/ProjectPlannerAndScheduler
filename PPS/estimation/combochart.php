<script src="https://www.google.com/jsapi"></script>
<script src="../js/jquery.min.js"></script>  


<ul id="series" style="list-style: none">

  <label>
    <input  type="checkbox" name="series" value="1" checked="true" /> Temperature</label>
  <label>
    <input  type="checkbox" name="series" value="2" checked="true" /> Humidity</label>
  <label>
    <input  type="checkbox" name="series" value="3" checked="true" /> Runs</label>
	<input  type="checkbox" name="series" value="4" checked="true" /> Wind</label>
    
</ul>
 <div id="nodata" style="visibility:hidden" >No any option is checked</div>
<div id="chart_div"></div>








<script>
google.load("visualization", "1", {
  packages: ["corechart"]
});
google.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
  
    ['Date', 'Temperature', 'Humidity', 'Runs','wind'],
    ['A', 80.8, 39.6, 10,44],
    ['A', 80.4, 40.3, 10,44],
    ['A', 79.9, 40.7, 10,44],
    ['A', 79.5, 41.1, 50,44],
    ['A', 79.2, 42.2, 50,44],
    ['A', 78.8, 42.1, 10,44],
	 ['A', 79.9, 40.7, 10,44],
    ['A', 79.5, 41.1, 50,44],
    ['A', 79.2, 42.2, 50,44],
    ['A', 78.8, 42.1, 10,44], ['A', 79.9, 40.7, 10,44],
    ['A', 79.5, 41.1, 50,44],
    ['A', 79.2, 42.2, 50,44],
    ['A', 78.8, 42.1, 10,44], ['A', 79.9, 40.7, 10,44],
    ['A', 79.5, 41.1, 50,44],
    ['A', 79.2, 42.2, 50,44],
    ['A', 78.8, 42.1, 10,44], ['A', 79.9, 40.7, 10,44],
    ['A', 79.5, 41.1, 50,44],
    ['A', 79.2, 42.2, 50,44],
    ['A', 78.8, 42.1, 10,44], ['A', 79.9, 40.7, 10,44],
    ['A', 79.5, 41.1, 50,44],
    ['A', 79.2, 42.2, 50,44],
    ['A', 78.8, 42.1, 10,44], ['A', 79.9, 40.7, 10,44],
    ['A', 79.5, 41.1, 50,44],
    ['A', 79.2, 42.2, 50,44],
    ['A', 78.8, 42.1, 10,44],
    ['A', 78.6, 43.1, 50,44],
    ['A', 78.3, 43.2, 10,44]
  ]);
 
  

  showEvery = 1;
  var seriesColors = ['purple','red', 'blue', 'orange', 'green'];
  var options = {
    strictFirstColumnType: true,
    colors: seriesColors,
    width: '80%',
    height: '60%',
    'legend': {
      'position': 'top'
    },
    hAxis: {
      slantedTextAngle: 45,
      slantedText: true,
      showTextEvery: showEvery
    },
    vAxis: {
      viewWindowMode: 'explicit',
      viewWindow: {
        max: 100,
        min: 0
      }
    },
    textStyle: {
      fontName: 'Ariel',
      fontSize: 40,
      bold: false
    },
   
    
    series: {
		
      1: {
        type: 'bars'
      },
	   2: {
        type: 'bars'
      },
	   0: {
        type: 'bars'
      }
	  ,
	   3: {
        type: 'bars'
      }
    },
    chartArea: {
      left: 40,
      top: 20,
      width: "100%"
    }
  };

  var view = new google.visualization.DataView(data);
  var chart = new google.visualization.LineChart($('#chart_div')[0]);
  chart.draw(view, options);

  $('#series').find(':checkbox').change(function() {
    var cols = [0];
    var colors = [];
	var flag=false;
    options.series = null;
    $('#series').find(':checkbox:checked').each(function() {
      var value = parseInt($(this).attr('value'));
	    flag=true;
      cols.push(value);
      colors.push(seriesColors[value - 1]);
	   options.series = {
			 1: {
        type: 'bars'
      },
	   2: {
        type: 'bars'
      },
	   0: {
        type: 'bars'
      }
	  ,
	   3: {
        type: 'bars'
      }
		};
      
	  
    });
	if(flag==false)
	{
		 document.getElementById("nodata").style.visibility = "visible";
		 document.getElementById("chart_div").style.visibility = "hidden";
		
	}else{
		document.getElementById("nodata").style.visibility = "hidden";
		document.getElementById("chart_div").style.visibility = "visible";
    view.setColumns(cols);
    options.colors = colors;
    chart.draw(view, options);
	}
  });

 

}


</script>