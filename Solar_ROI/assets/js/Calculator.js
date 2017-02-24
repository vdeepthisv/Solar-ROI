
angular.module('Calculatedetails', [])
    .controller('formController', ['$scope', function($scope) {
      	$scope.list = [];
   
      	$scope.submit = function() {
			var Systemsize = $scope.Systemsize;
			var Monthlybill=$scope.Monthlybill;
			var Monthlyconsumption=$scope.Monthlyconsumption;

			var yearlybill = Monthlybill*12;
			
			var yearlynonsolarpower=Monthlyconsumption*12;

			var Onekwhcost = (Monthlyconsumption/Monthlybill);
			var solarhours = 1000;
			var Panelcost=1000;
			var initialcost=1780;
			var ftax=20;
	
			var yearlysolarpower = solarhours*Systemsize*Onekwhcost;
		
			var Excesspower = yearlysolarpower-yearlynonsolarpower;

			

		if (yearlysolarpower>yearlynonsolarpower)
			{

			savedamount=0.80*Onekwhcost*Excesspower + yearlybill;
		}
		else
		{
			savedamount=yearlysolarpower*Onekwhcost;
		}
		taxbenifit= 0.20 * Panelcost + Math.min(1000,0.20*Panelcost);
		tax=taxbenifit;

		var savings=[];
		var year=[];

		var solar=[];
		var nonsolar=[];

		console.log(savings);
		console.log(year);
		for (i=1; i<=25; i++){
			tax+=savedamount;
			year.push("Year"+i);
			savings.push(tax);
			nonsolar.push(i*Monthlybill*12);
			solar.push(i*Math.max(0, (yearlysolarpower-yearlynonsolarpower )*Onekwhcost ));
		}

			//var formatsolar=solar[25].toFixed(2);

			$('.displayresults').show();
			//solarGraph2(year, solar, nonsolar);
			$('.yearlybill').text(Math.round(yearlybill).toFixed(2));
			$('.savedamount').text(savedamount);
			$('.solarhours').text(solarhours);		
			$('.solar').text(Math.round(solar[24]).toFixed(2));
	
			$('.nonsolar').text(Math.round(nonsolar[24]).toFixed(2));
			$('.Monthlybill').text(Math.round(Monthlybill).toFixed(2));
			$('.initialcost').text(Math.round(initialcost).toFixed(2));
			$('.taxbenifit').text(Math.round(taxbenifit).toFixed(2));
			$('.ftax').text(ftax);

			//$('.powerCon').text(Math.round(yearlyGridPower).toFixed(2));
			$('.savedamount').text(Math.round(savedamount[24]).toFixed(2));
			$('.Displayresults').show();

			Plotgraph(year, savings);
			Plotgraphseries(year, solar, nonsolar);
			console.log(savings);
			console.log(year);

			Plotgraphseries2(year, initialcost, nonsolar);
			Plotgraphseries3(year, initialcost, nonsolar);

			console.log(initialcost);
			console.log(nonsolar);

      	};
    }]);
/*
$(function(){
	$(".Displaydetails").submit(function(e){
		e.preventDefault();
	
		var Systemsize = $("#Systemsize").val();
		var Monthlybill= $("#Monthlybill").val();
		var Monthlyconsumption= $("#Monthlyconsumption").val();

		var yearlybill = Monthlybill*12;
		var yearlynonsolarpower=Monthlyconsumption*12;

		var Onekwhcost = (Monthlyconsumption/Monthlybill);
		var solarhours = 1000;
		var Panelcost=1000;

		var yearlysolarpower = Sunlight*Systemsize*Onekwhcost;
		
		var Excesspower = yearlysolarpower*yearlybill;

		if (yearlysolarpower>yearlynonsolarpower)
			{

			savedamount=0.80*Onekwhcost*Excesspower + yearlybill;
		}
		else
		{
			savedamount=yearlysolarpower*Onekwhcost;
		}
		taxbenifit= 0.20 * Panelcost + Math.min(1000,0.20*Panelcost);
		tax=taxbenifit;

		var savings=[];
		var year=[];

		console.log(savings);
		console.log(year);
		for (i=1; i<=25; i++){
			tax+=savedamount;
			year.push("Year"+i);
			savings.push(tax);
		
				
			}
		
	});
})
*/

// $(function(){
// 	$(".Calculatedetails").submit(function(e){
// 		e.preventDefault();
		
// 		var Systemsize = $("#Systemsize").val();
// 		var Monthlybill= $("#Monthlybill").val();
// 		var Monthlyconsumption= $("#Monthlyconsumption").val();

// 		var yearlybill = Monthlybill*12;
// 		var yearlynonsolarpower=Monthlyconsumption*12;

// 		var Onekwhcost = (Monthlyconsumption/Monthlybill);
// 		var Sunlight = 1000;
// 		var Panelcost=1000;

// 		var yearlysolarpower = Sunlight*Systemsize*Onekwhcost;
		
// 		var Excesspower = yearlysolarpower*yearlybill;

// 		if (yearlysolarpower>yearlynonsolarpower)
// 			{

// 			savedamount=0.80*Onekwhcost*Excesspower + yearlybill;
// 		}
// 		else
// 		{
// 			savedamount=yearlysolarpower*Onekwhcost;
// 		}
// 		taxbenifit= 0.20 * Panelcost + Math.min(1000,0.20*Panelcost);
// 		tax=taxbenifit;

// 		var savings=[];
// 		var year=[];

// 		console.log(savings);
// 		console.log(year);
// 		for (i=1; i<=25; i++){
// 			tax+=savedamount;
// 			year.push("Year"+i);
// 			savings.push(tax);
		
				
// 			}
// 			Plotgraph(year,savings);

// 	});
// })

function Plotgraph(year,savings) {
console.log(1)
    $('#graph').highcharts({
        title: {
            text: 'Cost of solar vs. non-solar',
            x: -20 //center
        },
        subtitle: {
            text: ' for next 25 years',
            x: -20
        },
        xAxis: {
            categories: year
        },
        yAxis: {
            title: {
                text: 'Amount'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '$'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Solar',
            data: savings
        }]


    });



};
function Plotgraphseries(year, nonsolar, solar) {
    $('#graph').highcharts({
        title: {
            text: 'Cost of solar vs. non-solar',
            x: -20 //center
        },
        subtitle: {
            text: 'for 25 years',
            x: -20
        },
        xAxis: {
            categories: year
        },
        yAxis: {
            title: {
                text: 'Amount'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808090'
            }]
        },
        tooltip: {
            valueSuffix: '$'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Amount without solar',
            data: nonsolar
        },
        {
            name: 'Amount with solar',
            data: solar
        }]
    });
};


function Plotgraphseries2(year, initialcost, nonsolar) {
    $('#graph2').highcharts({
        title: {
            text: 'Amount saved by using Solar',
            x: -20 //center
        },
        subtitle: {
            text: 'for 25 years',
            x: -20
        },
        xAxis: {
            categories: year
        },
        yAxis: {
            title: {
                text: 'Savings'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808090'
            }]
        },
        tooltip: {
            valueSuffix: '$'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
       series: [{
            name: 'Amount with solar',
            data: nonsolar
        
        }]
    });
};

function Plotgraphseries3(year, initialcost, nonsolar) {
    $('#graph3').highcharts({
        title: {
            text: 'Amount saved by using Solar',
            x: -20 //center
        },
        subtitle: {
            text: 'for 25 years',
            x: -20
        },
        xAxis: {
            categories: year
        },
        yAxis: {
            title: {
                text: 'Savings'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808090'
            }]
        },
        tooltip: {
            valueSuffix: '$'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
       series: [{
            name: '',
            data: initialcost
        },
        {
            name: 'Amount with solar',
            data: nonsolar
        }]
    });
};

