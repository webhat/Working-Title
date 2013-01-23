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
			<div class="information" style="{$EDIT}">
				<div>{gettext gt='What does this mean?'}</div>
				<div><a href="http://workingtitle365.uservoice.com/knowledgebase/articles/139130-cre%C3%ABren-van-beloningen">{gettext gt='What are my Statistics?'}</a></div>
			</div>
			</div>
		</div>
		<div style="position:absolute">
		</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
		<div id="boxy">
			<div id="fullwidth" class="box rounded-corners" style="top:30px;height:300px;">
				<div>
					{include file="smarty/statsview.tpl"}
				</div>
				<div>
					{include file="smarty/earnings.tpl"}
				</div>
			</div>
		</div>
	</div>

	<script src="/js/main.js"></script>

{include file="smarty/footer.tpl"}
