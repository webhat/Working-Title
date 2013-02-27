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
		var wgabc = $.randomBetween(0, 4);
		if(wgabc == 0) {
			_gaq.push(['_trackEvent', 'welcomegift', 'baseline']); // 20%
		}	else {
			if(wgabc == 1 || wgabc == 3) {
				$("#wgaBc").show();
				_gaq.push(['_trackEvent', 'welcomegift', 'prepay']); // 40%
			}	else {
				$("#wgabC").show();
				_gaq.push(['_trackEvent', 'welcomegift', 'postpay']); // 40%
			}
		}
});
console.log("Tests Loaded");
