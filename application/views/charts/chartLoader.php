<h3 class='chart-title'><?php echo $chartTitle; ?>

<div class="btn-group chart-type">
	<button type="button" class="btn btn-default">Line</button>
	<button type="button" class="btn btn-default">Bar</button>
	<button type="button" class="btn btn-default">Stacked-Bar</button>
	<button type="button" class="btn btn-default">Column</button>
	<button type="button" class="btn btn-default">Stacked-Column</button>
</div></h3>
<?php

$this -> load -> view($contentView);
?>