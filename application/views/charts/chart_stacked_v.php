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

?>

<script>
		$(function () {
	$('<?php echo "#" . $container; ?>').highcharts({
		colors: [
		'#eeeeee',
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
            zoomType: 'x',            
			height:<?php echo $chartSize;?>,
			type: '<?php echo $chartType ?>',
			 marginBottom: <?php echo $chartMargin ?>
		},
		title: {
			text: '<?php echo $chartTitle; ?>'
		},
		xAxis:
		{
			categories:  <?php echo $categories; ?>,
	
	},
	yAxis: {
		min: 0,
		title: {
			text: '<?php echo $yAxis; ?>',
			align: 'high'
		},
		labels: {
			overflow: 'justify'
		}
		},
		tooltip: {
			valueSuffix: '',
			pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f} )<br/>',
		},
		plotOptions: {
			series: {
                    stacking: 'percent'
              },
			bar: {
				dataLabels: {
					enabled: true,
					formatter: function() {
                            if (this.y != 0) {
                              return Math.round(this.percentage)+'%';
                            } else {
                              return '';
                            }
                        },
                        color:'white'
		},
	events: {
                    legendItemClick: function () {
                        return false; // <== returning false will cancel the default action
                    }
                }
		}
		},
		legend: {
			layout: 'vertical',
			align: 'left',
			floating: true,
			borderWidth: 1,
			backgroundColor: '#FFFFFF',
			shadow: true
		},
		credits: {
			enabled: false
		},
		series:<?php echo$resultArray?>
		});
		});
</script>

<div class="graph">
	
	<div id="<?php echo $container;?>"  style="width:98%"  '>
</div>
</div>

