<html>
	<head></head>
	<title></title>
	<script src = "<?php echo base_url()?>highcharts/jquery.min.js"></script>
	<script src = "<?php echo base_url()?>highcharts/highcharts.js"></script>
<body>
<div id = "container" ></div>
<script>
	$(function () {
    $('#container').highcharts({
    	title: {
            text: 'Pie Chart'
        },
       plotOptions: {
            pie: {
            	dataLabels: {
            		format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Deliveries',
            data: [
            	<?php 
            	foreach($dres as $key=>$data):
         		echo "['$key',$data],";
				endforeach;
            	?>
            	]
        }]
    });
});
</script>
</body>
</html>