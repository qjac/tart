$(document).ready(function() {
var _URL = window.URL || window.webkitURL;

$("#product_image").change(function(e) {
    var file, img;
	var horiz=false;

    if ((file = this.files[0])) {
        img = new Image();
		img.src = _URL.createObjectURL(file);

        img.onload = function() {
			
			if(this.width>=this.height)
			{
				horiz = true;
			}
			if(horiz && (this.width < minWidth))
			{
alert("Image width must be at least " + minWidth + "px");
document.getElementById('product_image').value = "";
			}
			else if (!horiz && (this.height < minHeight))
			{
alert("Image height must be at least " + minHeight + "px");
document.getElementById('product_image').value = "";
			}
			else if (file.size > maxFileSize)
			{
			alert("Image file size must be at less than " + maxFileSize + "kb");
document.getElementById('product_image').value = "";	
			}
        };
        img.onerror = function() {
            alert( "not a valid file: " + file.type);
        };


    }

});
});