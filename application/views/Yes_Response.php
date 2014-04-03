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
                 categories: <?php echo $level_type;  ?>,
                title: {
                    text: null
                }
            },
            yAxis: {
                title: {
                    text: 'responses',
                   },
             },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'yes',
                data: <?php echo $level_total;  ?>
            }]
        });
    });
</script>
</body>
</html>