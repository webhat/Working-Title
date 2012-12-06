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
		<div style="position:absolute">
			<div id="pincentives" class="box rounded-corners" style="top:240px;"></div>
		</div>
		<div id="boxy">
			<div id="fullwidth" class="box rounded-corners" style="top:30px;height:300px;">
				<form style="margin:10px;margin-left:10%;margin-right:33%;" id="incform">
					<div id="indentform">
						<br />
						<div id="errormsg"></div>
						<br />
						<label>Bedrag: (cent per dag in cijfers)</label>
						<input type="text" value="" id="amount" onkeypress="return isNumberKey(event)"/>
						<label>Titel</label>
						<input type="text" value="" id="title" />
						<label>Korte beschrijving</label>
						<textarea id="desc" style="margin-left:10px;width:204px;"></textarea>
						<br />
						<button style="float:right">Voeg toe</button>
						<br />
					</div>
				</form>
			</div>
		</div>
	</div>

		<div id="blackbar">
	{include file="smarty/blackbar.tpl"}
		</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
	    {literal}
	$("button").click( function() {
			//$(this).attr("disabled", "disabled");
			var json = {};
			json['amount'] = $("#amount").val();
			json['title'] = $("#title").val();
			json['desc'] = $("#desc").val();
			if( json['amount'] =="" || json['title'] == "") {
				$("#errormsg").text("Alle velden invullen");
				return false;
			}
			$("#errormsg").text("");

			$.ajax( {
				type:"POST",
				url:'/addincentive.php',
				data: {"json":JSON.stringify(json)},
				dataType: 'json'
			}).done(function() { 
					{/literal}
						$.getJSON("incentive.json.php?id={$USER}&callback=?", function(data) {
							incentives(data);
					{literal}
			});
			$("#incform")[0].reset();
			//location.reload(true);
						})
			return false;
	});
	    {/literal}
	</script>
	<script src="incentive.json.php?id={$USER}&callback=incentives"></script>

{include file="smarty/footer.tpl"}
