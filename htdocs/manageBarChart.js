RocknCoder.Pages.manageBarChart = function () {
  var pageshow = function () {
      updateChart();
      $("#refreshBarChart").click(function(){
        updateChart();
      });
    },
    pagehide = function () {
      $("#refreshBarChart").unbind('click');
    },
    updateChart= function(){
      var barA = parseInt($("#pageBarSliderA").val(),10),
        barB = parseInt($("#pageBarSliderB").val(),10),
        barC = parseInt($("#pageBarSliderC").val(),10);
      showChart(barA, barB, barC);
    },
    showChart = function(barA, barB, barC){
      $.jqplot('barChart', [[[barA,1], [barB,3], [barC,5]]], {
        seriesDefaults:{
          renderer:$.jqplot.BarRenderer,
          shadowAngle: 135,
          rendererOptions: {
            barDirection: 'horizontal'
          },
          pointLabels: {show: true, formatString: '%d'}
        },
        axes: {
          yaxis: {
            renderer: $.jqplot.CategoryAxisRenderer
          }
        }
      }).replot({clear: true, resetAxes:true});
    };
  return {
    pageshow: pageshow,
    pagehide: pagehide
  }
}();
