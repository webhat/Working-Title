{config_load file="test.conf" section="setup"}
{include file="smarty/header.tpl" title=foo}
{assign var='WHO' value=$WHO|default:"<span style='$EDIT;'><strong>Wie ben ik?</strong><br/>Jou als Maker: In zo'n 90 woorden heb je de gelegenheid om meer over jezelf te vertellen. Dit stukje is essentieel om het vertrouwen van je Fans te winnen. Wie ben je en hoe ben je gekomen waar je nu bent?</span>"}
{assign var='WHAT' value=$WHAT|default:"<span style='$EDIT;'><strong>Wat maak ik?</strong><br/>Jouw Werk: In zo'n 120 woorden (max. 700 tekens) staat jouw beschrijving van je werk centraal. Wat kenmerkt je werk, wat is er uniek aan?</span>"}
{assign var='WHY' value=$WHY|default:"<span style='$EDIT;'><strong>Waarom doe ik dit?</strong><br/>Jouw reden voor deelname aan WorkingTitle365.com: Onderaan je profiel en na het bekijken/beluisteren van je werk kunnen Fans een idee krijgen wat jij beoogt. Geef kort weer (in ongeveer 120 woorden max. 700 tekens) wat je motivatie is voor deelname aan dit platform. En wat is je doel? Zo kunnen Fans ook je doel willen ondersteunen.</span>"}
{assign var='WANT' value=$WANT|default:"<span style='$EDIT;'><strong>Wat wil ik en wat bied ik?</strong><br/>Jouw oproep en wat je te bieden hebt: Hier maak je kenbaar wat je verlangt van je Fans en wat jij ze daarvoor biedt. Beoog je een intensieve contact met je Fans? Wil je van hun inbreng gebruik gaan maken? Hoop je dat ze jouw werk zoveel mogelijk delen op sociale media? Wat je ze biedt zijn natuurlijk de beloningen maar ook een inkijk en misschien wel deelname aan je creatief proces.</span>"}
{assign var='WORK' value=$WORK|default:"<span style='$EDIT;'><strong>Jouw Werk uploaden</strong><br/>Je kan hier max. zes werken kwijt. Het laatste werk dat je upload is als eerste zichtbaar. Voor alle Makers raden we aan dat het laatste wat je upload een foto/video is. Zie voor meer info: <a href='http://workingtitle365.uservoice.com/knowledgebase/articles/141261-het-maken-van-je-pagina#upload'>Uploaden van je werk</a>.</span>"}
{assign var='PROFILE' value=$PROFILE|default:"<span style='$EDIT;'>Je korte omschrijving: Beschrijf je werk in max. 133 tekens zoals een tweet op Twitter. Zo is in een oogopslag helder wat jij doet.</span>"}

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

{include file="smarty/footer.tpl"}
