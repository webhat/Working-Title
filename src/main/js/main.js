function creations(json) {
	$.each(json, function( i, item) {
			var type = item.type;
			$("#workbelow").after($("<center><div class='delete'>delete</div><div id='work"+ i +"' class='work "+ type +"' ><h2>"+ item.title +"</h2></div></center>"));
				
			var myelem;
			switch( type) {
				case 'text':
					myelem = $('<div />');
					$(myelem).html("<a href='/upload/"+ item.content +"' rel='nofollow'>download '"+ item.title +"'</a>");
					break;
				case 'image':
					myelem = $('<img style="max-width:700px;margin: 0 auto;" />');
					$(myelem).attr('src', "/upload/l_"+ item.content);
					break;
				case 'video':
					myelem = $('<video controls="controls" style="max-width:700px;margin: 0 auto;" />');
					var source = $('<source type="video/mp4"/>Your browser does not support the video tag.');
					$(source).attr('src', "/upload/"+ item.content);
					$(myelem).append($(source));
					break;
				case 'audio':
					myelem = $('<audio controls="controls" />');
					var source = $('<source type="audio/mp3"/>Your browser does not support the audio tag.');
					$(myelem).attr('src', "/upload/"+ item.content);
					$(myelem).html(source);
					break;
				default:
			}
			$("#work"+ i).prepend(myelem);
	});
}

function getUrlVars() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		vars[key] = decodeURI(value);
	});
	return vars;
}

$(document).ready( function() {
	$("#loginbox").load('/userbar.php', function() {
		$('#loginlink').click( function() {
			$('#extloginbox').animate({
				height: 120,
				width: 200
			}, 500, function() {
				$("#user").focus();
			}).toggle();
		});
		$("#loadHelp").click(loadHelp);
		if(firsttime) {
			// If firsttime user enable tips
			firsttime();
		}
	});
});

function incentives( maker, json) {
	$("#pincentives .incentive").remove();
	$.each(json, function( i, item) {
			var selected = "";
			var amount = ((+item.amount)*365/100).toFixed(2);
			if(item.code == getUrlVars()['inc']) { 
				selected = "checked";
				$('#amount').val(amount);
			}

			var incen = $("<br /><input type='radio' "+ selected +" name='incentive' value='"+ amount +"' style='display:inline;margin-right:10px;' id='"+item.code+"'>"+ item.amount +" cents /day or &euro;"+ amount +" /year </input><div class='incentivedesc'><strong>"+ item.title +"</strong><br />"+ item.desc +"</div>");
			var profile = $("<div class='incentive' id='"+ item.code +"'><div class='delete'>delete</div><span class='price'>"+ item.amount +" cent /day</span><span class='title'>"+ item.title +"</span><span class='desc'>"+ item.desc +"</span></div>");
			$("#incentives").append(incen);
			$("#pincentives").append(profile);
			$(profile).click(function() {
				top.location = "/payments.php?inc="+ item.code +"&id="+ maker;
			});
			$(".incentive:first").css("border-top-style","none");
	});
	if(json.length == 0) {
		console.log("No Incentives");
		var incen = "<div class='incentivedesc errormsg'>This user has no incentives</div>"
			$("#incentives").append(incen);
	}
}
		
function isNumberKey(evt, c) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if( c && (charCode == 46)) {
		return true;
	}
	if (charCode > 31 
	&& (charCode < 48 || charCode > 57))
		return false;

	return true;
}

var ftonce = true;
function firsttime() {
	if(!ftonce) {
		return;
	} else {
		ftonce = false;
	}

	if( getUrlVars()['firsttime'] == "true") {
		$(document).ready(function() {
			var ftblock = '<div id="firsttime" style="position:relative;top:500px;background-color:transparent;z-index:200;"><img style="background-color:transparent !important;z-index:200;" src="/img/wt365-arrow.png" /><span><strong style="position:relative;left:-60px;top:-25px;"></strong></span></div>';
			$('body').append(ftblock);
		});
	} else {
		return;
	}

	var offset = $("#loginlink").offset();

	$("#firsttime").animate({
		top: offset.top+20,
		left: offset.left-120
		}, 500, function() {
			// DO NOTHING
		$('#loginlink').click( function() {
				$("#firsttime").hide();
		});
	});
}

function loadHelp() {
	var img = $("#cartoon");
	$("#whatiswt365").toggle();
	var url ="/img/wt365-cartoon.gif";

	img.attr("src", url+"?x="+Math.random());

	return false;
}
