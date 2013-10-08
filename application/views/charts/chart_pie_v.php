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
		$(function () {
    var chart;
    
    $(document).ready(function () {
    	
    	// Build the chart
       $('<?php echo "#" . $container; ?>').highcharts({
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
        	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
            series: <?php echo $resultArray ?>
        });
    });
    
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
