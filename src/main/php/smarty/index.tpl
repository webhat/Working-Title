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
			<div id="profile" class="box rounded-corners">
				<div class="edit">edit</div>
				<div><img src="http://www.gravatar.com/avatar/{$PIMG}" /></div>
				<div class="boxmargin headline">{$PROFILE}</div>
				<div id="becomefan">
					<a href="/payments.php?id={$USER}">
						<span style="font-family:arial,helvetica,sans-serif;">
							<strong><span style="font-size:18px;line-height:22px;"><span style="color:#f0fff0;">Fan van deze Maker<br /></span></span></strong>
							<span style="font-size:14px;line-height:17px;"><span style="color:#d3d3d3;"><span>v.a. 1 ct p.d.</span></span></span>
						</span>
					</a>
				</div>
				<div id="social"></div>
			</div>
			<div id="whoami" class="box rounded-corners">
				<div class="edit">edit</div>
				<div class="boxmargin headline">{$WHO}</div>
			</div>
			<div id="pincentives" class="box rounded-corners">
				<div class="addinc"><a href="incentive.php?id={$USER}" style="position:relative;color:red;left:40px;">toevoegen</a></div>
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
