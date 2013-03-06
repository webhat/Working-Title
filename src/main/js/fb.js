// Additional JS functions here
window.fbAsyncInit = function() {
	FB.init({
		appId      : '460800597302655', // App ID
		channelUrl : '//'+window.location.hostname+'/channel.html', // Channel File
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
				$("#fblogin").css("display","inline");
		} else {
				// not_logged_in
				$("#fblogin").css("display","inline");
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
				$("#fblogin").css("display","none");
		} else {
			// cancelled
				$("#fblogin").css("display","inline");
		}
	},{scope: 'email,publish_actions'});
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
var obj = {
method: 'feed',
redirect_uri: 'http://demo.workingtitle365.com/',
link: 'https://developers.facebook.com/docs/reference/dialogs/',
picture: 'http://fbrell.com/f8.jpg',
name: 'Facebook Dialogs',
caption: 'Reference Documentation',
description: 'Using Dialogs to interact with users.'
};
function callback(response) {
	document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
}

//FB.ui(obj, callback);
/*
FB.api('/me/feed', 'post', { message: "Yay!" }, function(response) {
if (!response || response.error) {
alert('Error occured');
} else {
alert('Post ID: ' + response.id);
}
});
*/
						//top.location = document.location.pathname + location.search;
					/*
						FB.api('/me/permissions', function(response){
							 if (response && response.data && response.data.length){
								    var permissions = response.data.shift();
										console.log(permissions);
										if (permissions.email) {
											alert('User have granted `email` permission');
										}
								}
						});
					 */
				});
			});
}

