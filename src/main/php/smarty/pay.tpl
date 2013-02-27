{config_load file="test.conf" section="setup"}
{include file="smarty/header.tpl" title=foo}

        <!--[if lt IE 10]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

				<style>
				ol li:nth-child(2) {
					color: #94d219;
				}
				</style>
	<div>
		<div id="header" class="box rounded-corners">
			<div class="boxmargin">
				<h1>{gettext gt='Choose payment option for %s' arg1=$USER}</h1>
				<p class="category">FIXME: category here</p>
			</div>
			<div class="information" style="{$EDIT} margin-top:25px;">
				<div><a href="/maker/{$USER}">{gettext gt='Go to %s&#8217;s profile' arg1=$USER}</a></div>
			</div>
		</div>
		<div id="boxy">
			<div style="height:0px;">
				<div style="display:none;background-color:#ebebeb;height:180px;width:500px;margin:10px;" class="lightbox" id="paypopup">
					<img width="20" height="20" src="/img/redcross.png" class="upload killpopup" style="position:relative;left:23px;top:-24px;display:block;" />
					<div id="paytext"> {gettext gt='You will now be redirected to your chosen payment option'}</div>
					<div id="paysuc" style="display:none;">
						<ul style="list-style-type: none;">
							<li><a href="/">{gettext gt='Go to the Home Page'}</a></li>
							<li><a href="/maker/{$USER}">{gettext gt='Go to %s&#8217;s profile' arg1=$USER}</a></li>
							<li>&nbsp;</li>
							<li>{include file='smarty/social.tpl' title=social}</li>
						</ul>
					</div>
				</div>
			</div>
			<div style="position:absolute;">
				<div id="help" class="box"><br /><div>{$INCTEXT}</div><br /></div>
				<div id="faq" class="box"><br />{include file='smarty/payfaq.tpl' title=faq}<br /></div>
			</div>
			<div id="fullwidth" class="box rounded-corners" style="height:1300px;top:30px;">
				<div id="errormsg" > </div>
				<form style="margin:10px;margin-left:10%;margin-right:33%;">
					<input id="user" type="hidden" value="{$USER}" />
					<div class="pledge">
						<label style="display:inline">{gettext gt='Bedrag'}:&nbsp;&nbsp;<span style="color:white;">&euro;</span></label>
						<input id="amount" type="text" value="" style="display:inline" disabled />
					</div>
					<br />
					<div id="payment">
						<input type="radio" name="paymentmethod" checked value="paypal" style="display:inline;margin-right:10px;"><span>PayPal</span></input><br />
						<input type="radio" name="paymentmethod" value="creditcard" style="display:inline;margin-right:10px;"><span>{gettext gt='CreditCard'}</span></input>&nbsp;&nbsp;<img src="/img/cc.gif" /><br />
						<!--
						<input type="radio" name="paymentmethod" value="ideal" style="display:inline;margin-right:10px;"><span>{gettext gt='iDeal'}</span></input><br />
						-->
						<input type="radio" name="paymentmethod" value="incasso" style="display:inline;margin-right:10px;" ><span>{gettext gt='Doorlopende Machtiging'}</span></input><br />
						<input type="radio" name="paymentmethod" value="anders" style="display:inline;margin-right:10px;"><span>{gettext gt='Anders...'}</span></input><br />
					</div>
				</form>
				<div>
					<div id="paypal" class="makepayment">
						<form target="payform" name="_xclick" action="https://www.{$PAYPALSANDBOX}paypal.com/cgi-bin/webscr" method="post">
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
							<input type='hidden' name='charset' value='utf-8' \>
							<input type="hidden" name="notify_url" value="http://{$PAYPALDEMO}workingtitle365.com/payment/paypal_callback.php" \>
							<input type="hidden" name="return" value="http://{$PAYPALDEMO}workingtitle365.com/payment/complete.php" \>
						</form>
					</div>
					<div id="creditcard" style="display:none;" class="makepayment">
						<form target="payform" name="_xclick" action="https://www.{$PAYPALSANDBOX}paypal.com/cgi-bin/webscr" method="post">
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
							<input type='hidden' name='charset' value='utf-8' \>
							<input type="hidden" name="notify_url" value="http://{$PAYPALDEMO}workingtitle365.com/payment/paypal_callback.php" \>
							<input type="hidden" name="return" value="http://{$PAYPALDEMO}workingtitle365.com/payment/complete.php" \>
						</form>
					</div>
					<div id="ideal" style="display:none;" class="makepayment errormsg">{gettext gt='Betalen iDeal is helaas nog niet geactiveerd.'}</div>
					<div id="incasso" style="display:none;" class="makepayment">
						<h3>Doorlopende machtiging</h3>
						<span>{gettext gt='Ondergetekende verleent hierbij tot wederopzegging machtiging aan WorkingTitle365 om van zijn/haar rekening jaarlijks  af te schrijven ten behoeve van de Maker'} <strong>{$USER}</strong>.</span>
						<br />
						<br />
						<form target="payform" name="_xclick" action="http://{$PAYPALDEMO}workingtitle365.com/payment/incasso.php" method="post">
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
							<!--button id="submiterror">{gettext gt='Submit'}</button-->
							<input type="image" src="http://www.paypal.com/en_US/i/btn/btn_subscribe_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" \>
						</form>

					</div>
					<div id="anders" style="display:none;" class="makepayment">{gettext gt='Other Payments'}</div>
				</div>
			</div>
		</div>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">
			var maker = "{$USER}";
			var lang = "{$LANG}";
			var transx = "{$TRANSX}";
			var amount = 10;
			var sku = "unknown incentive";
			$("input[name=transx]").val(transx);

	    {literal}
			if(lang == 'en') {
				$('input[value=ideal]').hide();
				$('input[value=ideal]').next().hide();
				$('input[value=ideal]').next().next().hide();
				$('input[value=incasso]').hide();
				$('input[value=incasso]').next().hide();
				$('input[value=incasso]').next().next().hide();
			}


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
						amount = data.amount;
						sku = data.sku;
					$("input[name=a3]").val(data.amount);
					$("input[id=amount]").val(data.amount);
					$("input[name=amount]").val($("#amount").val());
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
			$("input[name=submit]").click( function(e) {
					var action = $(e.currentTarget).parent().attr('action');
					window.open( action, 'payform','width=1000,height=800,scrollbars=yes');
					$("#paypopup").show();
					$("body").scrollTop(0);
					var radio = $("input:radio[name=paymentmethod]:checked").val();	
					_gaq.push(['_trackEvent', 'payment', 'betaling', radio ]);
					_gaq.push(['_addItem',
						transx,         // transaction ID - necessary to associate item with transaction
						sku,         // SKU/code - required
						maker,      // product name - necessary to associate revenue with product
						amount,        // unit price - required
						'1'             // quantity - required
					]);
					_gaq.push(['_addTrans',
						transx,           // transaction ID - required
						maker, // affiliation or store name
						amount,          // total - required; Shown as "Revenue" in the
					]);
					_gaq.push(['_trackTrans']);
			});
	    {/literal}
	</script>

{include file="smarty/footer.tpl"}
