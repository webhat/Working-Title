{config_load file="test.conf" section="setup"}
{include file="smarty/header.tpl" title=foo}

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

	<div>
		<div id="header" class="box rounded-corners">
			<div class="boxmargin">{$WT}</div>
		</div>
		<div id="fullwidth" class="box rounded-corners" style="height: 600px;">
			<div id="errormsg" > </div>
			<form style="margin:10px;margin-left:10%;margin-right:33%;">
				<input id="user" type="hidden" value="{$USER}" />
				<label style="display:inline">Bedrag: &euro;</label>
				<input id="amount" type="text" value="36.50" style="display:inline" />
				<div id="payment">
					<input type="radio" name="paymentmethod" checked value="paypal" style="display:inline;margin-right:10px;">PayPal</input><br />
					<input type="radio" name="paymentmethod" value="ideal" style="display:inline;margin-right:10px;">iDeal</input><br />
					<input type="radio" name="paymentmethod" value="incasso" style="display:inline;margin-right:10px;">Automatische Incasso</input><br />
				</div>
			</form>
			<div>
				<div id="paypal" class="makepayment">
					<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_xclick-subscriptions" \>
						<input type="hidden" name="business" value="info@workingtitle365.com" \>
						<input type="hidden" name="currency_code" value="EUR" \>
						<input type="hidden" name="no_shipping" value="1" \>
						<input type="image" src="http://www.paypal.com/en_US/i/btn/btn_subscribe_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" \>
						<input type="hidden" name="a3" value="5.00" \>
						<input type="hidden" name="p3" value="1" \>
						<input type="hidden" name="item_name" value="" \>
						<input type="hidden" name="t3" value="Y" \>
						<input type="hidden" name="src" value="1" \>
						<input type="hidden" name="sra" value="1" \>
						<input type="hidden" name="custom" value="1" \>
					</form>
				</div>
				<div id="ideal" style="display:none;" class="makepayment errormsg">iDeal is helaas nog niet geactiveerd.</div>
				<div id="incasso" style="display:none;" class="makepayment">Incasso</div>
			</div>
		</div>
	</div>

	<div id="blackbar"></div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">
			var maker = "{$USER}";
			var transx = "{$TRANSX}";
	    {literal}
			$(document).ready(function() {
				var json = {};
				json['transx'] = transx;

				$.ajax( {
					type:"POST",
					url:'/transaction.php',
					data: {"json":JSON.stringify(json)},
					dataType: 'json'
					}).done(function() { 
							$(this).addClass("done");
					});

				// get amount here...
				$("input[name=a3]").val(10);
				$("input[name=item_name]").val("Subscription to Maker: "+ maker);
				$("input[name=custom]").val(transx);
			});

			var radio = $("input:radio[name=paymentmethod]:checked").val();	
			$("input:radio[name=paymentmethod]").click(function() {
				$(".makepayment").hide();
				$("#"+ radio).show();
				_gaq.push(['_trackEvent', 'payment', 'select', radio ]);
			});
			$("input[name=submit]").click( function() {
					_gaq.push(['_trackEvent', 'payment', 'betaling', radio ]);
			});
	    {/literal}
	</script>

{include file="smarty/footer.tpl"}
