


$(document).ready(function(){
    $.ajax({
        url: "http://localhost/work/admin/includes/linegraphdata.php",
        method:"GET",
        success:function(data){
          console.log(JSON.parse(data));
          var data=JSON.parse(data);
          var date = [];
          var cost = [];
          
            for (var i in data){
            date.push(data[i].EDate);
            cost.push(data[i].ExpenseCost); 
              
              
          }
          var chartdata = {
              labels: date,
              datasets : [
                  {
                    label: 'Expense',
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: cost,
                    
                      
                  }
              ]
          };

          var ctx = $("#myAreaChart");

          var lineGraph = new Chart(ctx,{
              type:'line',
              data: chartdata


          });
        },
        error: function(data){
            console.log(data);
        }
    });
});

