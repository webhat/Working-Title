{config_load file="test.conf" section="setup"}
{include file="smarty/header.tpl" title=foo}
{assign var='WHO' value=$WHO|default:"<span style='$EDIT;'><strong>Wie ben ik?</strong><br/>Jou als Maker: Vertel meer over jezelf in ongeveer 100 woorden (langer mag maar lange teksten worden slecht gelezen). Dit stukje is belangrijk om het vertrouwen van je Fans te winnen. Wie ben je en hoe ben je gekomen waar je nu bent? Ben je professioneel bezig of ambieer je een carriere? Wat is je opleiding? Waar ben je nog meer te zien?</span>"}
{assign var='WHAT' value=$WHAT|default:"<span style='$EDIT;'><strong>Wat maak ik?</strong><br/>Jouw Werk: jouw beschrijving van je werk staat hier centraal. Gebruik er gerust 200 woorden voor maar wees bewust dat lange(re) teksten slecht worden gelezen.  Wat kenmerkt je werk, wat is er uniek aan? Waar moet men op letten? Wat zijn reacties van huidige bewonderaars?</span>"}
{assign var='WHY' value=$WHY|default:"<span style='$EDIT;'><strong>Waarom doe ik dit?</strong><br/>Jouw reden voor deelname aan WorkingTitle365.com: Na het bekijken/beluisteren van je werk kunnen Fans een idee krijgen wat jij beoogt. Geef kort weer (200 woorden moet genoeg zijn) wat je motivatie is voor deelname aan dit platform. En wat is je doel? Zo kunnen Fans ook je doel willen ondersteunen.</span>"}
{assign var='WANT' value=$WANT|default:"<span style='$EDIT;'><strong>Wat wil ik en wat bied ik?</strong><br/>Jouw oproep en wat je te bieden hebt: Hier maak je kenbaar in wederom ongeveer 100 woorden wat je verlangt van je Fans en wat jij ze daarvoor biedt. Beoog je een intensieve contact met je Fans? Wil je van hun inbreng gebruik gaan maken? Hoop je dat ze jouw werk zoveel mogelijk delen op sociale media? Wat je ze biedt zijn natuurlijk de beloningen maar ook een inkijk en misschien wel deelname aan je creatief proces. Een te lange tekst hier leidt af van de beloningen die eronder komen te staan.</span>"}
{assign var='PROFILE' value=$PROFILE|default:"<span style='$EDIT;'>Je korte omschrijving: Beschrijf je werk in max. 133 tekens zoals een tweet op Twitter. Zo is in een oogopslag helder wat jij doet.</span>"}
{assign var='WORK' value=$WORK|default:"<span style='$EDIT;'><strong>Jouw Werk uploaden</strong><br/>Je kan hier zoveel werken kwijt als je wilt. MAAR ons advies is: maak hier niet je portfolio van, daar heb je andere plekken voor. Juist een beperkt aantal werken maakt nieuwsgierig en verleidt mensen ertoe Fan van je te worden. Het laatste werk dat je toevoegt is als eerste zichtbaar. Voor alle Makers raden we aan dat het laatste wat je upload een foto/video is. Zie voor meer info: <a href='http://workingtitle365.uservoice.com/knowledgebase/articles/141261-het-maken-van-je-pagina#upload'>Uploaden van je werk</a>.</span>"}

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
			<div id="profile" class="box rounded-corners">
				<div class="edit">edit</div>
				<div><img src="http://www.gravatar.com/avatar/{$PIMG}" /></div>
				<div class="site headline"><br /><br /><a href="{$SITE}" style="clear:both;">Mijn website</a></div>
				<div class="boxmargin headline" style="clear:both;">{$PROFILE}</div>
				<div id="becomefan">
					<a href="/payments.php?id={$USER}">
						<span style="font-family:arial,helvetica,sans-serif;">
							<strong><span style="font-size:18px;line-height:22px;"><span style="color:#f0fff0;">Fan van deze Maker<br /></span></span></strong>
						</span>
					</a>
				</div>
				<div id="social"></div>
			</div>
			<div id="whoami" class="box rounded-corners">
				<div class="edit">edit</div>
				<div class="boxmargin headline">{$WHO}</div>
			</div>
			<div id="whatdoiwant" class="box rounded-corners">
				<div class="edit">edit</div>
				<div class="boxmargin headline">{$WANT}</div>
			</div>
			<div id="pincentives" class="box rounded-corners" style="">
				<div class="addinc"><a href="incentive.php?id={$USER}" style="position:relative;color:red;">beloningen toevoegen</a></div>
			</div>
		</div>
		<div id="boxy">
			<div id="mywork" class="box rounded-corners">
				<div class="upload">upload</div>
				<div class="boxmargin headline">{$WORK}</div>
				<div class="nav"><a id="prev" href="#" style="float:left;">prev</a><a id="next" href="#" style="float:right;">next</a></div>
				<div style="clear:both;"></div>
			</div>
			<div id="whatdoido" class="box rounded-corners">
				<div class="edit">edit</div>
				<div class="boxmargin headline">{$WHAT}</div>
			</div>
			<div id="whydoidothis" class="box rounded-corners">
				<div class="edit">edit</div>
				<div class="boxmargin headline">{$WHY}</div>
			</div>
		</div>
		<div id="blackbar">
	{include file="smarty/blackbar.tpl"}
		</div>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
	<script src="js/main.js"></script>
	<script>
	    {literal}
				//	if(document.location.pathname.substring(0,8) == "/profile")
						$(document).ready(function() {
									// edit textboxes
									$(".edit").bind( 'click', function(o) {
											var elem = $(this).siblings(".boxmargin")[0];
											console.log($(this).parent().attr('id') +" fired");

											var divHtml = $(elem).html(); // notice "this" instead of a specific #myDiv
											var editableText = $("<textarea />");
											editableText.addClass($(elem).attr("class"));
											editableText.css('width', '90%');
											editableText.css('height', '70%');
											editableText.val(divHtml);
											$(elem).replaceWith(editableText);
											editableText.focus();
											editableText.blur( function editableTextBlurred() {
													var html = $(this).val();
													var par = $(this).parent().attr('id');
													var json = {};
													json[par] = html;
													$.post( '/store.php', json, {contentType: 'application/json'} );
													$(elem).html(html);
													$(this).replaceWith(elem);
											});
									});
									// upload
									$(".upload").bind( 'click', function(o) {
											$("#upload").toggle();
									});
									$("#uploadwin").attr('src',"upload.html?id="+ getUrlVars()['id']);
							});
	    {/literal}
	</script>
	<script src="/creations.php?id={$USER}&callback=creations"> </script>
	<script src="/incentive.json.php?id={$USER}&callback=incentives"></script>
{include file="smarty/footer.tpl"}
