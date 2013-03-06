				<div id="social">
						<a href="https://twitter.com/share" class="twitter-share-button" data-via="wtitle365" data-text="{gettext gt='I love %s on WorkingTitle365, retweet to show your support.' arg1=$USER}">Tweet</a>
					{literal}
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					{/literal}
					<div class="fb-like" data-href="http://www.workingtitle365.com/profile.php?id={$USER}" data-layout="button_count" data-send="false" data-width="450" data-show-faces="false"></div>
					<!-- Place this tag where you want the +1 button to render. -->
					<div class="g-plusone" data-size="small" data-annotation="none" data-width="300"></div>
					<!-- Place this tag after the last +1 button tag. -->
					{literal}
						<script type="text/javascript">
							(function() {
									 var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
											 po.src = 'https://apis.google.com/js/plusone.js';
													 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
														 })();
						</script>
					{/literal}
{if $E}
					<a id="mandrill" href="/mailmyfans.php"><img height="32" src="/img/mandrill.png" /></a>
{/if}
					<br />
				</div>
