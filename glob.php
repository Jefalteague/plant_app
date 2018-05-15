<?php
include('util/main.php');
include('model/get_images_function.php');

?>


<div>
<?php 
	$species = 'Acercampestre';
	$feature = 'leaf';
	$bob = get_images($species, $feature);
	
	for ($i = 0; $i < count($bob); $i++) {
		echo $bob[$i];
		echo '<br />';
	}
	
?>
</div>

</body>

</html>