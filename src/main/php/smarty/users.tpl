<div style="float:right;"><iframe name="transx" width="1200" height="500"></iframe></div>
<div style="display:inline-block;width:320px;" id="users">
{foreach from=$U item=u}
	{include file="smarty/user.tpl" title=foo}
{/foreach}
</div>
<script src="http://www.google.com/jsapi"></script>
<script>
	google.load("jquery", "1.7.1");
</script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/masonry/2.1.05/jquery.masonry.min.js"></script>
<script>
	$(".user").click(function(e) {
			console.log("Fire");
		$("div.info").hide();
		$("div.info").css('z-index', "0");
		$("div.info").parent().css('z-index', "0");
		$("div.info", $(e.target).parent().parent()).show();
		$("div.info", $(e.target).parent().parent()).css('z-index', "1");
		$("div.info", $(e.target).parent().parent()).parent().css('z-index', "1");
	});

	var $container = $('#users');
	$container.imagesLoaded(function(){
		setTimeout(resetMasonry,100);
	});

	function resetMasonry() {
			console.log('reset masonry');
			$container.masonry({
				itemSelector: '.user',
				animated: true,
				columnWidth: 10
			});
	}
</script>
