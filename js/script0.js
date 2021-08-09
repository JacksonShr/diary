

var iterator=0;


function hideAnimatedImages(){

jQuery(".animated_images_container").each(
function (){
	
	var img_array=jQuery(this).find("img");
	
	for(var i=0; i<img_array.length; i++){
		jQuery(img_array[i]).hide();
		}
	
	}
);

}



function animatedImages(){

jQuery(".animated_images_container").each(
function (){
	
	
	var img_array=jQuery(this).find("img");
	
	var max=img_array.length;
	
	id=iterator%max-1;
	
	if(id==-1){
		id=max+id;
	}

	jQuery(img_array[id]).hide();
	
	id=id+1;
	if(id==max){
		id=0;
	}
	
	jQuery(img_array[id]).show();
	}
);
iterator++;

}
		





jQuery(document).ready(function ($){


hideAnimatedImages();

animatedImages();

setInterval("animatedImages()" , 3000);


});



