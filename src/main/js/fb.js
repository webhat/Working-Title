// Additional JS functions here
window.fbAsyncInit = function() {
	FB.init({
		appId      : '460800597302655', // App ID
		channelUrl : '//workingtitle.com/channel.html', // Channel File
		status     : true, // check login status
		cookie     : true, // enable cookies to allow the server to access the session
		xfbml      : true  // parse XFBML
	});

	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=75584493316";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

// Additional init code here
	FB.getLoginStatus(function(response) {
		if (response.status === 'connected') {
				// connected
				//	{
				// 		status: 'connected',
				//		authResponse: {
				//			accessToken: '...',
				// 			expiresIn:'...',
				//			signedRequest:'...',
				//			userID:'...'
				//		}
				//	}
			fbDataExchange();
			var accessToken = response.authResponse.accessToken;
		} else if (response.status === 'not_authorized') {
				// not_authorized
		} else {
				// not_logged_in
		}
	});
};

// Load the SDK Asynchronously
(function(d){
	var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement('script'); js.id = id; js.async = true;
	js.src = "//connect.facebook.net/en_US/all.js";
	ref.parentNode.insertBefore(js, ref);
}(document));

function fblogin() {
	FB.login(function(response) {
		if (response.authResponse) {
			// connected
			fbDataExchange();
		} else {
			// cancelled
		}
	});
}

function fbDataExchange() {
			FB.api('/me', function(response) {
				$.ajax( {
					type:"POST",
					url:'/fbdata.php',
					data: {"json":JSON.stringify(response)},
					aSync: false,
					dataType: 'json'
				}).always(function(data) { 
						//top.location = document.location.pathname + location.search;
						if( data != null && data.responseText != null && data.responseText != "")
							$('body').append($(data.responseText));
				}).done(function() { 
						//top.location = document.location.pathname + location.search;
				});
			});
}

