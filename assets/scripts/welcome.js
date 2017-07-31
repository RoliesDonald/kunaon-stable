$(document).ready(function () {

    if(typeof chart !== 'undefined' && chart.length>0){

        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = chart;
        var pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: "#fff",
            //Number - The width of each segment stroke
            segmentStrokeWidth: 1,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: "easeOutBounce",
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: false,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
            //String - A tooltip template
            tooltipTemplate: "<%=value %>% <%=label%>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);
        //-----------------
        //- END PIE CHART -
        //-----------------

        for(i=0;i<chart.length;i++){
            $('#legend_chart').append("<li><i class='fa fa-circle-o' style='color:"+chart[i].color+"'></i> "+chart[i].label+"</li>");    
        }

        for(i=0;i<5;i++){
            if(chart[i]){
                $('#legend_text').append('<li><a href="#">'+chart[i].label+'<span class="pull-right" style="color:'+chart[i].color+'"><i class="fa fa-angle-left"></i> '+chart[i].value+'%</span></a></li>');
            }
        }

    }else{
        $('#chart_menu').hide();
        $('#list_product').removeClass('col-lg-7').addClass('col-lg-12');
    }

    
});