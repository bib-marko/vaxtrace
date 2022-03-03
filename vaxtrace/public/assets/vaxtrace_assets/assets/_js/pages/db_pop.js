/*
 *  Document   : db_pop.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Pop Dashboard Page
 */

// Chart.js Charts, for more examples you can check out http://www.chartjs.org/docs
class DbPop {
  /*
   * Init Charts
   *
   */
  static initPopChartJS() {
    // Set Global Chart.js configuration
    Chart.defaults.color = '#7c7c7c';
    Chart.defaults.scale.grid.color = "#f1f1f1";
    Chart.defaults.scale.grid.zeroLineColor = "#f1f1f1";
    Chart.defaults.scale.display = true;
    Chart.defaults.scale.beginAtZero = true;
    Chart.defaults.elements.line.borderWidth = 2;
    Chart.defaults.elements.point.radius = 6;
    Chart.defaults.elements.point.hoverRadius = 12;
    Chart.defaults.plugins.tooltip.radius = 2;
    Chart.defaults.plugins.legend.display = false;

    // Chart Containers
    let chartPopLinesCon = jQuery('.js-chartjs-pop-lines');
    let chartPopLinesCon2 = jQuery('.js-chartjs-pop-lines2');

    // Chart Variables
    let chartPopLines, chartPopLines2;

    // Lines Charts Data
    let chartPopLinesData = {
      labels: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
      datasets: [
        {
          label: 'This Week',
          fill: true,
          backgroundColor: 'rgba(56,56,56,.4)',
          borderColor: 'rgba(56,56,56,.9)',
          pointBackgroundColor: 'rgba(56,56,56,.9)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgba(56,56,56,.9)',
          data: [75, 88, 34, 49, 52, 89, 96]
        }
      ]
    };

    let chartPopLinesOptions = {
      tension: .4,
      scales: {
        y: {
          suggestedMin: 0,
          suggestedMax: 100
        }
      },
      interaction: {
        intersect: false,
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: function (context) {
              return ' ' + context.parsed.y + ' Sales';
            }
          }
        }
      }
    };

    let chartPopLinesData2 = {
      labels: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
      datasets: [
        {
          label: 'This Week',
          fill: true,
          backgroundColor: 'rgba(230,76,60,.4)',
          borderColor: 'rgba(230,76,60,.9)',
          pointBackgroundColor: 'rgba(230,76,60,.9)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgba(230,76,60,.9)',
          data: [750, 880, 398, 420, 590, 630, 930]
        }
      ]
    };

    let chartPopLinesOptions2 = {
      tension: .4,
      scales: {
        y: {
          suggestedMin: 0,
          suggestedMax: 1000
        }
      },
      interaction: {
        intersect: false,
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: function (context) {
              return ' $' + context.parsed.y;
            }
          }
        }
      }
    };

    // Init Charts
    if (chartPopLinesCon.length) {
      chartPopLines = new Chart(chartPopLinesCon, {type: 'line', data: chartPopLinesData, options: chartPopLinesOptions});
    }

    if (chartPopLinesCon2.length) {
      chartPopLines2 = new Chart(chartPopLinesCon2, {type: 'line', data: chartPopLinesData2, options: chartPopLinesOptions2});
    }
  }

  /*
   * Init functionality
   *
   */
  static init() {
    this.initPopChartJS();
  }
}

// Initialize when page loads
jQuery(() => {
  DbPop.init();
});
