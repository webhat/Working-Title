<div style="display:inline-block;">
{foreach from=$T item=t}
	{if $t.maker|strpos:'kama'===0}
	{else}
		{include file="smarty/transaction.tpl" title=foo}
	{/if}
{/foreach}
</div>
