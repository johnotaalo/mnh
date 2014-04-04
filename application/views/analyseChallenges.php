<html>
	<head></head>
	<title></title>
		<script src = "<?php echo base_url()?>highcharts/jquery.min.js"></script>
		<script src = "<?php echo base_url()?>highcharts/highcharts.js"></script>
	<body>
		<div id='container'></div>
		<script>
	$(function () {
        $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'bar chart'
            },
            xAxis: {
                 categories: <?php echo  $categories ?>,
                title: {
                    text: null
                }
            },
            yAxis: {
                title: {
                    text: 'reasons'
                   },
             },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
             series: [
        <?php
        foreach ($result as $key => $value) {
        	echo "{ name: '$key',";
			$marks_=array();
		foreach ($value as $key => $marks) {
			$marks_=array_merge($marks_,array((int)$marks));
			
		}
		echo " data: ".json_encode($marks_).'},';	
		}
        ?>
      
            
            ]
        });
    });
</script>
</body>
</html>