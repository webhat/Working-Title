
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
        <script src="/js/plugins.js"></script>
        <script src="/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
	    {literal}
            var _gaq=[['_setAccount','UA-34506988-1'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
	    {/literal}
        </script>
        <script src="/js/vendor/jquery.random.js"> </script>
        <script src="/js/vendor/jquery.ba-hashchange.min.js"> </script>
				<div id="upload">
					<div><img width="20" height="20" src="/img/redcross.png" class="upload" style="position:relative;left:20px;top:10px;" /></div>
					<iframe id="uploadwin" width="400" height="400"></iframe>
				</div>
				<script src="/js/vendor/w3cschool.js"></script>
        <script src="/js/abtests.js"> </script>
	<script>
	function explain() {
		var firsttime=getCookie("firsttime");
		if (firsttime!=null && firsttime!="") {
			$(".long").hide();
			$(".short").show();
			$("#explain").css("height","22px");
			$("#boxy").css("top","240px");
		} else {
			firsttime=true;
			if (firsttime!=null && firsttime!="") {
				setCookie("firsttime",firsttime,365);
				$("#boxy").css("top","320px");
			}
		}
	}
	var fp = "/index.php";
	console.log(top.location.pathname);
	if(top.location.pathname == fp)
		explain();
	</script>
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

