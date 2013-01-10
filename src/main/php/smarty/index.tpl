{config_load file="test.conf" section="setup"}
{include file="smarty/header.tpl" title=foo}
{assign var='WT' value=$WT|default:"Geef een naam aan je profiel"}
{assign var='WHO' value=$WHO|default:"<span style='$EDIT;'><strong>Wie ben ik?</strong><br/>Jou als Maker: Dit stukje is belangrijk om het vertrouwen van je Fans te winnen. Wie ben je en hoe ben je gekomen waar je nu bent? Ben je professioneel bezig of ambieer je een carrière? Wat is je opleiding? Waar ben je nog meer te zien?</span>"}
{assign var='WHAT' value=$WHAT|default:"<span style='$EDIT;'><strong>Wat maak ik?</strong><br/>Jouw Werk: Gebruik gerust 200 woorden voor het beschrijven van je werk maar wees bewust dat lange(re) teksten slecht worden gelezen. Wat kenmerkt je werk? Wat is er uniek aan? Wat vinden huidige bewonderaars ervan?</span>"}
{assign var='WHY' value=$WHY|default:"<span style='$EDIT;'><strong>Waarom doe ik dit?</strong><br/>Jouw reden voor deelname aan WorkingTitle365.com: Geef kort weer wat je motivatie is voor deelname aan dit platform en wat je doel is. Fans kunnen ook je doel willen ondersteunen.</span>"}
{assign var='WANT' value=$WANT|default:"<span style='$EDIT;'><strong>Wat wil ik en wat bied ik?</strong><br/>Jouw oproep en wat je te bieden hebt: Maak duidelijk wat je verlangt van je Fans en wat jij ze biedt. Beoog je een intensieve contact? Wil je hun inbreng of feedback? Wil je dat ze jouw werk zoveel mogelijk delen op sociale media? Je biedt ze natuurlijk de beloningen maar ook een inkijk en misschien wel deelname aan je creatief proces.</span>"}
{assign var='PROFILE' value=$PROFILE|default:"<span style='$EDIT;'><strong>Korte omschrijving, 2 opties:</strong><br/>Beschrijving in 133 tekens, en dus voor Twitter geschikt. Uitgebreider mag ook (suggestie: max. 150 woorden). Naar andere sites linken kan met een ShortURL zoals <a href='http://bit.ly'>bit.ly</a>. Zie: <a href='http://workingtitle365.uservoice.com/knowledgebase/articles/141261-het-maken-van-je-pagina'>&quotHet maken van je pagina&quot</a>.</span>"}
{assign var='WORK' value=$WORK|default:"<span style='$EDIT;'><strong>Jouw Werk uploaden</strong><br/>Plaats niet je complete portfolio, daar zijn andere plekken voor. Een beperkt aantal werken maakt nieuwsgierig en verleidt om je Fan te worden. Je werk komt in upload volgorde onder elkaar. Binnenkort kan je de volgorde sorteren. Wat je als eerste toevoegt is dus als eerste zichtbaar; dit kan het beste een foto/video zijn. Zie: <a href='http://workingtitle365.uservoice.com/knowledgebase/articles/141261-het-maken-van-je-pagina#upload'>Uploaden van je werk</a>.</span>"}

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
				<img style="display:none;visibility:none" src="{$FBCREA}" />
	<div>
		<div id="profilename" class="box rounded-corners">
			<div class="edit"><br />edit</div>
			<div class="boxmargin">{$WT}</div>
			<div class="boxmargin">
				<p class="category">FIXME: category here</p>
			</div>
			<div class="information" style="{$EDIT}">
				<div>{gettext gt='Hoe?'}</div>
				<div><a href="http://workingtitle365.uservoice.com/knowledgebase/articles/141261-het-maken-van-je-pagina">Maak je een mooie pagina</a></div>
				<div>{gettext gt='Zie ook:'}</div>
				<div><a href="http://workingtitle365.uservoice.com/knowledgebase/articles/139132-cre%C3%ABer-een-doel">Cre&euml;er een doel</a></div>
			</div>
		</div>
		<div style="position:absolute">
			<div id="profile" class="box rounded-corners">
				<div class="edit"><br />edit</div>
				<div><img width="80" height="80" src="http://www.gravatar.com/avatar/{$PIMG}" /></div>
				<div class="site headline"><br /><br /><a href="{$SITE}" style="clear:both;">{gettext gt='Mijn website'}</a></div>
				<div class="boxmargin headline" style="clear:both;">{$PROFILE}</div>
				<div id="becomefan">
					<a href="/payments.php?id={$USER}">
						<span style="font-family:arial,helvetica,sans-serif;">
							<strong><span style="font-size:18px;line-height:22px;"><span style="color:#f0fff0;">{gettext gt='Fan This Maker'}<br /></span></span></strong>
						</span>
					</a>
				</div>
				<div id="social">
					{literal}
						<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					{/literal}
					<div class="fb-like" data-href="http://www.workingtitle365.com/profile.php?id={$USER}" data-layout="button_count" data-send="false" data-width="450" data-show-faces="false"></div>
					<!-- Place this tag where you want the +1 button to render. -->
					<div class="g-plusone" data-size="small" data-annotation="none" data-width="300"></div>
					<!-- Place this tag after the last +1 button tag. -->
					{literal}
						<script type="text/javascript">
							(function() {
									 var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
											 po.src = 'https://apis.google.com/js/plusone.js';
													 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
														 })();
						</script>
					{/literal}
					<br />
				</div>
			</div>
			<div id="pincentives" class="box rounded-corners" style="">
				<div class="addinc"><br /><a href="/incentive.php?id={$USER}" style="position:relative;color:red;">{gettext gt='beloningen toevoegen'}</a></div>
			</div>
		</div>
		<div id="boxy">
			<div id="mywork" class="box rounded-corners">
				<div class="upload"><br />upload</div>
				<div class="boxmargin headline">{$WORK}</div>
				<div style="clear:both;" id="workbelow"></div>
			</div>
		</div>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
	<script src="/js/main.js"></script>
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
	    {/literal}
											$("#uploadwin").attr('src',"/upload.html?id={$USER}");
	    {literal}
									});
							});
	    {/literal}
	</script>
	<script>
		$(document).ready(function() {
			$("center .delete").click(function(event) {
				console.log("Delete Creation Fired");
				var filename = $($($(event.target).siblings()[0]).children()[0]).attr("src");
				if(filename == "" || filename == undefined)
					filename = $("a", $(event.target).parent()).attr("href");
						{literal}
				console.log("Delete Fired for: "+ filename);
				var json = {};
				json['filename'] = filename;
				json['creation'] = true;
				if(confirm("{/literal}{gettext gt='Wil je het bestand echt verwijderen?'}{literal}"))
				$.ajax( {
					type:"POST",
					url:'/delcreation.php',
					data: {"json":JSON.stringify(json)},
					dataType: 'json'
				}).always(function() { 
						{/literal}
						top.location = document.location.pathname + location.search;
						{literal}
				}).done(function() { 
						{/literal}
						top.location = document.location.pathname + location.search;
						{literal}
				});
						{/literal}
			});
			$(".incentive .delete").click(function(event) {
				event.stopPropagation();
				console.log("Delete Incentive Fired");
				var code = $($(event.target).parent()).attr("id");
						{literal}
				console.log("Delete Fired for: "+ code);
				var json = {};
				json['code'] = code;
				json['incentive'] = true;
				if(confirm("{/literal}{gettext gt='Wil je de incentive echt verwijderen?'}{literal}"))
				$.ajax( {
					type:"POST",
					url:'/delcreation.php',
					data: {"json":JSON.stringify(json)},
					dataType: 'json'
				}).always(function() { 
						{/literal}
						top.location = document.location.pathname + location.search;
						{literal}
				}).done(function() { 
						{/literal}
						top.location = document.location.pathname + location.search;
						{literal}
				});
						{/literal}
			});
		});
	</script>
	<script src="/creations.php?id={$USER}&callback=creations"> </script>
	<script src="/incentive.json.php?id={$USER}&callback=incentives"></script>
{include file="smarty/footer.tpl"}
