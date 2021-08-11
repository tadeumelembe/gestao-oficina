@include('template.js')
<!-- apexcharts -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>



<script src="{{ asset('assets/js/pages/dashboard.init.js')}}"></script>


<script src="assets/js/app.js"></script>

<script>
    var options = {
          series: [{
          name: 'Total Empréstimos',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
          name: 'Faixa Etária',
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['fff', 'fff', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        yaxis: {
          title: {
            text: '$ (thousands)'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#column_chart"), options);
        chart.render();
</script>

<script>
    $('#first-row-section').hide();
    //$('.sums-section').hide();
    $(document).ready(function() {

        $.ajax({
            url: '/dashboard/total',
            async: true
        }).done(function(data, status) {

          let profits = Number(data.data.revenue['total']) - Number(data.data.totalExpenses);
            $('#jobs-total').html(data.data.jobs['total']);
            $('#jobs-this-month').html('+'+(data.data.jobs['thisMonth']));
            $('#jobs-last-month').html((data.data.jobs['lastMonth']));

            $('#cars-total').html((data.data.cars));

            $('#revenue').html((data.data.revenue['total']).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' MT');
            $('#expenses').html((data.data.totalExpenses).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' MT');
            $('#profits').html((profits).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' MT');
            
            $('#revenue-total').html((data.data.revenue['total']).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' MT');
            $('#revenue-this-month').html('+'+(data.data.revenue['thisMonth']).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' MT');
            $('#revenue-last-month').html((data.data.revenue['lastMonth']).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' MT');

            $('.spinner-first-row').hide();
            $('#first-row-section').fadeIn(500);
        });

    });
</script>