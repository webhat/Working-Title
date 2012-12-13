{config_load file="test.conf" section="setup"}
{include file="smarty/header.tpl" title=foo}

        <!--[if lt IE 7]>
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
			<div id="fullwidth" class="box rounded-corners" style="height:1000px;top:30px;">
				<form style="margin:10px;margin-left:10%;margin-right:33%;" id="incform">
					<div id="indentform">
						<br />
						<div id="errormsg">&nbsp;</div>
						<br />
						<label>Gebruikersnaam:</label>
						<input id="username" type="text" value="{$USER}" />
						<label>Wachtwoord:</label>
						<input id="passwd" type="password" value="" />
						<label>Email:</label>
						<input id="mail" type="text" value="{$MAIL}" />
						<label>Website:</label>
						<input id="site" type="text" value="{$SITE}" />
						<!--
						<label>Korte beschrijving:</label>
						<input id="profile" style="position:static;width:210px;" type="text" value="" />
						<br />
						<label>Voornaam:</label>
						<input id="fname" type="text" value="" />
						<label>Achternaam:</label>
						<input id="lname" type="text" value="" />
						<label>Geslacht:</label>
						<input id="sex" type="text" value="" />
						<br />
						<label>Straat:</label>
						<input id="adr_street" type="text" value="" />
						<label>Huisnummer:</label>
						<input id="adr_nr" type="text" value="" />
						<label>Toevoeging:</label>
						<input id="adr_code" type="text" value="" />
						<label>Woonplaats:</label>
						<input id="adr_city" type="text" value="" />
						<label>Postcode:</label>
						<input id="adr_zip" type="text" value="" />
						<label>Land:</label>
						<input id="adr_country" type="text" value="" />
						<br />
						<label>Bankrekening:</label>
						<input id="pay_bankaccount" type="text" value="" />
						<label>PayPal:</label>
						<input id="pay_paypal" type="text" value="" />
						-->
						<label>Ik ga akkoord met de <a target="_blank" href="http://workingtitle365.uservoice.com/knowledgebase/articles/139753-terms-of-use">Gebruikersvoorwaarden</a> en <a target="_blank" href="http://workingtitle365.uservoice.com/knowledgebase/articles/139755-privacy-policy">Privacy Policy</a></label>
						<input type="checkbox" id="terms"/>
						<button style="float:right;">Create User</button>
					</div>
				</form>
			</div>
		</div>
	</div>

		<div id="blackbar">
	{include file="smarty/blackbar.tpl"}
		</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
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
				top.location = "/makerrules.html?id="+ json["username"];
			});
		return false;
	});
	    {/literal}
		
	</script>

{include file="smarty/footer.tpl"}
