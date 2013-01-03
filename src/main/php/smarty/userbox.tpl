<div class="overview">
	<div class="artexample">
		<a href="/maker/{$m.username}">
	{if $m.type == 'image'}
			<img src="/upload/m_{$m.creation}" />
	{elseif $m.type == 'video'}
			<video controls="controls" style="width:300px;margin: 0 auto;" src="/upload/{$m.creation}">
				<source type="video/mp4">Your browser does not support the video tag.</source>
			</video>
	{elseif $m.type == 'text'}
	{elseif $m.type == 'audio'}
			<audio controls="controls" src="/upload/{$m.creation}">
				<source type="audio/mp3">Your browser does not support the audio tag.</source>
			</audio>
	{else}
	{/if}
		</a>
	</div>
	<div style="max-width:300px">
		<div class="makername">{$m.username}</div>
		<div class="fanbutton">&nbsp;
			<a href="/payments.php?id={$m.username}">Fan This Maker</a>&nbsp;&nbsp;
		</div>
	</div>
</div>

