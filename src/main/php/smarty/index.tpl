{config_load file="test.conf" section="setup"}
{include file="smarty/header.tpl" title=foo}
{assign var='WT' value=$WT|default:"Geef een naam aan je profiel"}
{assign var='WHO' value=$WHO|default:"<span style='$EDIT;'><strong>Wie ben ik?</strong><br/>Jou als Maker: Dit stukje is belangrijk om het vertrouwen van je Fans te winnen. Wie ben je en hoe ben je gekomen waar je nu bent? Ben je professioneel bezig of ambieer je een carrière? Wat is je opleiding? Waar ben je nog meer te zien?</span>"}
{assign var='WHAT' value=$WHAT|default:"<span style='$EDIT;'><strong>Wat maak ik?</strong><br/>Jouw Werk: Gebruik gerust 200 woorden voor het beschrijven van je werk maar wees bewust dat lange(re) teksten slecht worden gelezen. Wat kenmerkt je werk? Wat is er uniek aan? Wat vinden huidige bewonderaars ervan?</span>"}
{assign var='WHY' value=$WHY|default:"<span style='$EDIT;'><strong>Waarom doe ik dit?</strong><br/>Jouw reden voor deelname aan WorkingTitle365.com: Geef kort weer wat je motivatie is voor deelname aan dit platform en wat je doel is. Fans kunnen ook je doel willen ondersteunen.</span>"}
{assign var='WANT' value=$WANT|default:"<span style='$EDIT;'><strong>Wat wil ik en wat bied ik?</strong><br/>Jouw oproep en wat je te bieden hebt: Maak duidelijk wat je verlangt van je Fans en wat jij ze biedt. Beoog je een intensieve contact? Wil je hun inbreng of feedback? Wil je dat ze jouw werk zoveel mogelijk delen op sociale media? Je biedt ze natuurlijk de beloningen maar ook een inkijk en misschien wel deelname aan je creatief proces.</span>"}
{assign var='PROFILE' value=$PROFILE|default:"<span style='$EDIT;'>Je korte omschrijving: Beschrijf je werk in max. 133 tekens zoals een tweet op Twitter. Zo is in een oogopslag helder wat jij doet.</span>"}
{assign var='WORK' value=$WORK|default:"<span style='$EDIT;'><strong>Jouw Werk uploaden</strong><br/>Je kan zoveel werken kwijt als je wilt. MAAR wij adviseren hier niet je complete portfolio te plaatsen, daar zijn andere plekken voor. Een beperkt aantal werken maakt nieuwsgierig en verleidt om Fan van je te worden. Het laatste werk dat je toevoegt is als eerste zichtbaar; dit kan het beste een foto/video zijn. Je kan werken tot 20 MB uploaden. Zie voor meer info: <a href='http://workingtitle365.uservoice.com/knowledgebase/articles/141261-het-maken-van-je-pagina#upload'>Uploaden van je werk</a>.</span>"}

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
	<div>
		<div id="profilename" class="box rounded-corners">
			<div class="edit">edit</div>
			<div class="boxmargin">{$WT}</div>
			<div class="boxmargin">
				<p class="category">FIXME: category here</p>
			</div>
			<div class="information" style="{$EDIT}">
				<div>Hoe?</div>
				<div><a href="http://workingtitle365.uservoice.com/knowledgebase/articles/141261-het-maken-van-je-pagina">Maak je een mooie pagina</a></div>
				<div>Zie ook:</div>
				<div><a href="http://workingtitle365.uservoice.com/knowledgebase/articles/139132-cre%C3%ABer-een-doel">Cre&euml;er een doel</a></div>
			</div>
		</div>
		<div style="position:absolute">
			<div id="profile" class="box rounded-corners">
				<div class="edit">edit</div>
				<div><img width="80" height="80" src="http://www.gravatar.com/avatar/{$PIMG}" /></div>
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
			<div id="pincentives" class="box rounded-corners" style="">
				<div class="addinc"><a href="incentive.php?id={$USER}" style="position:relative;color:red;">beloningen toevoegen</a></div>
			</div>
		</div>
		<div id="boxy">
			<div id="mywork" class="box rounded-corners">
				<div class="upload">upload</div>
				<div class="boxmargin headline">{$WORK}</div>
				<div style="clear:both;"></div>
			</div>
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
				if(confirm("Wil je het bestand echt verwijderen?"))
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
				console.log("Delete Incentive Fired");
				var code = $($(event.target).parent()).attr("id");
						{literal}
				console.log("Delete Fired for: "+ code);
				var json = {};
				json['code'] = code;
				json['incentive'] = true;
				if(confirm("Wil je het bestand echt verwijderen?"))
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
