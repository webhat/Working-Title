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
						<label>{gettext gt='Gebruikersnaam'}:</label>
						<input id="username" type="text" value="" />
						<label>{gettext gt='Email'}:</label>
						<input id="mail" type="text" value="" />
						<button style="float:right;">{gettext gt='Reset'}</button>
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
		var err = true;
		$("#indentform input[type=checkbox]").each(function(i, val) {
			if($(val).is(':checked')) {
			} else {
				if(err)
					$("#errormsg").append("{gettext gt='Alles moet worden ingevuld.'}");
				err = false;
			}
			json[val.id] = $(val).is(':checked');
		});
		$("#indentform input").each(function(i, val) {
			if($("#"+ val.id).val() == "") {
				if(err)
					$("#errormsg").append("{gettext gt='Alles moet worden ingevuld.'}");
				err = false;
			}
			json[val.id] = $("#"+ val.id).val();
		});
		if(err)
			$.ajax( {
				type:"POST",
				url:'/sendreset.php',
				data: {"json":JSON.stringify(json)},
				dataType: 'json'
			}).fail(function(ret) { 
					$("#errormsg").append(JSON.parse(ret.responseText).error);
			}).done(function(ret) {
				console.log(ret);
					$("#errormsg").append(ret.success);
					//$("#errormsg").append(JSON.parse(ret.responseText).success);
			});
		return false;
	});
	    {/literal}
		
	</script>

{include file="smarty/footer.tpl"}
