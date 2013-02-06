<div style="border: #222 1px solid;width:180;font-weight:bold;background-color:
{if $t.pending == "true"}
	red
{else}
	green
{/if}
;">
	<div>
		<a href='http://workingtitle365.com/maker/{$t.maker}'>
{$t.maker}
		</a>
	</div>
	<div>
		<div>
{$t.price}
		</div>
		<div>
		<a href='http://workingtitle365.com/payments.php?inc={$t.incentive}&id={$t.maker}'>reward</a>
		</div>
		<div>
{$t.amount}
		</div>
	</div>
	<div style="font-size:x-small;">
{$t.code}
	</div>
</div>
