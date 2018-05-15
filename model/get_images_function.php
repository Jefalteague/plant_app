<?php

function get_images($species) {
	
	$query = "../images/" . $species . "/*.JPG";
	
	$bob = glob($query);
	
	return $bob;
	
}

?>