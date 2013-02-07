<div class="overview">
	<div class="artexample">
		<a href="/maker/{$m.username}">
	{if $m.type == 'image'}
			<img class="lazy" src="/upload/m_{$m.creation}" />
	{elseif $m.type == 'video'}
			<video controls="controls" width="300" style="margin: 0 auto;" preload="metadata">
				<source src="/upload/{$m.creation}" type="video/mp4">{gettext gt='Your browser does not support the video tag.'}</source>
				<source src="/upload/{$m.creationwebm}" type="video/webm">{gettext gt='Your browser does not support the video tag.'}</source>
			</video>
	{elseif $m.type == 'text'}
	{elseif $m.type == 'audio'}
			<audio controls="controls" src="/upload/{$m.creation}">
				<source type="audio/mp3">{gettext gt='Your browser does not support the audio tag.'}</source>
			</audio>
	{else}
	{/if}
		</a>
	</div>
	<div style="max-width:300px">
		<div class="makername">{$m.username}</div>
		<div class="fanbutton">&nbsp;
			<a href="/maker/{$m.username}">{gettext gt='Fan This Maker'}</a>&nbsp;&nbsp;
		</div>
	</div>
</div>

