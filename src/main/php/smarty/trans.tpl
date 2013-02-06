<div style="display:inline-block;width:1200px;" id="transactions">
{foreach from=$T item=t}
	{include file="smarty/transaction.tpl" title=foo}
{/foreach}
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/masonry/2.1.05/jquery.masonry.min.js"></script>
<script>
	var $container = $('#transactions');
	$container.imagesLoaded(function(){
		setTimeout(resetMasonry,100);
	});

	function resetMasonry() {
			console.log('reset masonry');
			$container.masonry({
				itemSelector: '.transaction',
				animated: true,
				columnWidth: 10
			});
	}
</script>
