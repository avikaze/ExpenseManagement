


$(document).ready(function(){
    $.ajax({
        url: "http://localhost/work/admin/includes/donutgraphdata.php",
        method:"GET",
        success:function(data){
          console.log(JSON.parse(data));
          var data=JSON.parse(data);
          var category = [];
          var cost = [];
          
            for (var i in data){
            category.push(data[i].ExpenseCategoryName);
            cost.push(data[i].ExpenseCost); 
              
              
          }
          // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            var chartdata = {
                labels: category,
                datasets : [
                    {
                      label: 'Expense',
                      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                      hoverBorderColor: "rgba(234, 236, 244, 1)",
    
                      data: cost
                    }
                ]
            };
  
            var ctx = $("#myPieChart");
  
            var lineGraph = new Chart(ctx,{
                type:'doughnut',
                data: chartdata,
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                      backgroundColor: "rgb(255,255,255)",
                      bodyFontColor: "#858796",
                      borderColor: '#dddfeb',
                      borderWidth: 1,
                      xPadding: 15,
                      yPadding: 15,
                      displayColors: false,
                      caretPadding: 10,
                    },
                    legend: {
                      display: true
                    },
                    cutoutPercentage: 80,
                  },
  
  
            });
          },
        error: function(data){
            console.log(data);
        }
    });
});

