
function cb(data){
	var d = new Date();
	var n = d.getFullYear();

	var ctx_growth_user = document.getElementById("au").getContext('2d');
	var growth_user = new Chart(ctx_growth_user, {
			type: 'bar',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
						type: 'bar',
						label: "New user growth "+n,
						backgroundColor: ['red','orange','yellow','green','blue','indigo','violet','purple','pink',"AntiqueWhite",
						"Aqua"],
						data: data,
						borderColor: 'white',
						borderWidth: 0
					}
				]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
	});	
}
function with_drawl(data){
	var d = new Date();
	var n = d.getFullYear();
	var cr = $(".cr").val();

	var ctx_growth_user = document.getElementById("with_drawl").getContext('2d');
	var growth_user = new Chart(ctx_growth_user, {
			type: 'bar',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
						type: 'bar',
						label: "Withdrawl "+cr,
						backgroundColor: ['red','orange','yellow','green','blue','indigo','violet','purple','pink',"AntiqueWhite",
						"Aqua"],
						data: data,
						borderColor: 'white',
						borderWidth: 0
					}
				]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
	});	
}
function Today_ads(datas){
	// var cnt_user = [];

	// for (i = 0; i < 30; i++) {
	// 	cnt_user[i] = '"'+i+'"';
	// }
	var d = new Date();
	var n = d.getFullYear();
	var cr = $(".cr").val();

	var daly_ads_track = document.getElementById("today_ads").getContext('2d');
	new Chart(daly_ads_track, {
			type: 'bar',
			data: {
				labels: ["0","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"],
				datasets: [{
						type: 'bar',
						label: "Today ads view or clicks ",
						backgroundColor: ['red','orange','yellow','green','blue','indigo','violet','purple','pink',"AliceBlue",
						"AntiqueWhite",
						"Aqua",
						"Aquamarine",
						"Azure",
						"Beige",
						"Bisque",
						"BlanchedAlmond",
						"BlueViolet",
						"Brown",
						"BurlyWood",
						"CadetBlue",
						"Chartreuse",
						"Chocolate",
						"Coral",
						"CornflowerBlue",
						"Cornsilk",
						"Crimson",
						"Cyan",
						"DarkBlue",
						"DarkCyan",
						"DarkGoldenRod"],
						data: datas,
						borderColor: 'white',
						borderWidth: 0
					}
				]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
	});	
}

var base_url = $(".url").val();
var get_toDay_ads = function() {
    $.ajax({
      url: base_url+"Today_ads",
      type: 'POST',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
		  console.log(data)
		  Today_ads(data);
		//   growth_user.update();
      },
      error: function(data){
        console.log("Today_ads "+data);
      }
    });
  }
var updateChart = function() {
    $.ajax({
      url: base_url+"user_growth",
      type: 'POST',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
		  console.log(data)
		  cb(data);
		//   growth_user.update();
      },
      error: function(data){
        console.log(data);
      }
    });
  }
var withdraw = function() {
    $.ajax({
      url: base_url+"with_drawl",
      type: 'POST',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
		  console.log(data)
		  with_drawl(data);
		//   growth_user.update();
      },
      error: function(data){
        console.log(data);
      }
    });
  }
  
  updateChart();
  withdraw();
  get_toDay_ads();
  setInterval(() => {
    updateChart();
    withdraw();
    get_toDay_ads();
  }, 50000);
// barChart
var ctx_bar_chart = document.getElementById("barChart").getContext('2d');
var barChart = new Chart(ctx_bar_chart, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
				label: 'Amount received',
				data: [12, 19, 3, 5, 10, 5, 13, 17, 11, 8, 11, 9],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'				
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
});
