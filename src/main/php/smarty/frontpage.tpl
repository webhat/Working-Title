{config_load file="test.conf" section="setup"}
{include file="smarty/header.tpl" title=foo}

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

	<div>
		<div id="header" class="box rounded-corners" style="height:227px;">
			<div class="boxmargin" style="background-image:url(/img/s_wt365-header.png);width:1052px;height:227px;top:-50px;margin:0;">
			<!--
				<h1 style="color:white; background-color:grey; opacity:0.7;">You Make Inspiration Happen</h1>
				<p class="category" style="display:inline;background-color:grey; opacity:0.7;width:200px;">Support a Maker, Be Rewarded</p>
				-->
			</div>
		</div>
		<div id="boxy">
			<div id="fullwidth" class="box rounded-corners" style="height:1000px;top:100px;width:1052px;">
				{include file='smarty/highlight.tpl' title=foo}
				{include file='smarty/frontpageplus.tpl' title=foo}
			</div>
			<div id="visible"></div>
		</div>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="/js/vendor/jail.js"></script>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/masonry/2.1.05/jquery.masonry.min.js"></script>
	<script>
	$(function(){
			$('img.lazy').jail();
	});
	</script>
	<script>

	var $container = $('#fullwidth');
	$container.imagesLoaded(function(){
		setTimeout(resetMasonry,100);
	});

	function resetMasonry() {
			console.log('reset masonry');
			$container.masonry({
				itemSelector: '.overview',
				animated: true,
				columnWidth: 10
			});
	}

	var alreadyloading = false;
	var nextpage = 2;

	$(window).scroll(function() {
		//console.log($(document).height() +"<="+ ($(window).height() + $(window).scrollTop()));
		if (($(document).height()/3*2) <= ($(window).height() + $(window).scrollTop())) {
			if (alreadyloading == false) {
				var url = "moreCreations.php?page="+nextpage;
				alreadyloading = true;
				$.get(url, function(data) {
						console.log("XXXXXX: more creations: ["+nextpage+"]");
						$('#fullwidth').children().last().after(data)
						$('#fullwidth').height( $('#fullwidth').height()*2);
						$('img.lazy').jail();
						$container.masonry( 'reload' );
							alreadyloading = false;
							nextpage++;
				});
			}
		}
	});

	</script>

{include file="smarty/footer.tpl"}
