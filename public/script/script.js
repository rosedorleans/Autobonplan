
document.addEventListener('DOMContentLoaded', function () {
    const chart = Highcharts.chart('container', {

        chart: {
          type: 'column'
        },
      
        title: {
          text: ''
        },
      
        xAxis: {
          categories: ['Janv. 2021',
                        'Fev. 2021',
                        'Mars 2021',
                        'Avr. 2021',
                        'Mai 2021',
                        'Juin 2021',
                        'Juil. 2021',
                        'Aout 2021',
                        'Sept. 2021',
                        'Oct. 2021',
                        'Nov. 2021',
                        'Dec. 2021']
        },
      
        yAxis: {
          allowDecimals: false,
          min: 0,
          title: {
            text: ''
          },
          stackLabels: {
            enabled: true,
            style: {
              fontWeight: 'bold',
              color: ( // theme
                Highcharts.defaultOptions.title.style &&
                Highcharts.defaultOptions.title.style.color
              ) || 'gray'
            }
          }
        },
        
      
        tooltip: {
          formatter: function () {
            return '<b>' + this.x + '</b><br/>' +
              this.series.name + ': ' + this.y + '<br/>' +
              'Total: ' + this.point.stackTotal;
          }
        },
      
        plotOptions: {
          column: {
            stacking: 'normal'
          },
          dataLabels: {
            enabled: true
          }
        },
      
        series: [{
          name: 'Serie 1',
          data: [7, 7, 12, 6, 7, 5, 2 ,1, 0, 0, 0, 0],
          color: '#fed289',
        }, {
          name: 'Serie 2',
          data: [0, 0, 0, 1, 5, 2, 6, 1, 0, 0, 0, 0],
          color: '#f5b44c',

        }]
      });
    });

