<div class="overview">
	<div class="artexample">
		<a href="/maker/{$m.username}">
	{if $m.type == 'image'}
			<img class="lazy" src="/upload/m_{$m.creation}" />
	{elseif $m.type == 'video'}
			<video controls="controls" style="width:300px;margin: 0 auto;">
				<source src="/upload/{$m.creation}" type="video/mp4">{gettext gt='Your browser does not support the video tag.'}</source>
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
			<a href="/payments.php?id={$m.username}">{gettext gt='Fan This Maker'}</a>&nbsp;&nbsp;
		</div>
	</div>
</div>

