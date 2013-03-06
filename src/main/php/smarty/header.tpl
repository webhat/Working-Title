<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>WorkingTitle365 - {$USER}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=1300, height=device-height, minimum-scale=0.6, maximum-scale=0.9">
{assign var='HIDE' value=$HIDE|default:false}
{if $HIDE eq 1 }
				<meta name="robots" content="none">
{/if}

        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/main.css">
        <script src="/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="http://www.google.com/jsapi"></script>
        <script>
					google.load("jquery", "1.7.1");
				</script>
				<style type="text/css">
					.edit, .upload, .addinc, .delete {
						{$EDIT};
						color: red;
						float:right;
						margin-right: 10px;
						margin-top: 10px;
						cursor:pointer;
						z-index:99;
					}
				</style>
				<!--[if IE 8]>
				<link rel="stylesheet" href="/css/ie8.css">
				<![endif]-->
				<!--[if IE 9]>
				<link rel="stylesheet" href="/css/ie9.css">
				<![endif]-->
	    {literal}
        <!--[if lt IE 10]>
				<script type="text/javascript">
    var console = {log: function() {}};
        <![endif]-->
				</script>
	    {/literal}
	    {literal}
			<!-- UserVoice JavaScript SDK (only needed once on a page) -->
			<script>(function(){var uv=document.createElement('script');uv.type='text/javascript';uv.async=true;uv.src='//widget.uservoice.com/cneyk8FGopWt8TTXSZzufQ.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(uv,s)})()</script>

			<!-- A tab to launch the Classic Widget -->
			<script>
			UserVoice = window.UserVoice || [];
			UserVoice.push(['showTab', 'classic_widget', {
					mode: 'full',
					primary_color: '#cc6d00',
					link_color: '#007dbf',
					default_mode: 'support',
					forum_id: 174950,
					tab_label: 'Feedback & Support',
					tab_color: '#cc6d00',
					tab_position: 'middle-right',
					tab_inverted: false
			}]);
			</script>
	    {/literal}
    </head>
    <body>

	<!-- ClickTale Top part -->
	<script type="text/javascript">
	var WRInitTime=(new Date()).getTime();
	</script>
	<!-- ClickTale end of Top part -->
	<div id="fb-root"></div>
{literal}
	<script src="/js/fb.js"></script>
{/literal}
		<div id="loginbox" ></div>
