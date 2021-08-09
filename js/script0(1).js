

function animatedImages(){

jQuery(".animated_images_container").each(
function (){
	
//window.alert("a_i");
	
	var img_array[]=jQuery(this).find("img");
	
	for(var o in img_array){
		window.alert(o);
		}
	
	}
);

}






jQuery(document).ready(function ($){

animatedImages();

});



