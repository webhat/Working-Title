{config_load file="test.conf" section="setup"}
{include file="smarty/header.tpl" title=foo}

        <!--[if lt IE 10]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

	<div>
		<div id="header" class="box rounded-corners">
			<div class="boxmargin">
				<h1>{$WT}</h1>
				<p class="category">FIXME: category here</p>
			</div>
		</div>
		<div id="boxy">
			<div id="fullwidth" class="box rounded-corners" style="height:1000px;top:30px;width:1052px;">
				<div style="margin-left:10%;">
					<h2 style="top:30px;margin-top:50px;position:relative;display:inline;color:#2A6999;">{gettext gt='Register'}</h2>
					<h2 style="top:30px;left:450px;margin-top:50px;position:relative;display:inline;color:#2A6999;">{gettext gt='Login'}</h2>
				</div>
				<div style="border:solid 1px #e3e2e2;float:right;z-index:9;width:300px;height:200px;margin-top:70px;margin-right:100px;">
					<form id="login" action="login.php" style="margin:10px 10px 0px 0px;" method="POST" target="logincheck">
						<span><label style="color:#222;">{gettext gt='Username' nocache}/{gettext gt='Email' nocache}:</label><input type="text" name="user" style="width:150px" /></span>
						<span><label style="color:#222;">{gettext gt='Password' nocache}:</label><input type="password" name="pass" style="width:150px" /></span>
						<span><input type="submit" style="float:right;margin-top:4px;" value="Login" /></span>
					</form>
				</div>
				<div style="width:50%;">
					<form style="margin:10px;margin-left:10%;" id="incform">
						<div id="indentform">
							<br />
							<div id="errormsg">&nbsp;</div>
							<br />
							<label>{gettext gt='Username' nocache}:</label>
{if $USER != ""}
							<input id="username" type="text" disabled value="{$USER}" />
{else}
							<input id="username" type="text" value="{$USER}" />
{/if}
							<label>{gettext gt='Password' nocache}:</label>
							<input id="passwd" type="password" value="" />
							<label>{gettext gt='Email' nocache}:</label>
							<input id="mail" type="text" value="{$MAIL}" />
							<label>{gettext gt='Website'}:</label>
							<input id="site" type="text" value="{$SITE}" />
							<label><span style="color: #2A6999; font-size: 13px;">{gettext gt='I approved the'} <a target="_blank" href="http://workingtitle365.uservoice.com/knowledgebase/articles/139753-terms-of-use" style="color: #88BD17">{gettext gt='User Policy'}</a> &amp; <a target="_blank" href="http://workingtitle365.uservoice.com/knowledgebase/articles/139755-privacy-policy" style="color: #88BD17">{gettext gt='Privacy Policy'}</a></span></label>
							<input type="checkbox" id="terms"/>
							<button style="float:right;">{gettext gt='Create User'}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	    {literal}
	$("button").click( function() {
		var json = {};
		if(getUrlVars()['hash'])
			json['hash'] = getUrlVars()['hash'];
		var err = true;
		$("#indentform input[type=checkbox]").each(function(i, val) {
			if($(val).is(':checked')) {
			} else {
				if(err)
					$("#errormsg").append("Alles moet worden ingevuld.");
				err = false;
			}
			json[val.id] = $(val).is(':checked');
		});
		$("#indentform input").each(function(i, val) {
			if($("#"+ val.id).val() == "") {
				if(err)
					$("#errormsg").append("Alles moet worden ingevuld.");
				err = false;
			}
			json[val.id] = $("#"+ val.id).val();
		});
		if(err)
			$.ajax( {
				type:"POST",
				url:'/adduser.php',
				async:false,
				data: {"json":JSON.stringify(json)},
				dataType: 'json'
			}).fail(function(ret) { 
					$("#errormsg").append(JSON.parse(ret.responseText).error);
			}).done(function(ret) {
				console.log(ret);
				top.location = "/maker/"+ json["username"] +"?firsttime=true";
			});
		return false;
	});
	    {/literal}
		
	</script>

{include file="smarty/footer.tpl"}
