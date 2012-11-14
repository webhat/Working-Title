{config_load file="test.conf" section="setup"}
{include file="smarty/header.tpl" title=foo}

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
	<style type="text/css">
		label {
			float: left;
			width: 120px;
			font-weight: bold;
		}

		input, textarea {
			width: 180px;
			margin-bottom: 5px;
		}

		textarea {
			width: 250px;
			height: 150px;
		}
	</style>

	<div>
		<div id="header" class="box rounded-corners">
			<div class="boxmargin">{$WT}</div>
		</div>
		<div id="fullwidth" class="box rounded-corners">
			<form>
				<label>Username:</label>
				<input id="username" type="text" value="{$USER}" />
				<label>Password:</label>
				<input id="passwd" type="password" value="" />
				<label>Email:</label>
				<input id="mail" type="text" value="{$MAIL}" />
				<button id="submit">Store</button>
			</form>
		</div>
	</div>

	<div id="blackbar"></div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">
	    {literal}
	$("button").click( function() {
			var json = {};
			json['username'] = $("#username").val();
			json['mail'] = $("#mail").val();
			json['passwd'] = $("#passwd").val();
			$.post( '/adduser.php', json, {contentType: 'application/json'} );
			top.location = "/profile.php?id="+ json["username"];
			return false;
		});
	    {/literal}
		
	</script>

{include file="smarty/footer.tpl"}
