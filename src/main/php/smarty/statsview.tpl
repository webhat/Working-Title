<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/js/vendor/analytics.js"></script>
<script src="/js/vendor/popup.js"></script>
<style>
	#holder {
		background-color: #222
	}
	.loading {
		position:absolute;
		left:45%;
	}
</style>
<div>
<h2 style="text-align:center;margin-top:0px;">{gettext gt='Visitors'}</h2>
		<div>
	</div>
	<div id="holder"><img class="loading" src="/img/loading.gif"/></div>
	<script>
	var mystats = {};
	$.get('/stats.json.php', function(data) {
				  console.log('Load Stats:'+ data);
					mystats = JSON.parse(data);
		$(document).ready(function() {
				loadAnalytics();
			$(".loading").hide();
		});
	});
	</script>
</div>
