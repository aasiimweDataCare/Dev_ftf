

	$(function () {    

		// Create the chart
		
            
		$('#container').highcharts({
			chart: {
				type: 'column'
			},
			title: {
				text: 'Data Performance Maps'
			},
			xAxis: {
				type: 'category'
			},

			legend: {
				enabled: true
			},
			
			

			plotOptions: {
				series: {
					borderWidth: 0,
					dataLabels: {
						enabled: true,
						style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'blue'
                    }
						
					}
				}
			},

			series: [{
				name: 'North',
				//colorByPoint: true,
				color: '#9E0825',
				data: [{
					name: '2013',
					y: 1,
					color: '#9E0825',
					drilldown: 'north-2013'
				}, {
					name: '2014',
					y: 2,
					
					
					drilldown: 'north-2014'
				}, {
					name: '2015',
					y: 3,
					
					drilldown: 'north-2015'
				},{
					name: '2016',
					y: 4,
					drilldown: 'north-2016'
				},{
					name: '2017',
					y: 5,
					drilldown: 'north-2017'
				},{
					name: '2018',
					y: 6,
					drilldown: 'north-2018'
				}]
			}, {
				name: 'West',
				//colorByPoint: true,
				color: '#001E55',
				data: [{
					name: '2013',
					y: 7,
					color: '#001E55',
					drilldown: 'west-2013'
				}, {
					name: '2014',
					y: 8,
					drilldown: 'west-2014'
				}, {
					name: '2015',
					y: 9,
					drilldown: 'west-2015'
				},{
					name: '2016',
					y: 10,
					drilldown: 'west-2016'
				},{
					name: '2017',
					y: 11,
					drilldown: 'west-2017'
				},{
					name: '2018',
					y: 12,
					drilldown: 'west-2018'
				}]
			},{
				name: 'East',
				//colorByPoint: true,
				color: '#88A848',
				data: [{
					name: '2013',
					y: 13,
					color: '#88A848',
					drilldown: 'east-2013'
				}, {
					name: '2014',
					y: 14,
					drilldown: 'east-2014'
				}, {
					name: '2015',
					y: 15,
					drilldown: 'east-2015'
				},{
					name: '2016',
					y: 16,
					drilldown: 'east-2016'
				}, {
					name: '2017',
					y: 17,
					drilldown: 'east-2017'
				}, {
					name: '2018',
					y: 18,
					drilldown: 'east-2018'
				}]
			},{
				name: 'Central',
				//colorByPoint: true,
				color: '#70BAD9',
				data: [{
					name: '2013',
					y: 19,
					color: '#70BAD9',
					drilldown: 'central-2013'
				}, {
					name: '2014',
					y: 20,
					drilldown: 'central-2014'
				}, {
					name: '2015',
					y: 22,
					drilldown: 'central-2015'
				},{
					name: '2016',
					y: 21,
					drilldown: 'central-2016'
				}, {
					name: '2017',
					y: 23,
					drilldown: 'central-2017'
				}, {
					name: '2018',
					y: 24,
					drilldown: 'central-2018'
				}]
			}],
			drilldown: {
				_animation: {
					duration: 2000
				},
				
				//Start of drill down
				series: [{
					id: 'north-2013',
					name: '2013',
					data: [
						['Coffee', 4],
						['Maize', 2],
						['Beans', 1]
					]
				}, {
					id: 'west-2013',
					name: '2013',
					data: [
						['Coffee', 4],
						['Maize', 2],
						['Beans', 2]
					]
				}, {
					id: 'east-2013',
					name: '2013',
					data: [
						['Coffee', 4],
						['Maize', 2],
						['Beans', 2]
					]
				},{
					id: 'central-2013',
					name: '2013',
					data: [
						
						['Coffee', 5],
						['Maize', 6],
						['Beans', 2]
					]
				}, {
					id: 'north-2014',
					name: '2014',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},{
					id: 'west-2014',
					name: '2014',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},{
					id: 'east-2014',
					name: '2014',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},{
					id: 'central-2014',
					name: '2014',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},

				

				{
					id: 'north-2015',
					name: '2015',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},{
					id: 'west-2015',
					name: '2015',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},{
					id: 'east-2015',
					name: '2015',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},{
					id: 'central-2015',
					name: '2015',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},



				{
					id: 'north-2016',
					name: '2016',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},{
					id: 'west-2016',
					name: '2016',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},{
					id: 'east-2016',
					name: '2016',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},{
					id: 'central-2016',
					name: '2016',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},
				
				
				{
					id: 'north-2017',
					name: '2017',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},{
					id: 'west-2017',
					name: '2017',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},{
					id: 'east-2017',
					name: '2017',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},{
					id: 'central-2017',
					name: '2017',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},
				
				
				{
					id: 'north-2018',
					name: '2018',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},{
					id: 'west-2018',
					name: '2018',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},{
					id: 'east-2018',
					name: '2018',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				},{
					id: 'central-2018',
					name: '2018',
					data: [
						['Coffee', 1],
						['Maize', 5],
						['Beans', 5]
					]
				}]
				
				//End of Drill Downs
				
			}
		})
	});


