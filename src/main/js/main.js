function creations(json) {
	$.each(json, function( i, item) {
			var type = item.type;
			$("#mywork").append($("<div id='work"+ i +"' class='work "+ type +"' />"));

			var myelem;
			switch( type) {
				case 'text':
					myelem = $('<div />');
					$(myelem).html(item.content);
					break;
				case 'image':
					myelem = $('<img style="max-width:500px;margin: 0 auto;" />');
					$(myelem).attr('src', item.content);
					break;
				case 'video':
					myelem = $('<video controls="controls" width="320" height="240" />');
					var source = $('<source type="video/mp4"/>Your browser does not support the video tag.');
					$(myelem).attr('src', item.content);
					$(myelem).html(source);
					break;
				case 'audio':
					myelem = $('<audio controls="controls" />');
					var source = $('<source type="audio/mp3"/>Your browser does not support the audio tag.');
					$(myelem).attr('src', item.content);
					$(myelem).html(source);
					break;
				default:
			}
			$("#work"+ i).append(myelem);
	});
}

function getUrlVars() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		vars[key] = value;
	});
	return vars;
}
