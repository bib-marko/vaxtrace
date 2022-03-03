/*
 *  Document   : be_comp_charts.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Charts Page
 */

class BeCompCharts {
  /*
   * Randomize Easy Pie Chart values
   *
   */
  static initRandomEasyPieChart() {
    jQuery('.js-pie-randomize').on('click', e => {
      jQuery(e.currentTarget)
              .parents('.block')
              .find('.pie-chart')
              .each((index, element) => {
                jQuery(element).data('easyPieChart').update(Math.floor((Math.random() * 100) + 1));
              });
    });
  }

  /*
   * jQuery Sparkline Charts, for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-docs
   *
   */
  static initChartsSparkline() {
    // Chart Containers
    let slcLine1 = jQuery('.js-slc-line1');
    let slcLine2 = jQuery('.js-slc-line2');
    let slcLine3 = jQuery('.js-slc-line3');
    let slcBar1 = jQuery('.js-slc-bar1');
    let slcBar2 = jQuery('.js-slc-bar2');
    let slcBar3 = jQuery('.js-slc-bar3');
    let slcPie1 = jQuery('.js-slc-pie1');
    let slcPie2 = jQuery('.js-slc-pie2');
    let slcPie3 = jQuery('.js-slc-pie3');
    let slcTristate1 = jQuery('.js-slc-tristate1');
    let slcTristate2 = jQuery('.js-slc-tristate2');
    let slcTristate3 = jQuery('.js-slc-tristate3');


    // Line Charts
    let lineOptions = {
      type: 'line',
      width: '120px',
      height: '80px',
      tooltipOffsetX: -25,
      tooltipOffsetY: 20,
      lineColor: '#ffca28',
      fillColor: '#ffca28',
      spotColor: '#555',
      minSpotColor: '#555',
      maxSpotColor: '#555',
      highlightSpotColor: '#555',
      highlightLineColor: '#555',
      spotRadius: 2,
      tooltipPrefix: '',
      tooltipSuffix: ' Tickets',
      tooltipFormat: '{{prefix}}{{y}}{{suffix}}'
    };

    if (slcLine1.length) {
      slcLine1.sparkline('html', lineOptions);
    }

    lineOptions['lineColor'] = '#9ccc65';
    lineOptions['fillColor'] = '#9ccc65';
    lineOptions['tooltipPrefix'] = '$ ';
    lineOptions['tooltipSuffix'] = '';

    if (slcLine2.length) {
      slcLine2.sparkline('html', lineOptions);
    }

    lineOptions['lineColor'] = '#42a5f5';
    lineOptions['fillColor'] = '#42a5f5';
    lineOptions['tooltipPrefix'] = '';
    lineOptions['tooltipSuffix'] = ' Sales';

    if (slcLine3.length) {
      slcLine3.sparkline('html', lineOptions);
    }

    // Bar Charts
    let barOptions = {
      type: 'bar',
      barWidth: 8,
      barSpacing: 6,
      height: '80px',
      barColor: '#ffca28',
      tooltipPrefix: '',
      tooltipSuffix: ' Tickets',
      tooltipFormat: '{{prefix}}{{value}}{{suffix}}'
    };

    if (slcBar1.length) {
      slcBar1.sparkline('html', barOptions);
    }

    barOptions['barColor'] = '#9ccc65';
    barOptions['tooltipPrefix'] = '$ ';
    barOptions['tooltipSuffix'] = '';

    if (slcBar2.length) {
      slcBar2.sparkline('html', barOptions);
    }

    barOptions['barColor'] = '#42a5f5';
    barOptions['tooltipPrefix'] = '';
    barOptions['tooltipSuffix'] = ' Sales';

    if (slcBar3.length) {
      slcBar3.sparkline('html', barOptions);
    }

    // Pie Charts
    let pieCharts = {
      type: 'pie',
      width: '80px',
      height: '80px',
      sliceColors: ['#ffca28', '#9ccc65', '#42a5f5', '#ef5350'],
      highlightLighten: 1.1,
      tooltipPrefix: '',
      tooltipSuffix: ' Tickets',
      tooltipFormat: '{{prefix}}{{value}}{{suffix}}'
    };

    if (slcPie1.length) {
      slcPie1.sparkline('html', pieCharts);
    }

    pieCharts['tooltipPrefix'] = '$ ';
    pieCharts['tooltipSuffix'] = '';

    if (slcPie2.length) {
      slcPie2.sparkline('html', pieCharts);
    }

    pieCharts['tooltipPrefix'] = '';
    pieCharts['tooltipSuffix'] = ' Sales';

    if (slcPie3.length) {
      slcPie3.sparkline('html', pieCharts);
    }

    // Tristate Charts
    let tristateOptions = {
      type: 'tristate',
      barWidth: 8,
      barSpacing: 6,
      height: '110px',
      posBarColor: '#9ccc65',
      negBarColor: '#ef5350'
    };

    if (slcTristate1.length) {
      slcTristate1.sparkline('html', tristateOptions);
    }

    if (slcTristate2.length) {
      slcTristate2.sparkline('html', tristateOptions);
    }

    if (slcTristate3.length) {
      slcTristate3.sparkline('html', tristateOptions);
    }
  }

  /*
   * Chart.js Charts, for more examples you can check out http://www.chartjs.org/docs
   *
   */
  static initChartsChartJS() {
    // Set Global Chart.js configuration
    Chart.defaults.color = '#555555';
    Chart.defaults.scale.grid.color = "rgba(0,0,0,.04)";
    Chart.defaults.scale.grid.zeroLineColor = "rgba(0,0,0,.1)";
    Chart.defaults.scale.beginAtZero = true;
    Chart.defaults.elements.line.borderWidth = 2;
    Chart.defaults.elements.point.radius = 5;
    Chart.defaults.elements.point.hoverRadius = 7;
    Chart.defaults.plugins.tooltip.radius = 3;
    Chart.defaults.plugins.legend.labels.boxWidth = 12;

    // Get Chart Containers
    let chartLinesCon = jQuery('.js-chartjs-lines');
    let chartBarsCon = jQuery('.js-chartjs-bars');
    let chartRadarCon = jQuery('.js-chartjs-radar');
    let chartPolarCon = jQuery('.js-chartjs-polar');
    let chartPieCon = jQuery('.js-chartjs-pie');
    let chartDonutCon = jQuery('.js-chartjs-donut');

    // Lines/Bar/Radar Chart Data
    let chartLinesBarsRadarData = {
      labels: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
      datasets: [
        {
          label: 'This Week',
          fill: true,
          backgroundColor: 'rgba(66,165,245,.75)',
          borderColor: 'rgba(66,165,245,1)',
          pointBackgroundColor: 'rgba(66,165,245,1)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgba(66,165,245,1)',
          data: [25, 38, 62, 45, 90, 115, 130]
        },
        {
          label: 'Last Week',
          fill: true,
          backgroundColor: 'rgba(66,165,245,.25)',
          borderColor: 'rgba(66,165,245,1)',
          pointBackgroundColor: 'rgba(66,165,245,1)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgba(66,165,245,1)',
          data: [112, 90, 142, 130, 170, 188, 196]
        }
      ]
    };

    // Polar/Pie/Donut Data
    let chartPolarPieDonutData = {
      labels: [
        'Earnings',
        'Sales',
        'Tickets'
      ],
      datasets: [{
          data: [
            50,
            25,
            25
          ],
          backgroundColor: [
            'rgba(156,204,101,1)',
            'rgba(255,202,40,1)',
            'rgba(239,83,80,1)'
          ],
          hoverBackgroundColor: [
            'rgba(156,204,101,.5)',
            'rgba(255,202,40,.5)',
            'rgba(239,83,80,.5)'
          ]
        }]
    };

    // Init Charts
    let chartLines, chartBars, chartRadar, chartPolar, chartPie, chartDonut;

    if (chartLinesCon.length) {
      chartLines = new Chart(chartLinesCon, {type: 'line', data: chartLinesBarsRadarData, options: {tension: .4}});
    }

    if (chartBarsCon.length) {
      chartBars = new Chart(chartBarsCon, {type: 'bar', data: chartLinesBarsRadarData});
    }

    if (chartRadarCon.length) {
      chartRadar = new Chart(chartRadarCon, {type: 'radar', data: chartLinesBarsRadarData});
    }

    if (chartPolarCon.length) {
      chartPolar = new Chart(chartPolarCon, {type: 'polarArea', data: chartPolarPieDonutData});
    }

    if (chartPieCon.length) {
      chartPie = new Chart(chartPieCon, {type: 'pie', data: chartPolarPieDonutData});
    }

    if (chartDonutCon.length) {
      chartDonut = new Chart(chartDonutCon, {type: 'doughnut', data: chartPolarPieDonutData});
    }
  }

  /*
   * Init functionality
   *
   */
  static init() {
    this.initRandomEasyPieChart();
    this.initChartsSparkline();
    this.initChartsChartJS();
  }
}

// Initialize when page loads
jQuery(() => {
  BeCompCharts.init();
});
