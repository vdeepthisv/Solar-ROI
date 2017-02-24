
angular.module('Calculatedetails', [])
    .controller('formController', ['$scope', function($scope) {
      	$scope.list = [];
   
      	$scope.submit = function() {

			
			//inputs provided by user
			var Systemsize = $scope.Systemsize;
			var Monthlybill=$scope.Monthlybill;
			var Monthlyconsumption=$scope.Monthlyconsumption;
			
			//non-solar
			var Yearlybill = Monthlybill*12;
			var Yearlybill25 = Yearlybill*25;

			var Yearlyconsumption = Monthlyconsumption*12;
			var Onekwhcost = (Monthlyconsumption/Monthlybill);
			var Yearlyconsumption25 = Yearlyconsumption *25;


			//With Solar
			var solarhours = 756;
			var solarhoursperday = solarhours/12;
			var Panelcost= 25000;

			var solarproduction=solarhoursperday*Systemsize*365;
			var solarproductionpermonth=solarproduction/365;
			
			console.log(solarproduction);


			var solarproductionpermonthwithtax=solarproductionpermonth*0.80;
			var solarproductionperyearwithtax=solarproduction*0.80;
			
			console.log(solarproductionperyearwithtax);
			var yearlysolarpower = solarhours*Systemsize*Onekwhcost;
		
			var Excesspower =solarproductionperyearwithtax-Yearlyconsumption;

			

		if (Yearlyconsumption>solarproductionperyearwithtax)
			{	
			var billforexcessamount=Onekwhcost*Excesspower;
			var billforexcessamount1=billforexcessamount*12;
			var billforexcessamount25=billforexcessamount1*25;
			var Solarbill=billforexcessamount1;
			var Solarbill25=Solarbill*25;
	
			var savedamount=0.80*Onekwhcost*Excesspower + yearlybill;
		}
		else
		{
			var Solarbill=0.80*(Panelcost/12);
			var Solarbill25=Solarbill*25;

		}
	//	taxbenifit= 0.20 * Panelcost ;
	//	tax=taxbenifit;

		var Moneyback=Solarbill25-Yearlybill25;

		var savings=[];
		var year=[];

		var solar=[];
		var nonsolar=[];
		

		
		for (i=1; i<=25; i++){
			//tax+=savedamount;
			year.push(i);
			//savings.push(tax);
			solar.push(i*Monthlybill*12);
			nonsolar.push(Math.max(0,Panelcost-(Panelcost*i)/15));
			
			//Moneyback.push(Moneyback-(nonsolar-solar)*i);
		}
		
		
			
			//var formatsolar=solar[25].toFixed(2);

			$('.displayresults').show();
			//solarGraph2(year, solar, nonsolar);

			//Non-solar
			$('.Yearlybill').text(Math.round(Yearlybill).toFixed(2));
			$('.Yearlybill25').text(Math.round(Yearlybill25).toFixed(2));
			$('.Yearlyconsumption').text(Math.round(Yearlyconsumption).toFixed(2));
			$('.Yearlyconsumption25').text(Math.round(Yearlyconsumption25).toFixed(2));


			


			//Solar

			$('.solarhours').text(Math.round(solarhours).toFixed(2));	
			$('.yearlysolarpower').text(Math.round(yearlysolarpower).toFixed(2));
			$('.Panelcost').text(Math.round(Panelcost).toFixed(2));
			$('.Excesspower').text(Math.round(Excesspower).toFixed(2));

			$('.solarproductionperyearwithtax').text(Math.round(solarproductionperyearwithtax).toFixed(2));
			$('.Solarbill25').text(Math.round(Solarbill25).toFixed(2));			

			$('.Solarbill').text(Math.round(Solarbill).toFixed(2));
			$('.Solarbill25').text(Math.round(Solarbill25).toFixed(2));
			
			$('.Moneyback').text(Math.round(Moneyback).toFixed(2));
			

		
			//$('.savedamount').text(savedamount);
			//$('.solarhours').text(solarhours);		
			//$('.solar').text(Math.round(solar[24]).toFixed(2));
	
			//$('.nonsolar').text(Math.round(nonsolar[24]).toFixed(2));
			//$('.Monthlybill').text(Math.round(Monthlybill).toFixed(2));
			//$('.initialcost').text(Math.round(initialcost).toFixed(2));
			//$('.taxbenifit').text(Math.round(taxbenifit).toFixed(2));
			

			
			//$('.savedamount').text(Math.round(savedamount[24]).toFixed(2));
			$('.Displayresults').show();

			//Plotgraph(year, savings);
			Plotgraphseries(year, solar, nonsolar);
			//console.log(savings);
			//console.log(year);

			//Plotgraphseries2(year, initialcost, nonsolar);
			Plotgraphseries3(year,solar);

			//console.log(initialcost);
			//console.log(nonsolar);

      	};
    }]);


function Plotgraphseries(year, nonsolar, solar) {
    $('#graph').highcharts({
        title: {
            text: 'Saved amount using Solar',
            x: -20 //center
        },
        subtitle: {
            text: 'for 25 years',
            x: -20
        },
        xAxis: {
            categories: year
        },

	xAxis: {
            title: {
                text: 'year'
            },
            plotLines: [{
                value: 0,
                color: '#808090'
            }]
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



function Plotgraphseries3(year, solar) {
    $('#graph3').highcharts({
        title: {
            text: 'Amount saved',
            x: -20 //center
        },
        subtitle: {
            text: 'using solar',
            x: -20
        },
	xAxis: {
            text: year
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

	xAxis: {
            title: {
                text: 'year'
            },
            plotLines: [{
                value: 0,
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
           
            name: 'Amount($)',
            data: solar
        }]
    });
};

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
			year.push(i);
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


