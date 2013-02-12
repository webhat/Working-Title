console.log("Tests Loading");
$(document).ready(function() {
		setTimeout(
			function() {
				$("#fblogin").css("display","inline-block");
				console.log("Show fblogin");
				$("#fblogin").click(function() {
						fblogin();
						_gaq.push(['_trackEvent', 'SocialLogin', 'FaceBook']);
						console.log("Click fblogin");
					});
			}, 2000);
		if($.randomBetween(0, 1) == 0) {
			$("#personalize").show();
			_gaq.push(['_trackEvent', 'Personalize', 'on']);
		}	else {
			_gaq.push(['_trackEvent', 'Personalize', 'off']);
		}
});
console.log("Tests Loaded");
