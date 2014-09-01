// constants
var WIDTH = 960;
var lefts = [0,WIDTH/2];

// variables
var tops = [0,0];

$(placePosts);

function placePosts()
{
	$('.container-post').each(function(i){
		var min = Array.min(tops);
		var idx = $.inArray(min, tops);
		var left = lefts[idx];
		$(this).css({
			'left':left+'px',
			'top':min+'px',
			'opacity':1
		});
		tops[idx] = min+$(this).outerHeight(true);
	});	

	var max = Array.max(tops);

	$('.container-diary').css({
		'height':max
	});
}

Array.min = function(array) {
    return Math.min.apply(Math, array);
};

Array.max = function(array) {
    return Math.max.apply(Math, array);
};