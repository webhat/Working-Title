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
});
console.log("Tests Loaded");
