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
				<div id="errormsg" > </div>
				<form style="margin:10px;margin-left:10%;margin-right:33%;">
					<input id="user" type="hidden" value="{$USER}" />
					<label style="display:inline">{gettext gt='My pledge is'}: &euro;</label>
					<input id="amount" type="text" value="" style="display:inline" onkeypress="return isNumberKey(event)" />
					<div id="incentives">
						<input type="radio" name="incentive" value="0" style="display:inline;margin-right:10px;">{gettext gt='Nothing in return'}</input>
					</div>
					<button id="submit">{gettext gt='Pay'}</button>
				</form>
			</div>
		</div>
	</div>


	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
	<script src="/js/main.js"></script>
	<script type="text/javascript">
	    {literal}
	$("button").click( function() {
			$(this).attr("disabled", "disabled");
			var json = {};
			json['price'] = $('input:radio[name=incentive]:checked').val();
			json['incentive'] = $('input:radio[name=incentive]:checked').attr("id");
	    {/literal}
			json['maker'] = "{$USER}";
	    {literal}
			json['amount'] = $("#amount").val();
			console.log(json['price'] +"-"+json['amount']);
			if( (+json['amount']) < (+json['price']) || json['amount'] == "") {
				$("#errormsg").text("{/literal}{gettext gt='De gekozen incentive matched niet met je bedrag.'}{literal}");
				$(this).removeAttr("disabled");
				return false;
			}
			_gaq.push(['_trackEvent', 'incentive', json['incentive'], json['maker'] ]);
			console.log('pay');
			$.ajax( {
				type:"POST",
				async:false,
				url:'/paying.php',
				data: {"json":JSON.stringify(json)},
				dataType: 'json'
				}).done(function( data) { 
					json['return'] = data;
				});
	    {/literal}
			top.location = "/pay.php?id="+ json['maker'] +"&transaction="+json['return']['transaction'];
	    {literal}
			return false;
	});
	    {/literal}
	</script>

	<script src="incentive.json.php?id={$USER}&callback=incentives"></script>
{include file="smarty/footer.tpl"}
