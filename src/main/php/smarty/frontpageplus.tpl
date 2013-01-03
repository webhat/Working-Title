{foreach from=$MAKERS item=m}
	{if $m.username|strpos:'kama'===0}
	{else}
		{include file="smarty/userbox.tpl" title=foo}
	{/if}
{/foreach}

