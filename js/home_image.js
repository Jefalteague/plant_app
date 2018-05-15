window.onload = choosePic;

var flowerImages = new Array("/plant_apps/ErwinPlants/images/Acer campestre.jpg", "/plant_apps/ErwinPlants/images/Acer ginnala.jpg", "/plant_apps/ErwinPlants/images/acerCampestre1.jpg");
var thisFlower = 0;

function choosePic() {
	thisFlower = Math.floor((Math.random() * flowerImages.length));
	document.getElementById("adBanner").src = flowerImages[thisFlower];
	
	rotate();
}

function rotate() {
	thisFlower++;
	if (thisFlower == flowerImages.length) {
		thisFlower = 0;
	}
	document.getElementById("adBanner").src = flowerImages[thisFlower];
	
	setTimeout(rotate, 4 * 1000);
}


/*hmmm?
function rotate() {
	for(var i=0; i<3; i++){
		bob = flowerImages[i];
		document.getElementById("adBanner").src = bob[i];
	}
}
*/

