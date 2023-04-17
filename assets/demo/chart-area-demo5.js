// retrieve data from the PHP file
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

fetch('data_temp.php')
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {
    // create chart
    var ctx = document.getElementById("myAreaChart5");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: data.map(function(d) { return d.created_at }),
        datasets: [{
          label: 'Temperature',
          data: data.map(function(d) { return d.temp }),
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  });
