// Morris.js Charts sample data for SB Admin template

$(function() {
	 // Line Chart
 Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'morris-line-chart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [
		
		
		
		
{year:'2014',employees:1},{year:'2015',employees:2},
		
		],
        // The name of the data record attribute that contains x-visitss.
        xkey: 'year',
        // A list of names of data record attributes that contain y-visitss.
        ykeys: ['employees'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Employees'],
		 barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
      
       // resize: true
    });
   
    // Donut Chart
    Morris.Donut({ element: 'morris-donut-chart',
        data: [
		
		
		
		
{label: "Current Employees",value:6},{label: "Ex-Employees",value:1}
		
		
		
		
		],resize: true
    });

	
	
     // Donut Chart2
    Morris.Donut({
        element: 'morris-donut-chart2',
        data: [
		
		
		
	
	
{label: "Active Employees",value:6},{label: "In Active Employees",value:1},{label: "On Leave Employees",value:0}
	
	
		
		
		],
       
	   resize: true
    });

   
   



});
