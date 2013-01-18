<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/js/vendor/analytics.js"></script>
<script src="/js/vendor/popup.js"></script>
<style>
#holder {
	background-color: #222
}
</style>
<div>
<h2>{gettext gt='Visitors'}</h2>
		<div>
	</div>
	<div id="holder"></div>
	<script>
	var mystats = {};
	$.get('/js/stats.json', function(data) {
				  console.log('Load Stats:'+ data);
					mystats = JSON.parse(data);
	});
	$(document).ready(loadAnalytics);
	</script>
</div>
