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
			<div id="fullwidth" class="box rounded-corners" style="height:1300px;top:30px;">
				<div id="errormsg" > </div>
				<form style="margin:10px;margin-left:10%;margin-right:33%;">
					<input id="user" type="hidden" value="{$USER}" />
					<label style="display:inline">{gettext gt='Bedrag'}: &euro;</label>
					<input id="amount" type="text" value="" style="display:inline" disabled />
					<div id="payment">
						<input type="radio" name="paymentmethod" checked value="paypal" style="display:inline;margin-right:10px;">PayPal</input><br />
						<input type="radio" name="paymentmethod" value="creditcard" style="display:inline;margin-right:10px;">{gettext gt='CreditCard'}</input>&nbsp;&nbsp;<img src="/img/cc.gif" /><br />
						<input type="radio" name="paymentmethod" value="ideal" style="display:inline;margin-right:10px;">iDeal</input><br />
						<input type="radio" name="paymentmethod" value="incasso" style="display:inline;margin-right:10px;" >{gettext gt='Doorlopende Machtiging'}</input><br />
						<input type="radio" name="paymentmethod" value="anders" style="display:inline;margin-right:10px;">{gettext gt='Anders...'}</input><br />
					</div>
				</form>
				<div>
					<div id="paypal" class="makepayment">
						<form name="_xclick" action="https://www.{$PAYPALSANDBOX}paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_xclick-subscriptions" \>
							<input type="hidden" name="business" value="{$PAYPAL}" \>
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
							<input type="hidden" name="notify_url" value="http://demo.workingtitle365.com/payment/paypal_callback.php" \>
						</form>
					</div>
					<div id="creditcard" style="display:none;" class="makepayment">
						<form name="_xclick" action="https://www.{$PAYPALSANDBOX}paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_xclick-subscriptions" \>
							<input type="hidden" name="business" value="{$PAYPAL}" \>
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
							<input type="hidden" name="notify_url" value="http://demo.workingtitle365.com/payment/paypal_callback.php" \>
						</form>
					</div>
					<div id="ideal" style="display:none;" class="makepayment errormsg">{gettext gt='Betalen iDeal is helaas nog niet geactiveerd.'}</div>
					<div id="incasso" style="display:none;" class="makepayment">
						<h3>Doorlopende machtiging</h3>
						<span>{gettext gt='Ondergetekende verleent hierbij tot wederopzegging machtiging aan WorkingTitle365 om van zijn/haar rekening jaarlijks  af te schrijven ten behoeve van de Maker'} <strong>{$USER}</strong>.</span>
						<br />
						<br />
						<form target="_blank" method="post" action="/incasso.php">
							<input name="user" type="hidden" value="{$USER}" />
							<input name="transx" type="hidden" value="{$USER}" />
							<input name="amount" type="hidden" value="{$USER}" />
							<label>{gettext gt='Voornaam'}: *</label>
							<input name="firstname" value="" /> 
							<label>{gettext gt='Tussenvoegsels'}:</label>
							<input name="fnt" value="" /> 
							<label>{gettext gt='Achternaam'}: *</label>
							<input name="lastname" value="" /> 
							<label>{gettext gt='Huisnummer'}: *</label>
							<input name="house" value="" /> 
							<label>{gettext gt='Toevoeging'}:</label>
							<input name="hnt" value="" /> 
							<label>{gettext gt='Straat'}: *</label>
							<input name="street" value="" /> 
							<label>{gettext gt='Postcode'}: *</label>
							<input name="postcode" value="" /> 
							<label>{gettext gt='Woonplaats'}: *</label>
							<input name="city" value="" /> 
							<label>{gettext gt='Land'}: *</label>
							<input name="country" value="" /> 
							<label>{gettext gt='Email'}: *</label>
							<input name="mail" value="" /> 
							<label>{gettext gt='Bank/Girorekeningnr'}: *</label>
							<input name="bank" value="" /> 
							<br />
							<span>{gettext gt='De machtiging geldt tot wederopzegging. Hiervoor kan contact worden opgenomen met WorkingTitle365 via info@workingtitle365.com en binnenkort in je eigen account. Indien de begunstiger met de incasso niet akkoord is, kan deze bij de bank binnen 56 kalenderdagen (8 weken) om terugboeking verzoeken. De afschrijving van bovengenoemd rekeningnummer zal plaatsvinden in de maand van ontvangst en vervolgens jaarlijks. Ondergetekende wordt vooraf op de hoogte gesteld van het moment waarop de afschrijvingen bij benadering zullen plaatsvinden.'}</span> 
						<br />
						<br />
							<input type="checkbox" name="agree" value="" /> 
							<label>{gettext gt='Ik ga akkoord.'}</label>
						<br />
							<button id="submiterror">{gettext gt='Submit'}</button>
						</form>

					</div>
					<div id="anders" style="display:none;" class="makepayment"><!-- FIXME: gettext -->Heeft u nog idee&euml;n voor betaalmogelijkheden? Laat ze <a href="https://workingtitle365.uservoice.com/forums/174950-jouw-idee%C3%ABn-zijn-essentieel-/suggestions/3396187-andere-betaalmogelijkheden">hier</a> achter.</div>
				</div>
			</div>
		</div>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">
			var maker = "{$USER}";
			var transx = "{$TRANSX}";
			$("input[name=transx]").val(transx);
			$("input[name=amount]").val($("#amount").val());

	    {literal}
			$(document).ready(function() {
				var json = {};
				json['transx'] = transx;

				$.ajax( {
					type:"POST",
					url:'/transaction.php',
					data: {"json":JSON.stringify(json)},
					dataType: 'json'
					}).always(function(data) { 
						console.log(data.amount)
					$("input[name=a3]").val(data.amount);
					$("input[id=amount]").val(data.amount);
					});

				// get amount here...
				$("input[name=a3]").val(10);
				$("input[name=item_name]").val("{/literal}{gettext gt='Subscription to Maker'}{literal}: "+ maker);
				$("input[name=custom]").val(transx);
			});

			$("input:radio[name=paymentmethod]").click(function() {
			var radio = $("input:radio[name=paymentmethod]:checked").val();	
				$(".makepayment").hide();
				console.log("#"+ radio);
				$("#"+ radio).show();
				_gaq.push(['_trackEvent', 'payment', 'select', radio ]);
			});
			$("input[name=submit]").click( function() {
					_gaq.push(['_trackEvent', 'payment', 'betaling', radio ]);
			});
	    {/literal}
	</script>

{include file="smarty/footer.tpl"}
