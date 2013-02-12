{if array_key_exists('maker',$t)}
	<div style="border: #222 1px solid;width:180px;font-weight:bold;background-color:
	{if $t.pending == "true"}
		red
	{else}
		green
	{/if}
	;" class="transaction">
		<div>
			<a href='http://workingtitle365.com/maker/{$t.maker}'>
	{$t.maker}
			</a>
		</div>
		<div>
			<div>
	{if array_key_exists('price',$t)}
		{$t.price}
	{else}
	no reward
	{/if}
			</div>
			<div>
	{if array_key_exists('incentive',$t)}
			<a href='http://workingtitle365.com/payments.php?inc={$t.incentive}&id={$t.maker}'>reward</a>
	{else}
	no reward
	{/if}
			</div>
			<div>
	{$t.amount}
			</div>
		</div>
		<div style="font-size:x-small;">
	{$t.code}
		</div>
	</div>
{/if}
