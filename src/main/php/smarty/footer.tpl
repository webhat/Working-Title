
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
	    {literal}
            var _gaq=[['_setAccount','UA-4980002-2'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
	    {/literal}
        </script>
        <script src="/js/abtests.js"> </script>
        <script src="/js/vendor/jquery.ba-hashchange.min.js"> </script>
				<script>
					var prev = "#";
					var next = "#";
					function setupHash() {
							$(".work").hide();
							var page = $(".work").length-1;
							if(document.location.hash != "") {
								page =  + document.location.hash.toString().substr(6);
							}
							$("#work"+ page).show();
							$("#next").attr("href", "#page-" + (page+1));
							$("#prev").attr("href", "#page-" + (page-1));
					}
					$(function(){
							  $(window).hashchange(setupHash);
								$(window).hashchange();
					});
				</script>
				<script>
					var ref = $(document)[0].referrer;
					console.log(ref);
				</script>
				<div id="upload">
					<iframe id="uploadwin" width="400" height="400">
				</div>
		<!-- ClickTale Bottom part -->
		<div id="ClickTaleDiv" style="display: none;"></div>
		<script type="text/javascript">
		if(document.location.protocol!='https:')
		  document.write(unescape("%3Cscript%20src='http://s.clicktale.net/WRd.js'%20type='text/javascript'%3E%3C/script%3E"));
		  </script>
		  <script type="text/javascript">
		  if(typeof ClickTale=='function') ClickTale(51309,1,"www");
		  </script>
		  <!-- ClickTale end of Bottom part -->
    </body>
</html>

