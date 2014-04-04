<?php
//$this->load->view('segments/head');
$chartSize=0;
if($resultArraySize<=6){
	$chartSize='300';
}
if($resultArraySize>6){
	$chartSize='600';
}
if($resultArraySize>10){
	$chartSize='900';
}
if($resultArraySize>15){
	$chartSize='1200';
}
if($resultArraySize>20){
	$chartSize='1500';
}
if($resultArraySize>25){
	$chartSize='3000';
}
if($resultArraySize>30){
	$chartSize='6000';
}

if($resultArray!=null){
?>

<script>
	    
    $(document).ready(function () {
    	Highcharts.setOptions({
            lang: {
             drillUpText: '◁ Back to {series.name}'
    }
});
    	// Build the chart
     var options = {
        colors: [
        '#92e18e',
        '#fb4347',
        '#8bbc21',
        '#910000',
        '#1aadce',
        '#492970',
        '#f28f43',
        '#77a1e5',
        '#c42525',
        '#a6c96a'
        ],
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                height:<?php echo $chartSize;?>,
				type: '<?php echo $chartType ?>',
				marginBottom: <?php echo $chartMargin ?>
            },
            title: {
                text: ' '
            },
            tooltip: {
            valueSuffix: '',
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f} )<br/>',
        },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            <?php if (isset($drilldown)){
                ?>
                    drilldown:{
                        series:<?php echo $drilldown;?>
                    },
            <?php
            }
            ?>
            
            series: <?php echo $resultArray ?>
        };

        options.chart.renderTo = '<?php echo $container;?>';
        options.chart.type = 'pie';
        var chart2 = new Highcharts.Chart(options);
    });
    
</script>

<div class="graph">
	
	<div id="<?php echo $container;?>"  style="width:98%"  '>
</div>
</div>
<?php
}
else{?>
<div class="graph">	
	<h4>No records found for this statistic</h4>
</div>
</div>
<?php
}
?>
