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
		<div id="mywork" class="box rounded-corners">
			<div class="upload">upload</div>
			<div class="boxmargin headline">{$WORK}</div>
			<div class="nav"><a id="prev" href="#" style="float:left;">prev</a><a id="next" href="#" style="float:right;">next</a></div>
		</div>
		<div id="whoami" class="box rounded-corners">
			<div class="edit">edit</div>
			<div class="boxmargin headline">{$WHO}</div>
		</div>
		<div id="whatdoido" class="box rounded-corners">
			<div class="edit">edit</div>
			<div class="boxmargin headline">{$WHAT}</div>
		</div>
		<div id="whydoidothis" class="box rounded-corners">
			<div class="edit">edit</div>
			<div class="boxmargin headline">{$WHY}</div>
		</div>
		<div id="profile" class="box rounded-corners">
			<div class="edit">edit</div>
			<div class="boxmargin headline">{$PROFILE}</div>
			<div class="headline" style="margin:20%;">
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="7C7AX3LU3J4FS">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribe_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
			</div>
		</div>
	</div>
	<div id="blackbar"></div>

{include file="smarty/footer.tpl"}
