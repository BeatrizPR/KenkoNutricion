$(document).ready(function () {
  $("#chartGoalMonthly").submit(function (e) {
    e.preventDefault();
    var data = $("#chartGoalMonthly").serialize();
    $.ajax({
      cache: false,
      url: 'http://localhost/aplicacion/objective/createChartObj',
      data: data,
      type: 'POST',
      dataType: 'json',
      success: function (data) {
        //console.log(data);
        var monthObj = [];
        var total = [];

        for (var i in data) {
          //console.log(data[i]);

          monthObj.push(data[i]['mes']);
          total.push(data[i]['total']);
          //console.log("Mesesssss"+monthObj);
         
        }
        
         //console.log(monthObj);
         //console.log(total);

        var chartdata = {
          labels: monthObj,
          datasets: [
            {
              label: 'Total del objetivo cumplido',
              backgroundColor: ['rgb(255, 99, 142)',
              'rgb(255, 162, 51)',
              'rgb(255, 242, 51)',
              'rgb(164, 222, 101)',
              'rgb(101, 222, 140)',
              'rgb(101, 222, 186)',
              'rgb(80, 186, 224)',
              'rgb(177, 95, 240)',
              'rgb(241, 122, 214)',
              'rgb(245, 39, 61)'
              ],
              borderColor: 'rgba(200, 200, 200, 0.75)',
              hoverBackgroundColor: 'rgb(245, 39, 61)',
              hoverBorderColor: 'rgb(245, 39, 61)',
              data: total
            }
          ]
        };

        //var ctx = $("#mycanvas");
        var ctx = document.getElementById("mycanvas").getContext('2d');

        var barGraph = new Chart(ctx, {
          type: 'bar',
          data: chartdata,
          options: {
            responsive: true,
            maintainAspectRatio: false,
            }
          });
          $(".chartContainer").css({"height": "300px", "padding":"50px"});
          //$(".chartContainer").css("padding", "50px");
        },
      error: function () {
        console.log("Ha habido un problema");
      }
    
      });
    })

  });


  $(document).ready(function () {
    $("#chartTotalGoal").submit(function (e) {
      e.preventDefault();
      var data = $("#chartTotalGoal").serialize();
      $.ajax({
        cache: false,
        url: 'http://localhost/aplicacion/objective/createTotalChartObj',
        data: data,
        type: 'POST',
        dataType: 'json',
        success: function (data) {
          //console.log(data);
          var totalObj = [];
          var total = [];
  
          for (var i in data) {
            console.log(data[i]);
  
            totalObj.push(data[i]['totalObj']);
            total.push(data[i]['total']);
            //console.log("Mesesssss"+monthObj);
           
          }
          
           //console.log(totalObj);
           //console.log(total);
  
          var chartdata = {
            labels: totalObj,
            datasets: [
              {
                label: 'Total del objetivo cumplido',
                backgroundColor: ['rgb(255, 99, 142)',
                'rgb(255, 162, 51)',
                'rgb(255, 242, 51)',
                'rgb(164, 222, 101)',
                'rgb(101, 222, 140)',
                'rgb(101, 222, 186)',
                'rgb(80, 186, 224)',
                'rgb(177, 95, 240)',
                'rgb(241, 122, 214)',
                'rgb(245, 39, 61)'
                ],
                borderColor: 'rgba(200, 200, 200, 0.75)',
                hoverBackgroundColor: 'rgb(245, 39, 61)',
                hoverBorderColor: 'rgb(245, 39, 61)',
                data: total
              }
            ]
          };
  
          //var ctx = $("#mycanvas");
          var ctx = document.getElementById("myChart").getContext('2d');
  
          var barGraph = new Chart(ctx, {
            type: 'pie',
            data: chartdata,
            options: {
              responsive: true,
              //maintainAspectRatio: false,
              }
            });
          },
        error: function () {
          console.log("Ha habido un problema");
        }
      
        });
      })
  
    });
  