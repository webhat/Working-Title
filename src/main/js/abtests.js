console.log("Tests Loading");
$(document).ready(function() {
		setTimeout(
			function() {
				$("#fblogin").css("display","inline-block");
				$("#fblogin").click(function() {
						_gaq.push(['_trackEvent', 'SocialLogin', 'FaceBook']);
					});
				console.log("Show fblogin");
			}, 2000);
});
console.log("Tests Loaded");
