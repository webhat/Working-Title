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
						<div id="errormsg"></div>
						<br />
						<br />
						<label>Bedrag: &euro;</label>
						<input type="text" value="" id="amount"/>
						<label>Titel</label>
						<input type="text" value="" id="title" />
						<label>Korte beschrijving</label>
						<input type="text" value="" id="desc" />
						<br />
						<button style="float:right">Voeg toe</button>
						<br />
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="blackbar"></div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">
	    {literal}
	$("button").click( function() {
			$(this).attr("disabled", "disabled");
			var json = {};
			json['amount'] = $("#amount").val();
			json['title'] = $("#title").val();
			json['desc'] = $("#desc").val();
			$.ajax( {
				type:"POST",
				url:'/addincentive.php',
				data: {"json":JSON.stringify(json)},
				dataType: 'json'
				}).done(function() { 
					  $(this).addClass("done");
				});
			//$("#incform")[0].reset();
			return false;
	});
	    {/literal}
		
	</script>

{include file="smarty/footer.tpl"}
